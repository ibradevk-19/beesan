<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AboutData;
use App\Http\Requests\AboutDataRequest;

class AboutDataController extends Controller
{



    public function edit()
    {
        $data = AboutData::first();
        return view('admin.aboutdata.edit', compact('data'));
    }

    public function update(AboutDataRequest $request)
    {
          $data = $request->validated();
          $aboutData = AboutData::first();
        // Update main image
        if ($request->hasFile('image')) {
            // Delete old main image
            if ($aboutData->image && Storage::disk('public')->exists($aboutData->image_path)) {
                Storage::disk('public')->delete($aboutData->image_path);
            }
    
            $data['image_path'] = $request->file('image')->store('aboutData', 'public');
        }


        if ($request->hasFile('message_image')) {
            // Delete old main image
            if ($aboutData->image && Storage::disk('public')->exists($aboutData->message_image)) {
                Storage::disk('public')->delete($aboutData->message_image);
            }
    
            $data['message_image'] = $request->file('message_image')->store('aboutData', 'public');
        }

        if ($request->hasFile('vision_image')) {
            // Delete old main image
            if ($aboutData->image && Storage::disk('public')->exists($aboutData->vision_image)) {
                Storage::disk('public')->delete($aboutData->vision_image);
            }
    
            $data['vision_image'] = $request->file('vision_image')->store('aboutData', 'public');
        }

        
        if ($request->hasFile('cover_image')) {
            // Delete old main image
            if ($aboutData->image && Storage::disk('public')->exists($aboutData->cover_image)) {
                Storage::disk('public')->delete($aboutData->cover_image);
            }
    
            $data['cover_image'] = $request->file('cover_image')->store('aboutData', 'public');
        }

       
        
        // Update article
        $aboutData->update($data);
    
   
        return redirect()->route('admin.aboutdata.edit')->with('success', 'تم تعديل المقال بنجاح');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'تم حذف المقال بنجاح');
    }
}
