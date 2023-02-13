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
        $keywords = explode(",", $video['keywords']);

        // echo '<pre>';
        // print_r($keywords);
        // echo '</pre>';

        return view('video', compact('video', 'title', 'pagination', 'keywords'));
    }
}
