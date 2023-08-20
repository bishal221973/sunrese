<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Tag $tag)
    {
        $tags=Tag::latest()->get();
        return view('tag.index',compact('tags','tag'));
    }

    public function store(Request $request)
    {
        Tag::create($request->validate([
            'tag_name'=>"required|unique:tags,tag_name",
        ]));

        return redirect()->back()->with("success","New tag name saved");
    }

    public function edit(Tag $tag)
    {
        $tags=Tag::latest()->get();
        return view('tag.index',compact('tags','tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->validate([
            'tag_name'=>'required|unique:tags,tag_name,'. $tag->id
        ]));

        return redirect()->route('tag')->with("success","Selected tag updated");
    }


    public function delete(Tag $tag)
    {
        $tag->delete();

        return redirect()->back()->with("success","Selected tag deleted");
    }
}
