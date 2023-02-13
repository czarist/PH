<?php

namespace App\Http\Controllers;

use App\Http\Controllers\api\APIRequestController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $page = 1;
        $data = (new APIRequestController)->getData($page);
        $total_pages = $data['total_pages'];
        $pagination = true;
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';

        return view('home', compact('data', 'page', 'total_pages', 'pagination'));
    }

    public function page($page)
    {
        $data = (new APIRequestController)->getData($page);
        $total_pages = $data['total_pages'];
        $pagination = true;

        return view('home', compact('data', 'page', 'total_pages', 'pagination'));
    }
}
