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
        $pagination_category = false;

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';

        return view('home', compact('data', 'page', 'total_pages', 'pagination', 'pagination_search', 'pagination_category'));
    }

    public function page($page)
    {
        $data = (new APIRequestController)->getData($page);
        $total_pages = $data['total_pages'];

        $pagination = true;
        $pagination_search = false;
        $pagination_category = false;

        return view('home', compact('data', 'page', 'total_pages', 'pagination', 'pagination_search', 'pagination_category'));
    }

    public function search()
    {
        $page = $_GET['page_search'];
        $query = preg_replace('/[\s\W]+/', '-', $_GET['search_query']);

        $data = (new APIRequestController)->getSearch($query, $page, 'long');
        $total_pages = $data['total_pages'];

        $pagination = false;
        $pagination_search = false;
        $pagination_category = true;

        return view('home', compact('data', 'page', 'total_pages', 'pagination', 'pagination_search', 'pagination_category'));
    }

    public function category($cat, $page)
    {
        $data = (new APIRequestController)->getSearch($cat, $page, 'long');
        $total_pages = $data['total_pages'];

        $pagination = false;
        $pagination_search = false;
        $pagination_category = true;

        return view('category', compact('data', 'page', 'cat', 'total_pages', 'pagination', 'pagination_search', 'pagination_category'));
    }

    public function error404()
    {
        $pagination = false;
        $pagination_search = false;
        $pagination_category = false;

        return view('404', compact('pagination', 'pagination_search', 'pagination_category'));
    }

    public function categorys()
    {
        $pagination = false;
        $pagination_search = false;
        $pagination_category = false;

        return view('categorys', compact('pagination', 'pagination_search', 'pagination_category'));
    }
}
