<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Http\Requests\StoreSiteSettingRequest;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{

    public function edit()
    {
        $settings = SiteSetting::first(); // نفترض أن هناك سجل واحد فقط
        return view('admin.site-settings.edit', compact('settings'));
    }

    public function update(StoreSiteSettingRequest $request)
    {

        
        $settings = SiteSetting::first();
        $data = $request->validated();
    
        foreach (['main_logo', 'footer_logo', 'bg_logo','services_image','projects_image','hero_image'] as $logoField) {
            if ($request->hasFile($logoField)) {
                if ($settings->$logoField && Storage::disk('public')->exists($settings->$logoField)) {
                    Storage::disk('public')->delete($settings->$logoField);
                }
    
                $data[$logoField] = $request->file($logoField)->store('logos', 'public');
            }
        }
    
        $settings->update($data);
    
       return redirect()->back()->with('success', 'تم تحديث إعدادات الموقع بنجاح.');
    }

}
