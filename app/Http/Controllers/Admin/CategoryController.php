<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CommonController;
use App\Model\Category;

class CategoryController extends Controller
{
    public function categoryList(Request $request, Category $category)
    {
    	$categorys = $category->all();

    	return view('admin.movies.cateList')
    			->with('page_header', 'Categories')
    			->with('page_header_desc', 'list')
                ->with('categorys', $categorys);
    }


    public function showAddForm(Request $request)
    {
    	return view('admin.movies.cateAdd')
    			->with('page_header', 'Category')
    			->with('page_header_desc', 'add');
    }
}
