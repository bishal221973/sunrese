<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SelectedTag;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Auth;
use Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $posts = Post::with(['category', 'user', 'tag.tag','trending'])->latest()->get();
        // return $posts;
        return view("post.index", compact('posts'));
    }

    public function create(Post $post)
    {
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        $selectedTags = [];
        return view('post.form', compact(['categories', 'tags', 'post', 'selectedTags']));
    }
    public function store(Request $request)
    {
        $postData = $request->validate([
            'title' => 'required',
            'thumbnail_img' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'nullable',
        ]);

        if ($request->file("thumbnail_img")) {
            $postData['thumbnail_img'] = $request->file('thumbnail_img')->store('images');
        }
        $postData['user_id'] = Auth::id();
        $postData['publication_date'] = date('Y-m-d');



        // $description = $request->input('content');
        // $dom = new \DOMDocument();

        // $dom->loadHTML($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        // $images = $dom->getElementsByTagName('img');

        // foreach ($images as $k => $img) {
        //     $image_64 = $img->getAttribute("src");
        //     $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
        //     $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
        //     $image = str_replace($replace, '', $image_64);
        //     $image = str_replace('', '+', $image);
        //     $imageName = Str::random(10) . '.' . $extension;
        //     $image_name = "/images/" . $imageName;


        //     $path = public_path();

        //     $img->removeAttribute('src');
        //     $img->setAttribute('src', $image_name);

        // }
        // $postData['content'] = $description;

        Post::create($postData);

        $postId = Post::latest()->first()->id;
        if ($request->tag_id != "") {
            foreach ($request->tag_id as $tagId) {
                SelectedTag::create([
                    'post_id' => $postId,
                    'tag_id' => $tagId,
                ]);
            }
        }

        return redirect()->back()->with('success', "New post successfully published");

        // }

    }

    public function edit(Post $post)
    {
        $categories = Category::latest()->get();
        $selectedTags = SelectedTag::where('post_id', $post->id)->get();
        // return $selectedTags;
        $tags = Tag::latest()->get();
        return view('post.form', compact(['categories', 'tags', 'post', 'selectedTags']));
    }

    public function update(Request $request, Post $post)
    {
        $postData = $request->validate([
            'title' => 'required',
            // 'thumbnail_img' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'nullable',
        ]);
        if ($request->file("thumbnail_img")) {
            if ($post->thumbnail_img != null) {
                Storage::delete($post->thumbnail_img);
            }
            $postData['thumbnail_img'] = $request->file('thumbnail_img')->store('images');
        }
        $postData['user_id'] = Auth::id();
        $postData['publication_date'] = date('Y-m-d');

        $post->update($postData);

        SelectedTag::where('post_id', $post->id)->delete();
        if ($request->tag_id != "") {

            foreach ($request->tag_id as $tagId) {
                SelectedTag::create([
                    'post_id' => $post->id,
                    'tag_id' => $tagId,
                ]);
            }
        }

        return redirect()->route('post')->with('success', "Updated");
    }

    public function delete(Post $post)
    {
        if ($post->thumbnail_img != null) {
            Storage::delete($post->thumbnail_img);
        }
        $post->delete();

        return redirect()->back()->with('success', "Selected post removed");
    }
}
