<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CommonController;
use App\Model\Movie;
use App\Model\Category;
use App\Model\Country;
use Illuminate\Support\Facades\Validator;

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
}
