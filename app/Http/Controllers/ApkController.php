<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apk;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApkController extends Controller
{
    public function addApk()
    {
        return view('templeuser.add-apk');
    }
   
    public function saveApk(Request $request)
    {
        $request->validate([
            'version' => 'required|string|max:20',
        ]);
    
        if ($request->hasFile('apk_file')) {
            $file = $request->file('apk_file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
    
            $path = $file->storeAs('uploads/apk', $filename, ['disk' => 'public']);
    
            Apk::create([
                'version' => $request->version,
                'apk_file' => $path,
            ]);
    
            if ($request->ajax()) {
                return response()->json(['message' => 'APK uploaded successfully.']);
            }
    
            return redirect()->back()->with('success', 'APK uploaded successfully.');
        }
    
        if ($request->ajax()) {
            return response()->json(['message' => 'Failed to upload APK file.'], 422);
        }
    
        return redirect()->back()->with('error', 'Failed to upload APK file.');
    }
}
