<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\SitemapIndex;
use App\Http\Controllers\api\APIRequestController;

ini_set('memory_limit', '1024MB');

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
            'sitemapindex2.xml',
            'sitemap/pages1',
            'sitemap/pages2'
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
        $sitemapIndex->writeToFile('sitemapindex.xml');
        $sitemapIndex2->writeToFile('sitemapindex2.xml');

        return 'Sitemap created!';
    }
}
