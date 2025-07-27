<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AboutResource;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ClientResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\NewsResource;
use App\Http\Resources\ReportResource;
use App\Http\Resources\SiteSettingResource;
use App\Models\AboutData;
use App\Models\Article;
use App\Models\Client;
use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\Report;
use App\Models\Contact;

class HomeController extends Controller
{
    public function index()
    {
        $locale = app()->getLocale();
        $siteSetting = SiteSetting::first();
        $hero = [
            'title' => $siteSetting->hero_title[$locale] ?? null,
            'hero_body' => $siteSetting->hero_body[$locale] ?? null,
            'hero_image' => $siteSetting->hero_image ? asset('storage/' . $siteSetting->hero_image) : null,
        ];

        $statistics = [
            'beneficiaries_count' => $siteSetting->beneficiaries_count ?? 0,
            'project_count' => $siteSetting->project_count ?? 0,
            'partner_count' => $siteSetting->partner_count ?? 0,
            'years_experience_count' => $siteSetting->years_experience_count ?? 0 
        ];

        $about = new AboutResource(AboutData::first());
        $articles = ArticleResource::collection(
            Article::where('status', 'published')->orderBy('published_at', 'desc')->limit(3)->get()
        );
        $clients = ClientResource::collection(Client::all());

        return response()->json([
            'status' => true,
            'message' => __('Success'),
            'data' => [
                'hero' => $hero,
                'statistics' => $statistics,
                'about' => $about,
                'articles' => $articles,
                'clients' => $clients,
                'site_setting' => new SiteSettingResource($siteSetting)
            ],
            'error' => [null]
        ]);
    }


    public function about()
    {
        $about = new AboutResource(AboutData::first());


        return response()->json([
            'status' => true,
            'message' => __('Success'),
            'data' => [
                'about' => $about,
            ],
            'error' => [null]
        ]);
    }


    public function projects(Request $request)
    {
         $limit = $request->has('limit') ? $request->get('limit') : 10;
         $projects = ProjectResource::collection(Project::paginate($limit));

        return response()->json([
            'status' => true,
            'message' => __('Success'),
            'data' => [
                'projects' => $projects,
            ],
            'error' => [null]
        ]);
    }

    public function news(Request $request)
    {
        $limit = $request->has('limit') ? $request->get('limit') : 1;

        $featuredArticle = Article::where('is_featured', true)
                            ->where('status','published')
                            ->orderBy('published_at', 'desc')
                            ->first();


        $articles = Article::where('id', '!=', optional($featuredArticle)->id)
        ->where('status','published')
        ->orderBy('published_at', 'desc')
        ->paginate($limit);

        return response()->json([
            'status' => true,
            'message' => __('Success'),
            'data' => [
                'featured_article' => $featuredArticle != null ? new NewsResource($featuredArticle) : null,
                'articles' => NewsResource::collection($articles),
            ],
            'error' => [null]
        ]);
    }

    public function newsDetiles($id)
    {
        $news = Article::find($id);
      

        if ($news) {
             return response()->json([
                'status' => true,
                'message' => __('Success'),
                'data' => new NewsResource($news),
                'error' => [null]
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => __('Not Found'),
                'data' => null,
                'error' => [null]
            ]);
        }
    }


    public function reports(Request $request)
    {
         $limit = $request->has('limit') ? $request->get('limit') : 1;
         if($request->has('tag')){
             $data = ReportResource::collection(Report::where('tag',$request->tag)->get());
         }else{
             $data = ReportResource::collection(Report::get());
         }
         
         

        return response()->json([
            'status' => true,
            'message' => __('Success'),
            'data' => [
                'reports' => $data,
            ],
            'error' => [null]
        ]);
    }


    public function contact(Request $request)
    {
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'text' => $request->text,
            'number' => $request->number,
        ]);

        return response()->json([
            'status' => true,
            'message' => __('Success'),
            'data' => [null],
            'error' => [null]
        ]);
    }


    public function footer(Request $request)
    {
                  
        $siteSetting = SiteSetting::first();
        return response()->json([
            'status' => true,
            'message' => __('Success'),
            'data' => [
               'site_setting' => new SiteSettingResource($siteSetting)
            ],
            'error' => [null]
        ]);
    }
}

