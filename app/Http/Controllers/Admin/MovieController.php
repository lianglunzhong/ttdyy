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
use Illuminate\Support\Facades\DB;

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
        $this->validate($request, [
            'name' => 'required|unique:movies'
        ]);

        DB::beginTransaction();
        try {
            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
        }

        dd($request->all());
    }


    /**
     * 新增时多图上传
     */
    public function uploadImages(Request $request)
    {   
        // 文件是否存在
        if(!$request->hasFile('images')) {
            return response()->json(['status' => 0, 'msg' => '图片不存在']);
        }

        $pathArr = array();

        // 多文件上传，循环处理
        foreach ($request->file('images') as $file) {
            // 文件是否有效
            if(!$file->isValid()) {
                return response()->json(['status' => 0, 'msg' => $file->getErrorMessage()]);
            }

            // 文件类型BMP、JPG、JPEG、PNG、GIF
            $imageExt = array('bmp', 'jpg', 'jpeg', 'png', 'gif');
            $ext = $file->getClientOriginalExtension();
            if(!in_array($ext, $imageExt)) {
                return response()->json(['status' => 0, 'msg' => '只允许上传图片']);
            }

            $path = $file->store('upload/movies/temporary', 'public');

            array_push($pathArr, $path);
        }
        
        return response()->json(['status' => 1, 'files' => $pathArr]);
    }
}