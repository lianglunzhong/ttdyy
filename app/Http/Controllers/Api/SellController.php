<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SellController extends Controller
{
    public function seller(Request $request)
    {
        $data = Storage::disk('public')->get('sellData.json');
        $data = json_decode($data);
        $seller = $data->seller;
        
        return $request['callback'] . "(" . json_encode(['status' => 1, 'data' => $seller]) . ")";
    }


    public function goods(Request $request)
    {
        $data = Storage::disk('public')->get('sellData.json');
        $data = json_decode($data);
        $goods = $data->goods;
        
        return $request['callback'] . "(" . json_encode(['status' => '1', 'data' => $goods]) . ")";
    }


    public function ratings(Request $request)
    {
        $data = Storage::disk('public')->get('sellData.json');
        $data = json_decode($data);
        $ratings = $data->ratings;
        
        return $request['callback'] . "(" . json_encode(['status' => '1', 'data' => $ratings]) . ")";
    }
}
