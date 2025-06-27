<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AboutResource;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ClientResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\NewsResource;
use App\Models\AboutData;
use App\Models\Article;
use App\Models\Client;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $hero = [
            'title' => '',
            'sub_title' => '',
            'image' => ''
        ];

        $statistics = [
            'beneficiaries_count' => 150,
            'project_count' => 456,
            'partner_count' => 15,
            'years_experience_count' => 15 
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
                'team' => $statistics,
                'about' => $about,
                'articles' => $articles,
                'clients' => $clients,
            ],
            'error' => [null]
        ]);
    }


    public function projects(Request $request)
    {
         $limit = $request->has('limit') ? $request->get('limit') : 1;
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
                'featured_article' => new NewsResource($featuredArticle),
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
}

