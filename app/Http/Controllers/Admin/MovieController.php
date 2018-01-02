<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CommonController;
use App\Model\Movie;
use Illuminate\Support\Facades\Validator;

class MovieController extends CommonController
{
    /**
     * 电影列表
     */
    public function moviesList(Request $request, Movie $movie)
    {
        $movies = $movie->all();

        return view('admin.movies.movieList')
                ->with('page_header', 'Movie')
                ->with('page_header_desc', 'list')
                ->with('movies', $movies);
    }
}
