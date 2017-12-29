<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CommonController;
use App\Model\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * 分类列表
     */
    public function categoryList(Request $request, Category $category)
    {
        $categorys = $category->all();

        return view('admin.movies.cateList')
                ->with('page_header', 'Categories')
                ->with('page_header_desc', 'list')
                ->with('categorys', $categorys);
    }

    /**
     * 新增分类
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|min:2|max:32|except_character|unique:categories'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'msg' => $validator->errors()->first('name')]);
        }

        $category = new Category;
        $category->name = $request->get('name');
        if($category->save()) {
            return response()->json(['status' => 1, 'msg' => 'Add category success!']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Add category failed!']);
        }
    }
}
