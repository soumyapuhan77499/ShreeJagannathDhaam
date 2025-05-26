<?php

namespace App\Http\Controllers\TempleUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RathaYatraActive;

class RathaYatraActiveController extends Controller
{
   
public function index()
{
    $status = \App\Models\RathaYatraActive::firstOrCreate(
        [], // match nothing, ensure always one record
        ['live_video' => 'inactive', 'section' => 'inactive'] // default values
    );

        return view('templeuser.rathayatra.manage-ratha-yatra', compact('status'));
}

    public function toggleLiveVideo()
    {
        $status = RathaYatraActive::firstOrCreate([]);
        $status->live_video = $status->live_video === 'active' ? 'inactive' : 'active';
        $status->save();

        return redirect()->back()->with('success', 'Live Video status updated successfully!');
    }

    public function toggleSection()
    {
        $status = RathaYatraActive::firstOrCreate([]);
        $status->section = $status->section === 'active' ? 'inactive' : 'active';
        $status->save();

        return redirect()->back()->with('success', 'Ratha Yatra section status updated successfully!');
    }
}
