<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreArticleRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    public function index(Request $request){
        if ($request->ajax()) {
              $data = Article::query()->select(['id', 'title','image','status','type'])->get()->map(function ($item) {
                 return [
                     'id' => $item->id,
                     'title' => $item->translatedTitle,
                     'image' => $item->image,
                     'status' => $item->status,
                     'type' => $item->type,
                     'category' => $item->category?->translatedName ?? ''
                 ];
             })->toArray();
              return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', 'admin.articles.datatables.action') 
                  ->addColumn('image', 'admin.articles.datatables.image') 
                  ->addColumn('status', 'admin.articles.datatables.status') 
                  ->rawColumns(['action','image','status'])
                  ->make(true);
        }

         return view('admin.articles.index');
  
    }

    public function create()
    {
        return view('admin.articles.create')->with([
            'categories' => Category::all(),
        ]);
    }

    public function store(StoreArticleRequest $request)
    {
       
        $data = $request->validated();
       
        // Slug generation (from Arabic or English title if available)
        $data['slug'] = Str::slug($data['title']['en'] ?? $data['title']['ar']);
        $data['published_at'] = $request->published_at ?? now();
        // Image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article = Article::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('articles', 'public');
                $article->images()->create([
                    'image_path' => $path,
                    'order' => $index
                ]);
            }
        }
        return redirect()->route('articles.index')->with('success', 'تم إنشاء المقال بنجاح');
    }

    public function edit(Article $article)
    {
     
        $categories = Category::all();
       
        return view('admin.articles.edit', compact('article','categories'));
    }

    public function update(StoreArticleRequest $request, Article $article)
    {
        $data = $request->validated();

        // Slug regeneration
        $data['slug'] = Str::slug($data['title']['en'] ?? $data['title']['ar']);
    
        // Update main image
        if ($request->hasFile('image')) {
            // Delete old main image
            if ($article->image && Storage::disk('public')->exists($article->image)) {
                Storage::disk('public')->delete($article->image);
            }
    
            $data['image'] = $request->file('image')->store('articles', 'public');
        }
        
        $data['published_at'] = $request->published_at ?? now();
        // Update article
        $article->update($data);
    
        // Delete old gallery images if new ones are uploaded
        if ($request->hasFile('images')) {
            // Delete old images from storage
            foreach ($article->images as $oldImage) {
                if ($oldImage->image_path && Storage::disk('public')->exists($oldImage->image_path)) {
                    Storage::disk('public')->delete($oldImage->image_path);
                }
            }
    
            // Delete from database
            $article->images()->delete();
    
            // Save new images
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('articles', 'public');
                $article->images()->create([
                    'image_path' => $path,
                    'order' => $index
                ]);
            }
        }
        return redirect()->route('articles.index')->with('success', 'تم تعديل المقال بنجاح');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'تم حذف المقال بنجاح');
    }
}
