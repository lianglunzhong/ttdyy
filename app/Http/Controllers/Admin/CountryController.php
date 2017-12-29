<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CommonController;
use App\Model\Country;
use Illuminate\Support\Facades\Validator;

class CountryController extends CommonController
{
    /**
     * 国家列表
     */
    public function countryList(Request $request, Country $country)
    {
        $countries = $country->all();

        return view('admin.movies.countryList')
                ->with('page_header', 'Countries')
                ->with('page_header_desc', 'list')
                ->with('countries', $countries);
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


        if(Country::create(['name' => $request->get('name')])) {
            return response()->json(['status' => 1, 'msg' => 'Add country success!']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Add country failed!']);
        }
    }
}
