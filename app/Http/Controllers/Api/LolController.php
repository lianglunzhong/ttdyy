<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class LolController extends Controller
{
    public function test(Request $request)
    {
        return 'this is test';
    }

    public function saveNews(Request $request)
    {
        $data = $request->all();
        foreach ($data as $cate_name => $news) {
            Log::info($cate_name);
            
            Log::info($news);
            Log::info(gettype($news));
            $news = json_encode($news);
            Log::info(gettype($news));
            break;
        }
        // $data = urldecode($data);
        // $data = json_encode($data);
    
    }
}
