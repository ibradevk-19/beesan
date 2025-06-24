<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSlider;
use App\Models\Client;
use App\Models\Article;
use App\Models\AboutData;
use App\Models\SiteSetting;
use App\Models\Service;
use App\Models\Project;
use App\Models\Announcement;
use App\Models\Contact;

use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index()  {



          $sliders = HeroSlider::where('status', '1')
                 ->select(['url',
                            'image',
                            'title_ar',
                            'title_en',
                            'sub_title_ar',
                            'sub_title_en',
                            'have_but',
                            'but_title_ar',
                            'but_title_en',
                            'status'
                 ])
                 ->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->{getLoclaKey('title')},
                    'sub_title' => $item->{getLoclaKey('sub_title')},
                    'but_title' => $item->{getLoclaKey('but_title')},
                    'image' => $item->image,
                    'url' => $item->url,
                    'have_but' => $item->have_but,
                ];
        })->toArray();

        $clients = Client::get();

        $featuredArticle = Article::where('is_featured', true)
                            ->where('status','published')
                            ->orderBy('published_at', 'desc')
                            ->first();


        $articles = Article::where('id', '!=', optional($featuredArticle)->id)
        ->where('status','published')
        ->orderBy('published_at', 'desc')
        ->limit(3)
        ->get();


        $aboutData = AboutData::first();
        $settings = SiteSetting::first(); // نفترض أن هناك سجل واحد فقط
        // return view('frontend.home')->with([
        //     'sliders' => $sliders,
        //     'clients' => $clients,
        //     'featuredArticle' => $featuredArticle,
        //     'articles' => $articles,
        //     'aboutData' => $aboutData,
        //     'settings' => $settings,
        //     'description' => null,
        //     'page_title' => __('Home'),
        // ]);
        return view('home-main');
    }


    public function show($slug)  {

        $article = Article::where('slug', $slug)->where('status','published')->first();
        $settings = SiteSetting::first(); // نفترض أن هناك سجل واحد فقط

        return view('frontend.show')->with([
            'article' => $article,
            'settings' => $settings,
            'page_title' => $article->TranslatedTitle,
            'description' => $article->TranslatedMetaDescription,
            'og_image' => asset('storage/' . $article->image),
        ]);
    }


    public function about()  {

          $settings = SiteSetting::first();
          $aboutData = AboutData::first();
        return view('frontend.about-us')->with([
            'settings' => $settings,
            'aboutData' => $aboutData,
            'description' => null,
            'page_title' => __('About Us'),

        ]);
    }


    public function news()  {

        $settings = SiteSetting::first();
        $aboutData = AboutData::first();
        $articles = Article::latest()->paginate(6);

      return view('frontend.news')->with([
          'settings' => $settings,
          'aboutData' => $aboutData,
          'description' => null,
          'articles' => $articles,
          'page_title' => __('News'),

      ]);
  }

  public function loadMore(Request $request)  {

        if ($request->ajax()) {
            $page = $request->input('page', 1);
            $articles = Article::latest()->paginate(6, ['*'], 'page', $page);

            return view('frontend.articles.partials.article-items', compact('articles'))->render();
        }
        abort(404);

        }


        public function services()  {

            $settings = SiteSetting::first();
            $aboutData = AboutData::first();
            $services = Service::get();
          return view('frontend.services')->with([
              'settings' => $settings,
              'aboutData' => $aboutData,
              'description' => null,
              'page_title' => __('Services'),
              'services' => $services

          ]);
      }


      public function projects()  {

        $settings = SiteSetting::first();
        $aboutData = AboutData::first();
        $projects = Project::orderBy('id', 'desc')->get();

          return view('frontend.projects')->with([
                'settings' => $settings,
                'aboutData' => $aboutData,
                'description' => null,
                'page_title' => __('Projects'),
                'projects' => $projects
            ]);
        }



      public function contact()  {

        $settings = SiteSetting::first();
        $aboutData = AboutData::first();

            return view('frontend.contact')->with([
                'settings' => $settings,
                'aboutData' => $aboutData,
                'description' => null,
                'page_title' => __('Contact Us'),
            ]);
        }

        public function contactStore(Request $request)
        {
            $request->validate([
                'email'   => 'required|email',
                'name'    => 'required|string|max:255',
                'number'  => 'required|string|max:20',
                'subject' => 'required|string|max:255',
                'text'    => 'required|string',
            ]);

            Contact::create([
                'email'    => $request->email,
                'name'     => $request->name,
                'number'   => $request->number,
                'subject'  => $request->subject,
                'text'     => $request->text,
                'is_reply' => false,
            ]);

            return back()->with('success', __('Your message has been sent successfully.'));
        }


        public function announcements()  {

            $settings = SiteSetting::first();
            $aboutData = AboutData::first();
            $announcements = Announcement::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->paginate(8);
                return view('frontend.announcements')->with([
                    'settings' => $settings,
                    'aboutData' => $aboutData,
                    'announcements' => $announcements,
                    'description' => null,
                    'page_title' => __('Announcements'),
                ]);
            }

}
