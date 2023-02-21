<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\api\APIRequestController;

class VideoController extends Controller
{
    public function index($id, $title)
    {
        $video = (new APIRequestController)->getVideo($id);

        if (empty($video)) {
            return redirect('/random');
        }

        $keywords_before = explode(",", $video['keywords']);

        $keywords = array_filter($keywords_before, function ($string) {
            return (strlen($string) >= 1 && strlen($string) <= 10);
        });

        $referencial = '';

        foreach ($keywords as $keyword) {
            if (strlen($keyword) > 8) {
                $referencial = $keyword;
            } else {
                continue;
            }
        }

        $string = str_replace(' ', '', $referencial);

        $firstTerm = preg_replace('/[\s\W]+/', '-', $string);
        $relateds = (new APIRequestController)->getSearch($firstTerm, 1, 'short');

        $pagination = false;
        $pagination_search = false;
        $pagination_category = false;
        $pagination_pornstar = false;
        $pagination_pornstars = false;

        // echo '<pre>';
        // print_r($relateds);
        // echo '</pre>';

        return view('video', compact('video', 'title', 'pagination', 'keywords', 'relateds', 'pagination_search', 'pagination_category', 'pagination_pornstar', 'pagination_pornstars'));
    }
}
