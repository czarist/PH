<?php

namespace App\Http\Controllers;

use App\Http\Controllers\api\APIRequestController;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $page = 1;
        $data = (new APIRequestController)->getData($page);
        $total_pages = $data['total_pages'];
        $pagination = true;
        $pagination_search = false;
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';

        return view('home', compact('data', 'page', 'total_pages', 'pagination', 'pagination_search'));
    }

    public function page($page)
    {
        $data = (new APIRequestController)->getData($page);
        $total_pages = $data['total_pages'];
        $pagination = true;
        $pagination_search = false;

        return view('home', compact('data', 'page', 'total_pages', 'pagination', 'pagination_search'));
    }

    public function search()
    {
        $page = $_GET['page_search'];
        $query = preg_replace('/[\s\W]+/', '-', $_GET['search_query']);

        $data = (new APIRequestController)->getSearch($query, $page, 'long');
        $total_pages = $data['total_pages'];
        $pagination = false;
        $pagination_search = true;

        return view('home', compact('data', 'page', 'total_pages', 'pagination', 'pagination_search'));
    }

    public function error404()
    {
        $pagination = false;
        $pagination_search = false;

        return view('404', compact('pagination', 'pagination_search'));
    }

    public function categorys()
    {
        $pagination = false;
        $pagination_search = false;

        return view('categorys', compact('pagination', 'pagination_search'));
    }
}
