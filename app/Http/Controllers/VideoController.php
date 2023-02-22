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
            if (strlen($keyword) > 10) {
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

        $dateString = $video['added'];
        $timestamp = strtotime($dateString);
        $iso8601 = date('c', $timestamp);

        $keywordsList = implode(", ", $keywords);

        $meta_tags = [
            'video' => true,
            'video:url' => $video['embed'],
            'video:duration' => $video['length_sec'],
            'title' => $title,
            'description' => $title . ' - ' . $keywordsList,
            'keywords' =>  $keywordsList,
            'thumbnail' => $video['default_thumb']['src'],
            'published_time' => $iso8601,
            'og:url' => url('/'),
            'og:image' => [
                $video['default_thumb']['src'],
            ],
            'og:image:url' =>  $video['default_thumb']['src']
        ];

        // echo '<pre>';
        // print_r($relateds);
        // echo '</pre>';

        return view('video', compact('video', 'title', 'meta_tags', 'pagination', 'keywords', 'relateds', 'pagination_search', 'pagination_category', 'pagination_pornstar', 'pagination_pornstars'));
    }
}
