<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\SitemapIndex;
use App\Http\Controllers\api\APIRequestController;

class SitemapController extends Controller
{
    public function index()
    {
        $data = (new APIRequestController)->getData(1);
        $pages = intval($data["total_pages"]);

        // URLs dos sitemaps secundários
        $sitemapUrls = [
            '/sitemap/interns',
            '/sitemap/categories',
            '/sitemap/stars',
            '/sitemap/tags',
            '/sitemap/pages1',
            '/sitemap/pages2',
            '/sitemaps/sitemapindex2.xml',
        ];

        $sitemapUrls2 = [];

        for ($i = 1; $i <= 49993; $i++) {
            array_push($sitemapUrls, "/sitemap/page/$i");
        }

        for ($i = 49994; $i <= $pages; $i++) {
            array_push($sitemapUrls2, "/sitemap/page/$i");
        }

        // Criar o sitemap index
        $sitemapIndex = SitemapIndex::create();
        $sitemapIndex2 = SitemapIndex::create();

        // Adicionar cada sitemap secundário ao sitemap index
        foreach ($sitemapUrls as $url) {
            $sitemapIndex->add(($url));
        }
        foreach ($sitemapUrls2 as $url) {
            $sitemapIndex2->add(($url));
        }

        // Escrever o sitemap index para um arquivo
        $sitemapIndex->writeToFile('sitemaps/sitemapindex.xml');
        $sitemapIndex2->writeToFile('sitemaps/sitemapindex2.xml');

        return 'Sitemap created!';
    }

    public function interns()
    {
        $url = url('/');

        $links = [$url, "$url/categories", "$url/pornstars"];

        $sitemap = Sitemap::create(url('/'));

        foreach ($links as $link) {
            $sitemap->add(Url::create($link)
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.8));
        }

        $sitemap->writeToFile(public_path('sitemaps/interns.xml'));


        return 'Sitemap interns created! - ' . url('/') . '/sitemaps/interns.xml';
    }

    public function categories()
    {
        $categories = (new APIRequestController)->getCategoriesList();
        $allCat = array_merge($categories["categories"], $categories["categories_gay"]);

        echo '<pre>';
        var_dump($allCat);
        echo '</pre>';
    }

    public function pages1()
    {
    }

    public function pages2()
    {
    }

    public function page($page)
    {
    }
}
