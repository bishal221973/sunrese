<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Ad $ad)
    {
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'url' => 'nullable',
            'image' => 'required',
            'location' => 'required',
        ]);

        $data['image'] = $request->file('image')->store('ads');

        Ad::create($data);

        return redirect()->back()->with('success', 'New advertisement successfully saved');
    }

    public function update(Request $request, Ad $ad)
    {
        $data = $request->validate([
            'name' => 'required',
            'url' => 'nullable',
            'image'=>'nullable',
            // 'location' => 'required',
        ]);
        if ($request->file("image")) {
            if ($ad->image != null) {
                Storage::delete($ad->image);
            }
            $data['image'] = $request->file('image')->store('ads');
        }
        $ad->update($data);
        return $request;
        if($request->redirect=="body"){
            return redirect()->route('body.ads')->with('succes', 'selected ads successfully updated');
        }
        if($request->redirect=="all"){
            return redirect()->route('all.ads')->with('succes', 'selected ads successfully updated');
        }
        if($request->redirect=="detail"){
            return redirect()->route('detail.ads')->with('succes', 'selected ads successfully updated');
        }
    }
    public function header(Ad $ad)
    {
        if (Ad::first()) {

            $ad = Ad::first();
        }
        $sub_title = "Header";
        $ads = Ad::where('location','header')->latest()->get();
        return view('components.admin.headerAds', compact('ad', 'ads', 'sub_title'));
    }

    public function body(Ad $ad)
    {
        $sub_title = "Body";
        $ads = Ad::where('location', 'Top of news section')->orWhere('location', 'Side of news section')->orWhere('location', 'Top of video section')->orWhere('location', 'Top of agriculture section')->orWhere('location', 'Side of agriculture section')->orWhere('location', 'Top of entertainment section')->orWhere('location', 'Top of sports section')->orWhere('location', 'Top of world section')->orWhere('location', 'Side of world section')->orWhere('location', 'Top of footer section')->latest('location', '')->get();
        return view('components.admin.bodyAds', compact('ad', 'ads', 'sub_title'));
    }

    public function editHome(Ad $ad)
    {
        $sub_title = "Body";
        if($ad->location=='Top of title' || $ad->location=='Bottom of title' || $ad->location=='Bottom Side' || $ad->location=='Right Side'){

            $ads = Ad::where('location', 'Top of title')->orWhere('location', 'Bottom of title')->orWhere('location','Bottom Side')->orWhere('location','Right Side')->orWhere('location','In-List 1')->latest()->get();
        }else{

            // $ads = Ad::where('location', 'All page left')->orWhere('location', 'All page right')->orWhere('location','Below of Menu')->orWhere('location','Top of List')->orWhere('location','In-List 1')->orWhere('location','In-List 2')->orWhere('location','In-List 3')->orWhere('location','In-List 4')->orWhere('location', 'Top of Footer')->latest()->get();
            $ads = Ad::where('location', 'Top of news section')->orWhere('location', 'Side of news section')->orWhere('location', 'Top of video section')->orWhere('location', 'Top of agriculture section')->orWhere('location', 'Side of agriculture section')->orWhere('location', 'Top of entertainment section')->orWhere('location', 'Top of sports section')->orWhere('location', 'Top of world section')->orWhere('location', 'Side of world section')->orWhere('location', 'Top of footer section')->latest('location', '')->get();
        }
        return view('components.admin.bodyAds', compact('ad', 'ads', 'sub_title'));
    }

    public function alleditHome(Ad $ad)
    {
        $sub_title = "All";
        $ads = Ad::where('location', 'All page left')->orWhere('location', 'All page right')->orWhere('location','Below of Menu')->orWhere('location','Top of List')->orWhere('location','In-List 1')->orWhere('location','In-List 2')->orWhere('location','In-List 3')->orWhere('location','In-List 4')->orWhere('location', 'Top of Footer')->latest()->get();
        
        return view('components.admin.allPageAds', compact('ad', 'ads', 'sub_title'));
    }
    public function delete(Ad $ad)
    {
        if ($ad->image != null) {
            Storage::delete($ad->image);
        }
        $ad->delete();

        return redirect()->back()->with('success','selected ads removed');
    }

    public function all(Ad $ad)
    {
        $sub_title = "All Page";
        $ads = Ad::where('location', 'All page left')->orWhere('location', 'All page right')->orWhere('location','Below of Menu')->orWhere('location','Top of List')->orWhere('location','In-List 1')->orWhere('location','In-List 2')->orWhere('location','In-List 3')->orWhere('location','In-List 4')->orWhere('location', 'Top of Footer')->latest()->get();
        return view('components.admin.allPageAds', compact('ad', 'ads', 'sub_title'));
    }

    public function detail(Ad $ad)
    {
        $sub_title = "Detail Page";
        $ads = Ad::where('location', 'Top of title')->orWhere('location', 'Bottom of title')->orWhere('location', 'Bottom Side')->orWhere('location', 'Right Side')->get();
        return view('components.admin.detailAds', compact('ad', 'ads', 'sub_title'));
    }
}
