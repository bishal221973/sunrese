<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use App\Models\Profile;
use App\Models\SelectedTag;
use App\Models\SubCategory;
use App\Models\Trending;
use App\Models\Video;
use App\Models\WebSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Process;
class FrontController extends Controller
{
    public function index()
    {   $trendingPosts = Trending::with('post')->get();
        $topLatestPosts = Post::latest()->limit('2')->get();
        $latestNewses = Post::latest()->limit('5')->get();

        $agricultures = Post::where('category_id', '5')->latest()->limit('5')->get();
        $entertainmentNewses = Post::where('category_id', '8')->latest()->limit('5')->get();
        $sportNewses = Post::where('category_id', '10')->latest()->limit('4')->get();
        $internationalNewses = Post::where('category_id', '9')->latest()->limit('5')->get();
        $videos = Video::latest()->limit('5')->get();
        $Profiles = Profile::latest()->limit('8')->get();
        // return $topLatestPost;
        return view("front.home", compact('topLatestPosts', 'latestNewses', 'agricultures', 'entertainmentNewses', 'sportNewses', 'internationalNewses', 'videos', 'trendingPosts', 'Profiles'));
    }


    public function postDetail($id)
    {
        $relatedPost = [];
        if (SelectedTag::where('post_id', $id)->first()) {
            $tagId = SelectedTag::where('post_id', $id)->first()->tag_id;
            $relatedPost = SelectedTag::where('tag_id', $tagId)->with('post')->limit('8')->get();
        }
        $currentViews = Post::find($id)->views;
        Post::find($id)->update([
            'views' => $currentViews + 1,
        ]);
        $shareComponent = \Share::page(
            // 'https://youtu.be/fa-c2fY_tOQ',
            // 'Your share text comes here',
            url(url()->current()),
            '',
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit();
        $post = Post::find($id);
        $title = $post->title;
        $recentPosts = Post::latest()->limit('4')->get();
        $mostWatcheds = Post::orderBy('views', 'desc')->limit('4')->get();
        // return $mostWatcheds;
        return view('front.postDetail', compact('title', 'shareComponent', 'post', 'recentPosts', 'mostWatcheds', 'relatedPost'));
    }

    public function news()
    {
        $title = '-समाचार';
        $selected = '';
        $subCategories = [];
        $profiles = [];
        $posts = Post::where('category_id', '1')->latest()->get();
        return view('components.front.list', compact('title', 'posts', 'selected', 'subCategories', 'profiles'));
    }

    public function province()
    {
        $title = '-प्रदेश';
        $subCategories = SubCategory::where('category_id', '2')->get();
        $profiles = [];
        $posts = Post::where('category_id', '2')->latest()->get();
        return view('front.postList', compact('title', 'posts', 'subCategories', 'profiles'));
    }
    public function provinceAll()
    {
        $title = '-प्रदेश';
        $selected = '';
        $subCategories = SubCategory::where('category_id', '2')->get();
        $posts = Post::where('category_id', '2')->latest()->get();
        $profiles = [];
        return view('components.front.list', compact('title', 'posts', 'subCategories', 'selected', 'profiles'));
    }

    public function provinceId($id)
    {
        $selected = $id;
        $title = '-प्रदेश';
        $subCategories = SubCategory::where('category_id', '2')->get();
        $posts = Post::where('sub_category_id', $id)->latest()->get();
        return view('components.front.list', compact('title', 'posts', 'subCategories', 'selected'));
    }

    public function interview()
    {
        $title = '-अन्तर्वार्ता';
        $profiles = [];
        $posts = Post::where('category_id', '3')->latest()->get();
        return view('components.front.list', compact('title', 'posts', 'profiles'));
    }

    public function blog()
    {
        $title = '-विचार';
        $posts = Blog::latest()->get();
        $profiles = Profile::latest()->limit('8')->get();
        return view('components.front.blogList', compact('title', 'posts', 'profiles'));
    }

    public function blogDetail($id)
    {
        $relatedPost = [];
        if (SelectedTag::where('post_id', $id)->first()) {
            $tagId = SelectedTag::where('post_id', $id)->first()->tag_id;
            $relatedPost = SelectedTag::where('tag_id', $tagId)->with('post')->limit('8')->get();
        }
        if (Blog::find($id)) {
        }
        $currentViews = Blog::find($id)->views;
        Blog::find($id)->update([
            'views' => $currentViews + 1,
        ]);
        $shareComponent = \Share::page(
            // 'https://youtu.be/fa-c2fY_tOQ',
            // 'Your share text comes here',
            url(url()->current()),
            '',
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit();
        $post = Blog::find($id);
        $title = $post->title;
        $recentPosts = Post::latest()->limit('4')->get();
        $mostWatcheds = Post::orderBy('views', 'desc')->limit('4')->get();

        return view('front.postDetail', compact('title', 'shareComponent', 'post', 'recentPosts', 'mostWatcheds', 'relatedPost'));
    }

    public function agriculture()
    {
        $title = '-कृषि';
        $posts = Post::where('category_id', '5')->latest()->get();
        return view('components.front.list', compact('title', 'posts'));
    }

    public function feature()
    {
        $title = '-फिचर';
        $posts = Post::where('category_id', '6')->latest()->get();
        return view('components.front.list', compact('title', 'posts'));
    }

    public function health()
    {
        $title = '-स्वास्थ्य';
        $posts = Post::where('category_id', '7')->latest()->get();
        return view('components.front.list', compact('title', 'posts'));
    }

    public function saptaranga()
    {
        $title = '-सप्तरङ';
        $posts = Post::where('category_id', '8')->latest()->get();
        return view('components.front.list', compact('title', 'posts'));
    }

    public function international()
    {
        $title = '-विश्व';
        $posts = Post::where('category_id', '9')->latest()->get();
        return view('components.front.list', compact('title', 'posts'));
    }

    public function sports()
    {
        $title = '-खेलकुद';
        $posts = Post::where('category_id', '10')->latest()->get();
        return view('components.front.list', compact('title', 'posts'));
    }
    public function rochak()
    {
        $title = '-रोचक';
        $posts = Post::where('category_id', '11')->latest()->get();
        return view('components.front.list', compact('title', 'posts'));
    }

    public function updateDependencies(Request $request)
    {
        // Use Symfony Process to execute the composer update command
        Artisan::call('composer:update');


            return 'Composer update started.';


    }
}
