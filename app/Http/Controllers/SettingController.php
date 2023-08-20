<?php

namespace App\Http\Controllers;

use App\Models\WebSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $websetting=WebSetting::first();
        return view('setting',compact('websetting'));
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'app_short_name'=>"nullable",
            'app_full_name'=>"nullable",
            'app_logo'=>"nullable",
            'fav_icon'=>"nullable",
        ]);

        if ($request->file('app_logo')) {
            // return "img";
            $data['app_logo'] = $request->file('app_logo')->store('logo');
        }
        if ($request->file('fav_icon')) {
            // return "img";
            $data['fav_icon'] = $request->file('fav_icon')->store('logo');
        }

        WebSetting::create($data);

        return redirect()->back()->with("success","Web Setting changed.");
    }

    public function update(Request $request, WebSetting $webSetting)
    {
        $data=$request->validate([
            'app_short_name'=>"nullable",
            'app_full_name'=>"nullable",
            'app_logo'=>"nullable",
            'fav_icon'=>"nullable",
        ]);

        
        if ($request->file('app_logo')) {
            if ($webSetting->app_logo != null) {
                Storage::delete($webSetting->app_logo);
            }
            // return "img";
            $data['app_logo'] = $request->file('app_logo')->store('logo');
        }

        if ($request->file('fav_icon')) {
            if ($webSetting->fav_icon != null) {
                Storage::delete($webSetting->fav_icon);
            }
            // return "img";
            $data['fav_icon'] = $request->file('fav_icon')->store('logo');
        }

        $webSetting->update($data);

        return redirect()->back()->with("success","Web Setting changed.");   
    }

    public function getImage($filename)
    {
        $path = storage_path('app/public/' . $filename);
    
    if (file_exists($path)) {
        $image = file_get_contents($path);
        $mimeType = mime_content_type($path);
        return response($image, 200)->header('Content-Type', $mimeType);
    } else {
        abort(404);
    }
    }
}
