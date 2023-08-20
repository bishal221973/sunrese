<?php

namespace App\Http\Controllers;

use App\Models\Trending;
use Illuminate\Http\Request;

class TrendingController extends Controller
{
    public function store(Request $request)
    {
        $exist = Trending::where('post_id', $request->post_id)->first();

        // if (!$exist) {

            Trending::create($request->validate([
                'post_id' => 'required',
            ]));
        // }
        return;
    }

    public function delete(Request $request)
    {
        Trending::where('post_id',$request->post_id)->delete();
    }
}
