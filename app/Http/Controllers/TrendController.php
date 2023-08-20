<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class TrendController extends Controller
{
    public function trend($id)
    {
        $blogs= Profile::with('blog')->find($id);
        $Profiles=Profile::latest()->get();

        return view('blog.trendBlog',compact('blogs','Profiles'));
    }
}