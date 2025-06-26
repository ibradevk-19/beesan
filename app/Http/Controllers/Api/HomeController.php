<?php

namespace App\Http\Controllers\Api;

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutResource;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ClientResource;
use App\Models\AboutData;
use App\Models\Article;
use App\Models\Client;

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
}

