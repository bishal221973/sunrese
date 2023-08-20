<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(Profile $profile)
    {
        $profiles=Profile::latest()->get();
        return view('profile.index',compact('profiles','profile'));
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required',
            'address'=>'nullable',
            'contact'=>'nullable',
            'profile'=>'nullable',
        ]);

        if ($request->file("profile")) {
            $data['profile'] = $request->file('profile')->store('profile');
        }
        Profile::create($data);

        return redirect()->back()->with('success',"New profile saved");
    }

    public function edit(Profile $profile)
    {
        $profiles=Profile::latest()->get();
        return view('profile.index',compact('profiles','profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $data=$request->validate([
            'name'=>'required',
            'address'=>'nullable',
            'contact'=>'nullable',
            'profile'=>'nullable',
        ]);
        if ($request->file("profile")) {
            if ($profile->profile != null) {
                Storage::delete($profile->profile);
            }
            $data['profile'] = $request->file('profile')->store('profile');
        }   

        $profile->update($data);

        return redirect()->route('profile')->with('success','selected profile successfully update');
    }

    public function delete(Profile $profile)
    {
        if ($profile->profile != null) {
            Storage::delete($profile->profile);
        }
        $profile->delete();
        return redirect()->back()->with('success',"Selected profile removed");
    }
}
