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
        $pagination_pornstar = false;
        $pagination_pornstars = false;
        
        return view('home', compact('data', 'page', 'total_pages', 'pagination', 'pagination_search', 'pagination_category', 'pagination_pornstar', 'pagination_pornstars'));
    }

    public function random()
    {
        $page = rand(1, 5000);
        $data = (new APIRequestController)->getData($page);
        $title = preg_replace('/[\s\W]+/', '-', $data['videos'][0]['title']);
        $id = $data['videos'][0]['id'];

        return redirect(url('/') . "/video/$id/$title");
    }

    public function page($page)
    {
        $data = (new APIRequestController)->getData($page);
        $total_pages = $data['total_pages'];

        $pagination = true;
        $pagination_search = false;
        $pagination_category = false;
        $pagination_pornstar = false;
        $pagination_pornstars = false;

        return view('home', compact('data', 'page', 'total_pages', 'pagination', 'pagination_search', 'pagination_category', 'pagination_pornstar', 'pagination_pornstars'));
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
        $pagination_pornstar = false;
        $pagination_pornstars = false;

        return view('home', compact('data', 'page', 'total_pages', 'pagination', 'pagination_search', 'pagination_category', 'pagination_pornstar', 'pagination_pornstars'));
    }

    public function error404()
    {
        $pagination = false;
        $pagination_search = false;
        $pagination_category = false;
        $pagination_pornstar = false;
        $pagination_pornstars = false;

        return view('404', compact('pagination', 'pagination_search', 'pagination_category', 'pagination_pornstar', 'pagination_pornstars'));
    }

    public function category($cat, $page)
    {
        $data = (new APIRequestController)->getSearch($cat, $page, 'long');
        $total_pages = $data['total_pages'];

        $pagination = false;
        $pagination_search = false;
        $pagination_category = true;
        $pagination_pornstar = false;
        $pagination_pornstars = false;

        return view('category', compact('data', 'page', 'cat', 'total_pages', 'pagination', 'pagination_search', 'pagination_category', 'pagination_pornstar', 'pagination_pornstars'));
    }

    public function categories()
    {
        $pagination = false;
        $pagination_search = false;
        $pagination_category = false;
        $pagination_pornstar = false;
        $pagination_pornstars = false;


        return view('categories', compact('pagination', 'pagination_search', 'pagination_category', 'pagination_pornstar', 'pagination_pornstars'));
    }

    public function pornstar($cat, $page)
    {
        $query = preg_replace('/[\s\W]+/', '-', $cat);
        echo "<input type='hidden' name='search_query' id='search_query' value='$query'>";
        $data = (new APIRequestController)->getSearch($query, $page, 'long');
        $total_pages = $data['total_pages'];

        $pagination = false;
        $pagination_search = false;
        $pagination_category = false;
        $pagination_pornstar = true;
        $pagination_pornstars = false;

        return view('pornstar', compact('data', 'cat', 'page', 'query', 'total_pages', 'pagination', 'pagination_search', 'pagination_category', 'pagination_pornstar', 'pagination_pornstars'));
    }

    public function pornstars($page)
    {
        $data = (new APIRequestController)->getStarsList($page);
        $count = (int) $data['count'];
        $total_pages = ($count / 20) + 1;

        $pagination = false;
        $pagination_search = false;
        $pagination_category = false;
        $pagination_pornstar = false;
        $pagination_pornstars = true;

        return view('pornstars', compact('data', 'page', 'total_pages', 'pagination', 'pagination_search', 'pagination_category', 'pagination_pornstar', 'pagination_pornstars'));
    }
}
