<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(Blog $blog)
    {
        $blogs=Blog::with('profile')->latest()->get();
        return view('blog.index',compact('blog','blogs'));
    }
    public function create(Blog $blog)
    {
        $profiles=Profile::latest()->get();
        return view('blog.form',compact('profiles','blog'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $data=$request->validate([
            'title'=>'required',
            'profile_id'=>'required',
            'thumbnail_img'=>'required',
            'content'=>'required',
            // 'title'=>'required',
        ]);

        if ($request->file("thumbnail_img")) {
            $data['thumbnail_img'] = $request->file('thumbnail_img')->store('thumbnail_img');
        }

        Blog::create($data);

        return redirect()->back()->with('success',"New blog saved");
    }

    public function edit(Blog $blog)
    {
        $profiles=Profile::latest()->get();
        return view('blog.form',compact('profiles','blog'));
    }

    public function update(Request $request,Blog $blog)
    {
        $data=$request->validate([
            'title'=>'required',
            'profile_id'=>'required',
            'thumbnail_img'=>'nullable',
            'content'=>'required',
        ]);

        if ($request->file("thumbnail_img")) {
            if ($blog->thumbnail_img != null) {
                Storage::delete($blog->thumbnail_img);
            }
            $data['thumbnail_img'] = $request->file('thumbnail_img')->store('thumbnail_img');
        }

        $blog->update($data);

        return redirect()->route('blog')->with('success',"New blog saved");
    }

    public function delete($blog)
    {
        
        if (Blog::find($blog)->thumbnail_img != null) {
            Storage::delete(Blog::find($blog)->thumbnail_img);
        }
        Blog::find($blog)->delete();

        return redirect()->back()->with('success','Selected blog removed');
    }
}
