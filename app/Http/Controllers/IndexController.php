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
        $keywordsArray = [];

        foreach ($data["videos"] as $video) {
            $array = explode(", ", $video["keywords"]);
            $keywordsArray = array_merge($keywordsArray, $array);
        }

        $keywordsArray = array_filter($keywordsArray, function ($value) {
            return strlen($value) <= 10;
        });

        $keywordsArray = array_unique($keywordsArray);

        $keywordsList = implode(", ", $keywordsArray);

        $meta_tags = [
            'video' => false,
            'title' => 'Home',
            'description' => 'Home' . ' - ' . $keywordsList,
            'keywords' => $keywordsList,
            'thumbnail' => url('/') . "/img/logo.png",
            'published_time' => date('c'),
            'og:url' => url('/'),
            'og:image' => [
                url('/') . "/img/logo.png",
            ],
            'og:image:url' =>  url('/') . '/img/logo.png'
        ];

        return view('home', compact('data', 'meta_tags', 'page', 'total_pages', 'pagination', 'pagination_search', 'pagination_category', 'pagination_pornstar', 'pagination_pornstars'));
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

        if (empty($data)) {
            return redirect('/');
        }

        $total_pages = $data['total_pages'];

        $pagination = true;
        $pagination_search = false;
        $pagination_category = false;
        $pagination_pornstar = false;
        $pagination_pornstars = false;

        $keywordsArray = [];

        foreach ($data["videos"] as $video) {
            $array = explode(", ", $video["keywords"]);
            $keywordsArray = array_merge($keywordsArray, $array);
        }

        $keywordsArray = array_filter($keywordsArray, function ($value) {
            return strlen($value) <= 10;
        });

        $keywordsArray = array_unique($keywordsArray);

        $keywordsList = implode(", ", $keywordsArray);

        $meta_tags = [
            'video' => false,
            'title' => "Page - $page",
            'description' => "Page - $page" . ' - ' . $keywordsList,
            'keywords' => $keywordsList,
            'thumbnail' => url('/') . "/img/logo.png",
            'published_time' => date('c'),
            'og:url' => url('/'),
            'og:image' => [
                url('/') . "/img/logo.png",
            ],
            'og:image:url' =>  url('/') . '/img/logo.png'
        ];

        return view('home', compact('data', 'meta_tags', 'page', 'total_pages', 'pagination', 'pagination_search', 'pagination_category', 'pagination_pornstar', 'pagination_pornstars'));
    }

    public function search()
    {
        $page = $_GET['page_search'];
        $query = preg_replace('/[\s\W]+/', '-', $_GET['search_query']);

        $data = (new APIRequestController)->getSearch($query, $page, 'long');

        if (empty($data)) {
            return redirect('/');
        }

        $total_pages = $data['total_pages'];

        $pagination = false;
        $pagination_search = true;
        $pagination_category = false;
        $pagination_pornstar = false;
        $pagination_pornstars = false;
        $title = "Search: $query - Page: $page";

        $keywordsArray = [];

        foreach ($data["videos"] as $video) {
            $array = explode(", ", $video["keywords"]);
            $keywordsArray = array_merge($keywordsArray, $array);
        }

        $keywordsArray = array_filter($keywordsArray, function ($value) {
            return strlen($value) <= 10;
        });

        $keywordsArray = array_unique($keywordsArray);

        $keywordsList = implode(", ", $keywordsArray);

        $meta_tags = [
            'video' => false,
            'title' => $title,
            'description' => $title . ' - ' . $keywordsList,
            'keywords' => $keywordsList,
            'thumbnail' => url('/') . "/img/logo.png",
            'published_time' => date('c'),
            'og:url' => url('/'),
            'og:image' => [
                url('/') . "/img/logo.png",
            ],
            'og:image:url' =>  url('/') . '/img/logo.png'
        ];

        return view('home', compact('data', 'page', 'meta_tags', 'query', 'title', 'total_pages', 'pagination', 'pagination_search', 'pagination_category', 'pagination_pornstar', 'pagination_pornstars'));
    }

    public function error404()
    {
        $pagination = false;
        $pagination_search = false;
        $pagination_category = false;
        $pagination_pornstar = false;
        $pagination_pornstars = false;
        $title = "ERROR 404";

        $meta_tags = [
            'video' => false,
            'title' => $title,
            'description' => $title . ' - ' . '404',
            'keywords' => '404, Porn, Porn Hubbi',
            'thumbnail' => url('/') . "/img/logo.png",
            'published_time' => date('c'),
            'og:url' => url('/'),
            'og:image' => [
                url('/') . "/img/logo.png",
            ],
            'og:image:url' =>  url('/') . '/img/logo.png'
        ];

        return view('404', compact('pagination', 'meta_tags', 'title', 'pagination_search', 'pagination_category', 'pagination_pornstar', 'pagination_pornstars'));
    }

    public function category($cat, $page)
    {
        $data = (new APIRequestController)->getSearch($cat, $page, 'long');

        if (empty($data)) {
            return redirect('/');
        }

        $total_pages = $data['total_pages'];

        $pagination = false;
        $pagination_search = false;
        $pagination_category = true;
        $pagination_pornstar = false;
        $pagination_pornstars = false;
        $title = "Category: $cat - Page: $page";

        $keywordsArray = [];

        foreach ($data["videos"] as $video) {
            $array = explode(", ", $video["keywords"]);
            $keywordsArray = array_merge($keywordsArray, $array);
        }

        $keywordsArray = array_filter($keywordsArray, function ($value) {
            return strlen($value) <= 10;
        });

        $keywordsArray = array_unique($keywordsArray);

        $keywordsList = implode(", ", $keywordsArray);

        $meta_tags = [
            'video' => false,
            'title' => $title,
            'description' => $title . ' - ' . $keywordsList,
            'keywords' => $keywordsList,
            'thumbnail' => url('/') . "/img/logo.png",
            'published_time' => date('c'),
            'og:url' => url('/'),
            'og:image' => [
                url('/') . "/img/logo.png",
            ],
            'og:image:url' =>  url('/') . '/img/logo.png'
        ];

        return view('category', compact('data', 'meta_tags', 'title', 'page', 'cat', 'total_pages', 'pagination', 'pagination_search', 'pagination_category', 'pagination_pornstar', 'pagination_pornstars'));
    }

    public function categories()
    {
        $pagination = false;
        $pagination_search = false;
        $pagination_category = false;
        $pagination_pornstar = false;
        $pagination_pornstars = false;
        $title = "Categories";

        $meta_tags = [
            'video' => false,
            'title' => $title,
            'description' => $title . ' - ' . 'categories',
            'keywords' => 'categories, porn, list',
            'thumbnail' => url('/') . "/img/logo.png",
            'published_time' => date('c'),
            'og:url' => url('/'),
            'og:image' => [
                url('/') . "/img/logo.png",
            ],
            'og:image:url' =>  url('/') . '/img/logo.png'
        ];

        return view('categories', compact('pagination', 'meta_tags', 'title', 'pagination_search', 'pagination_category', 'pagination_pornstar', 'pagination_pornstars'));
    }

    public function pornstar($cat, $page)
    {
        $query = preg_replace('/[\s\W]+/', '-', $cat);
        echo "<input type='hidden' name='search_query' id='search_query' value='$query'>";
        $data = (new APIRequestController)->getSearch($query, $page, 'long');

        if (empty($data)) {
            return redirect('/');
        }

        $total_pages = $data['total_pages'];

        $pagination = false;
        $pagination_search = false;
        $pagination_category = false;
        $pagination_pornstar = true;
        $pagination_pornstars = false;
        $title = "Pornstar: $cat - Page: $page";

        $keywordsArray = [];

        foreach ($data["videos"] as $video) {
            $array = explode(", ", $video["keywords"]);
            $keywordsArray = array_merge($keywordsArray, $array);
        }

        $keywordsArray = array_filter($keywordsArray, function ($value) {
            return strlen($value) <= 10;
        });

        $keywordsArray = array_unique($keywordsArray);

        $keywordsList = implode(", ", $keywordsArray);

        $meta_tags = [
            'video' => false,
            'title' => $title,
            'description' => $title . ' - ' . $keywordsList,
            'keywords' => $keywordsList,
            'thumbnail' => url('/') . "/img/logo.png",
            'published_time' => date('c'),
            'og:url' => url('/'),
            'og:image' => [
                url('/') . "/img/logo.png",
            ],
            'og:image:url' =>  url('/') . '/img/logo.png'
        ];

        return view('pornstar', compact('data', 'title', 'meta_tags', 'cat', 'page', 'query', 'total_pages', 'pagination', 'pagination_search', 'pagination_category', 'pagination_pornstar', 'pagination_pornstars'));
    }

    public function pornstars($page)
    {
        $data = (new APIRequestController)->getStarsList($page);

        if (empty($data)) {
            return redirect('/');
        }

        $count = (int) $data['count'];
        $total_pages = ($count / 20) + 1;

        $pagination = false;
        $pagination_search = false;
        $pagination_category = false;
        $pagination_pornstar = false;
        $pagination_pornstars = true;
        $title = "Pornstars";

        $meta_tags = [
            'video' => false,
            'title' => $title,
            'description' => $title . ' - ' . 'categories',
            'keywords' => 'porn, pornstars, list',
            'thumbnail' => url('/') . "/img/logo.png",
            'published_time' => date('c'),
            'og:url' => url('/'),
            'og:image' => [
                url('/') . "/img/logo.png",
            ],
            'og:image:url' =>  url('/') . '/img/logo.png'
        ];

        return view('pornstars', compact('data', 'page', 'meta_tags', 'title', 'total_pages', 'pagination', 'pagination_search', 'pagination_category', 'pagination_pornstar', 'pagination_pornstars'));
    }
}
