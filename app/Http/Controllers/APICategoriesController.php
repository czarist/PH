<?php

namespace App\Http\Controllers;

use App\Http\Controllers\api\APIRequestController;
use Illuminate\Http\Request;

class APIcategoriesController extends Controller
{
    public function index(Request $request)
    {
        $request = (new APIRequestController)->getCategoriesList();

        return response()->json([
            $request
        ]);
    }

    public function stars(Request $request, $page)
    {
        $request = (new APIRequestController)->getStarsList($page);

        return response()->json([
            $request
        ]);
    }
}
