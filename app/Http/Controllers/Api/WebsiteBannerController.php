<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NitiMaster;
use App\Models\NitiManagement;
use App\Models\SebaMaster;
use App\Models\TempleBanner;
use App\Models\NearByTemple;
use App\Models\HundiCollection;
use App\Models\TempleSubNitiManagement;
use App\Models\TempleSubNiti;
use App\Models\TempleNews;

use Carbon\Carbon;
use Exception;

class WebsiteBannerController extends Controller
{
    public function manageWebsiteBanner()
    {
        try {
            $templeId = 'TEMPLE25402';

          $latestDayId = NitiMaster::where('status', 'active')->latest('id')->value('day_id');

if (!$latestDayId) {
    return response()->json([
        'status' => false,
        'message' => 'No active Niti found to determine day_id.'
    ], 404);
}

// Load all managements for that day in descending timeline
$allManagements = NitiManagement::where('day_id', $latestDayId)
    ->with('master')
    ->orderByDesc('id')
    ->get();

// Load running sub-nitis
$activeNitiIds = NitiMaster::whereIn('niti_status', ['Started', 'Paused'])->pluck('niti_id');
$runningSubNitis = TempleSubNitiManagement::where(function ($q) {
        $q->where('status', 'Running')->orWhere('status', '!=', 'Deleted');
    })
    ->where('day_id', $latestDayId)
    ->whereIn('niti_id', $activeNitiIds)
    ->get()
    ->groupBy('niti_id');

$groupedNitis = []; // 'main' => NitiManagement, 'others' => []
$currentMainId = null;

foreach ($allManagements as $mgmt) {
    if (!$mgmt->master) continue;

    $niti = $mgmt->master;
    $nitiType = $niti->niti_type;

    if (in_array($nitiType, ['daily', 'special'])) {
        $currentMainId = $niti->niti_id;
        if (!isset($groupedNitis[$currentMainId])) {
            $groupedNitis[$currentMainId] = ['main' => null, 'others' => []];
        }
        if (!$groupedNitis[$currentMainId]['main']) {
            $groupedNitis[$currentMainId]['main'] = $mgmt;
        }
    } elseif ($nitiType === 'other' && $currentMainId) {
        $groupedNitis[$currentMainId]['others'][] = $mgmt;
    }
}

$finalList = collect();

foreach ($groupedNitis as $group) {
    // Push main
    if ($group['main']) {
        $finalList->push(buildNitiBlock($group['main'], $runningSubNitis));
    }

    // Push others
    foreach ($group['others'] as $otherMgmt) {
        $finalList->push(buildNitiBlock($otherMgmt, $runningSubNitis));
    }
}

// Helper function
function buildNitiBlock($mgmt, $runningSubNitis)
{
    $niti = $mgmt->master;

    return [
        'niti_id' => $niti->niti_id,
        'niti_name' => $niti->niti_name,
        'english_niti_name' => $niti->english_niti_name,
        'niti_type' => $niti->niti_type,
        'niti_status' => $niti->niti_status,
        'date_time' => $niti->date_time,
        'language' => $niti->language,
        'niti_privacy' => $niti->niti_privacy,
        'niti_about' => $niti->niti_about,
        'niti_sebayat' => $niti->niti_sebayat,
        'description' => $niti->description,
        'english_description' => $niti->english_description,
        'start_time' => $mgmt->start_time,
        'pause_time' => $mgmt->pause_time,
        'resume_time' => $mgmt->resume_time,
        'end_time' => $mgmt->end_time,
        'duration' => $mgmt->duration,
        'management_status' => $mgmt->niti_status,
        'after_special_niti_name' => null,
        'running_sub_niti' => $runningSubNitis->get($niti->niti_id, collect())->map(function ($sub) {
            return [
                'sub_niti_id' => $sub->sub_niti_id,
                'sub_niti_name' => $sub->sub_niti_name,
                'start_time' => $sub->start_time,
                'status' => $sub->status,
                'date' => $sub->date,
            ];
        })->values(),
    ];
}
            $nitiInfo = TempleNews::where('type', 'information')
            ->where('niti_notice_status','Started')
            ->where('status','active')
            ->orderBy('created_at', 'desc')
            ->get(['id', 'niti_notice','created_at'])
            ->first();

            $banners = TempleBanner::where('temple_id', $templeId)
                ->where('status', 'active')
                ->get(['banner_image', 'banner_type']);
    
            $nearbyTemples = NearByTemple::where('status', 'active')
                ->where('temple_id', $templeId)
                ->get();
    
            $totalPreviousAmount = HundiCollection::where('temple_id', $templeId)
                ->where('status', 'active')
                ->whereDate('hundi_open_date', Carbon::yesterday()->toDateString())
                ->sum('collection_amount');
    
            return response()->json([
                'status' => true,
                'message' => 'Temple website data fetched successfully.',
                'data' => [
        'niti_master' => $finalList->values(),
                    'banners'             => $banners,
                    'nearby_temples'      => $nearbyTemples,
                    'totalPreviousAmount' => $totalPreviousAmount,
                    'information'           => $nitiInfo,
                ]
            ], 200);
    
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
}
