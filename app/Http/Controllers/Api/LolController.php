<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Model\Lol\News;
use App\Model\Lol\NewsCate;

class LolController extends Controller
{
    public function test(Request $request)
    {
        return $request['callback'] . "(" . json_encode(['status' => 1, 'data' => 'this is text']) . ")";
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

    public function updateNews(Request $request)
    {
        $data = Storage::disk('public')->get('lol_news_data.json');
        $data = json_decode($data, true);
        
        $NewsCate = new NewsCate;
        $News = new News;

        foreach ($data as $key => $dataNews) {
            $cate = $NewsCate::where('name', $key)->first();

            if (!$cate) {
                $cate = $NewsCate::addCate(array('name' => $key));
            }
            
            foreach ($dataNews as $dataNew) {
                $new = $News::where('title', $dataNew['title'])
                            ->where('publish_at', $dataNew['publish_at'])
                            ->first();

                if (!$new) {
                    $dataNew['cate_id'] = $cate->id;
                    $News::addNews($dataNew);
                }
            }
        }

        var_dump('update news success');
    }


    public function getNewsCates(Request $request)
    {
        $NewsCate = new NewsCate;

        $cates = $NewsCate->all();

        return $request['callback'] . "(" . json_encode(['status' => 1, 'data' => $cates]) . ")";
    }

    public function getNewsLists(Request $request, $cid)
    {
        $News = new News;

        $lists = $News::where('cate_id', $cid)->get();
 
        return $request['callback'] . "(" . json_encode(['status' => 1, 'data' => $lists]) . ")";
    }
}
