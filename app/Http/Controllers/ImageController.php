<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        return "sdf";
        if($request->hasFile('upload')){
            $orginalName=$request->file('upload')->getClientOriginalName();
            $fileName=pathinfo($orginalName,PATHINFO_FILENAME);
            $extension=$request->file('upload')->getClientOriginalExtension();
            $fileName=$fileName . "_" . time() . "." .$extension;

            $request->file('upload')->move(public_path('media'),$fileName);
            $url=asset('media/'. $fileName);

            return response()->json([
                'fileName'=>$fileName,
                'uploaded'=>1,
                'url'=>$url
            ]);
        }
    }

    public function upload(Request $request)
    {
        return "sfsdf";
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $fileName);

            // Return the URL of the uploaded image
            return response()->json([
                'url' => asset('uploads/' . $fileName),
            ]);
        }
}}
