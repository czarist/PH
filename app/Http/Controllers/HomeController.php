<?php

namespace App\Http\Controllers;

use App\Http\Controllers\api\APIRequestController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = (new APIRequestController)->getData(1);
        // echo '<pre>';
        // print_r($data['videos']);
        // echo '</pre>';

        return view('home', compact('data'));
    }
}
