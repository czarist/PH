<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\api\APIRequestController;

class VideoController extends Controller
{
    public function index($id, $title)
    {
        $video = (new APIRequestController)->getVideo($id);
        $pagination = false;
        $pagination_search = false;
        $keywords = explode(",", $video['keywords']);
        $firstTerm = preg_replace('/[\s\W]+/', '-', $keywords[0]);
        $relateds = (new APIRequestController)->getSearch($firstTerm, 1, 'short');

        // echo '<pre>';
        // print_r($relateds);
        // echo '</pre>';

        return view('video', compact('video', 'title', 'pagination', 'keywords', 'relateds', 'pagination_search'));
    }
}
