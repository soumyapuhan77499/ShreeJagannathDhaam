<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RathaYatraActive;

class RathaYatraController extends Controller
{
      public function getStatus()
    {
        try {
            $status = RathaYatraActive::first();

            if (!$status) {
                // Create a default record if none exists
                $status = RathaYatraActive::create([
                    'live_video' => 'inactive',
                    'section' => 'inactive',
                ]);
            }

            return response()->json([
                'message' => 'Collection data retrieved successfully',
                'status' => 200,
                'data' => [
                    'live_video' => $status->live_video,
                    'section' => $status->section,
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server error occurred',
                'status' => 500
            ], 500);
        }
    }
}
