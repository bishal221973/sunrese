<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Video $video)
    {
        $videos=Video::latest()->get();
        return view('video.index',compact('videos','video'));
    }

    public function store(Request $request)
    {
        // return $request;
        Video::create($request->validate([
            'name'=>"required",
            'iframe'=>"required",
        ]));

        return redirect()->back()->with("success","New video saved");
    }

    public function edit(Video $video)
    {
        $videos=Video::latest()->get();
        return view('video.index',compact('videos','video'));
    }

    public function update(Request $request, Video $video)
    {
        $video->update($request->validate([
            'name'=>"required",
            'iframe'=>"required",
        ]));

        return redirect()->route('video')->with('success',"Video successfully update");
    }

    public function delete(Video $video)
    {
        $video->delete();
        return redirect()->back()->with('success','Selected video sucessfully removed');
    }
}
