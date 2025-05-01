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
    
            // Move file to public/uploads/apk
            $destinationPath = public_path('uploads/apk');
            $file->move($destinationPath, $filename);
    
            // Save only the relative path (for download URL)
            $relativePath = 'uploads/apk/' . $filename;
    
            Apk::create([
                'version' => $request->version,
                'apk_file' => $relativePath,
            ]);
    
            return redirect()->back()->with('success', 'APK uploaded successfully.');
        }
    
        return redirect()->back()->with('error', 'Failed to upload APK file.');
    }
    
    public function manageApk()
    {
        $apks = Apk::where('status', 'active')->get();
        return view('templeuser.manage-apk', compact('apks'));
    }

    public function deleteApk($id)
    {
        $apk = Apk::findOrFail($id);
        Storage::disk('public')->delete($apk->apk_file);
        $apk->delete();

        return redirect()->back()->with('success', 'APK deleted successfully.');
    }

}
