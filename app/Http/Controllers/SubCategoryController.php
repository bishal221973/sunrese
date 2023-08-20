<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(SubCategory $subCategory)
    {
        $categories=Category::latest()->get();
        $subcategories=Subcategory::with('category')->latest()->get();
        return view('subCategory.index',compact('categories','subcategories','subCategory'));
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'category_id'=>'required',
            'name'=>'required',
        ]);

        SubCategory::create($data);

        return redirect()->back()->with('success',"New subcategory saveds successfully");
    }

    public function edit($id)
    {
        $subCategory=SubCategory::find($id);
        $categories=Category::latest()->get();
        $subcategories=Subcategory::with('category')->latest()->get();
        return view('subCategory.index',compact('categories','subcategories','subCategory'));
    }

    public function update(Request $request, $id)
    {
        $data=$request->validate([
            'category_id'=>'required',
            'name'=>'required',
        ]);

        SubCategory::find($id)->update($data);

        return redirect()->route('subcategory')->with('success',"Selected sub category updated successfully");
    }

    public function delete($id)
    {
        SubCategory::find($id)->delete();
        return redirect()->back()->with('success',"Selected subcategory successfully removed");
    }

    public function get($id)
    {
        $subcategories = SubCategory::where('category_id',$id)->get();
  
        return response()->json($subcategories);
    }
}
