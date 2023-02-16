<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIRequestController extends Controller
{

    private function curlCall($url)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'x-li-format: json'
            ],

            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_PROTOCOLS => CURLPROTO_HTTPS
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response, true);
        }
    }

    public function getData($page)
    {
        return $this->curlCall("https://www.eporner.com/api/v2/video/search/?&per_page=36&page=$page");
    }

    public function getVideo($id)
    {
        return $this->curlCall("https://www.eporner.com/api/v2/video/id/?id=$id&thumbsize=medium&format=json");
    }

    public function getSearch($search, $page, $type)
    {
        if ($type == 'long') {
            $per_page = '32';
        } else if ($type == 'short') {
            $per_page = '8';
        }

        return $this->curlCall("https://www.eporner.com/api/v2/video/search/?query=$search&per_page=$per_page&page=$page&thumbsize=big&order=top-weekly&gay=1&lq=1&format=json");
    }

    public function getCategoriesList()
    {
        return $this->curlCall("https://api.redtube.com/?data=redtube.Categories.getCategoriesList&output=json");
    }

    public function getStarsList($page)
    {
        return $this->curlCall("https://api.redtube.com/?data=redtube.Stars.getStarDetailedList&output=json&page=$page");
    }
}
