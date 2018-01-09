<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CommonController;
use App\Model\Movie;
use App\Model\Category;
use App\Model\Country;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class MovieController extends CommonController
{
    /**
     * 电影列表
     */
    public function moviesList(Request $request)
    {
        // $movies = Movie::find(1)->categories()->where('visible', 1);
        $movies = Movie::whereHas('categories', function($query) {
            $query->where('visible', 1);
        })->get();

        return view('admin.movies.movieList')
                ->with('page_header', 'Movie')
                ->with('page_header_desc', 'List')
                ->with('movies', $movies);
    }


    /**
     * 电影新增页面
     */
    public function showCreateForm(Request $request)
    {
        $categories = Category::all();
        $countries = Country::all();
        return view('admin.movies.movieCreate')
                ->with('page_header', 'Movie')
                ->with('page_header_desc', 'Create')
                ->with('categories', $categories)
                ->with('countries', $countries);
    }

    /**
     * 电影新增保存
     */
    public function store(Request $request)
    {
        $path = $request->images->store('public');
        Log::info('lianglunzhong');
        Log::info(json_encode($path));
        return response()->json($data);
    }


    /**
     * 新增时多图上传
     */
    public function uploadImages(Request $request)
    {   
        if(!$request->hasFile('images')) {
            return response()->json(['status' => 0, 'msg' => '图片不存在']);
        }

        if(!$request->file('images')->isValid()) {
            return response()->json(['status' => 0, 'msg' => $request->file('images')->getErrorMessage()]);
        }
        $path = $request->file('images')->store('movies', 'public');
        return response()->json(['status' => 1, 'path' => $path, 'url' => asset('storage/'.$path)]);
    }
}