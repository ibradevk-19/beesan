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

    // public function update(AboutDataRequest $request)
    // {
    //       $data = $request->validated();
    //       $aboutData = AboutData::first();
    //     // Update main image
    //     if ($request->hasFile('image')) {
    //         // Delete old main image
    //         if ($aboutData->image && Storage::disk('public')->exists($aboutData->image_path)) {
    //             Storage::disk('public')->delete($aboutData->image_path);
    //         }
    
    //         $data['image_path'] = $request->file('image')->store('aboutData', 'public');
    //     }


    //     if ($request->hasFile('message_image')) {
    //         // Delete old main image
    //         if ($aboutData->image && Storage::disk('public')->exists($aboutData->message_image)) {
    //             Storage::disk('public')->delete($aboutData->message_image);
    //         }
    
    //         $data['message_image'] = $request->file('message_image')->store('aboutData', 'public');
    //     }

    //     if ($request->hasFile('vision_image')) {
    //         // Delete old main image
    //         if ($aboutData->image && Storage::disk('public')->exists($aboutData->vision_image)) {
    //             Storage::disk('public')->delete($aboutData->vision_image);
    //         }
    
    //         $data['vision_image'] = $request->file('vision_image')->store('aboutData', 'public');
    //     }

        
    //     if ($request->hasFile('cover_image')) {
    //         // Delete old main image
    //         if ($aboutData->image && Storage::disk('public')->exists($aboutData->cover_image)) {
    //             Storage::disk('public')->delete($aboutData->cover_image);
    //         }
    
    //         $data['cover_image'] = $request->file('cover_image')->store('aboutData', 'public');
    //     }

       
        
    //     // Update article
    //     $aboutData->update($data);
    
   
    //     return redirect()->route('admin.aboutdata.edit')->with('success', 'تم تعديل المقال بنجاح');
    // }

    public function update(AboutDataRequest $request)
    {
        $data = $request->validated();
        $aboutData = AboutData::first();

        // 1️⃣ الصور الأساسية: image, message_image, vision_image, cover_image
        foreach (['image', 'message_image', 'vision_image', 'cover_image'] as $field) {
            if ($request->hasFile($field)) {
                // حذف الصورة القديمة إن وجدت
                if ($aboutData->$field && Storage::disk('public')->exists($aboutData->$field)) {
                    Storage::disk('public')->delete($aboutData->$field);
                }

                $data[$field] = $request->file($field)->store('aboutData', 'public');
            } else {
                // الحفاظ على الصورة القديمة إن لم يتم تعديلها
                $data[$field] = $aboutData->$field;
            }
        }

        // 2️⃣ معالجة قسم التاريخ history_section
        $data['history_section'] = $request->history_section ?? [];

        // 3️⃣ معالجة قسم الفريق مع الصور
        $team_section = [];

        foreach ($request->input('team_section', []) as $index => $member) {
            $member_data = $member;

            if ($request->hasFile("team_section.$index.image")) {
                $uploadedImage = $request->file("team_section.$index.image");
                $path = $uploadedImage->store("aboutData/team", "public");
                $member_data['image'] = $path;
            } else {
                // احتفظ بالصورة القديمة إن لم تُرفع صورة جديدة
                $member_data['image'] = $aboutData->team_section[$index]['image'] ?? null;
            }

            $team_section[] = $member_data;
        }

        $data['team_section'] = $team_section;

        // 4️⃣ التحديث النهائي
        $aboutData->update($data);

        return redirect()->route('admin.aboutdata.edit')->with('success', 'تم تعديل البيانات بنجاح');
    }


    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'تم حذف المقال بنجاح');
    }
}
