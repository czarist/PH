<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\SitemapIndex;
use App\Http\Controllers\api\APIRequestController;
use SimpleXMLElement;

class SitemapController extends Controller
{
    private function generate_video_sitemap($videos, $page)
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"  xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1"></urlset>');

        foreach ($videos as $video) {
            $url = $xml->addChild('url');
            $url->addChild('loc', url('/') . "/" . "video/" . $video['id'] . "/" . preg_replace('/[\s\W]+/', '-', $video['title']));
            $videoNode = $url->addChild('video:video');
            $videoNode->addChild('video:video:title', htmlspecialchars($video["title"]));
            $videoNode->addChild('video:video:description',  htmlspecialchars($video["title"]) . ' , ' . htmlspecialchars($video["keywords"]));
            $videoNode->addChild('video:video:thumbnail_loc', $video['default_thumb']["src"]);
            $playerNode = $videoNode->addChild('video:video:player_loc', $video['embed']);
            $playerNode->addAttribute('allow_embed', 'yes');
            $videoNode->addChild('video:video:publication_date', $video['added']);
            $videoNode->addChild('video:video:duration', $video['length_sec']);
            $videoNode->addChild('video:video:rating', $video['rate']);
            $videoNode->addChild('video:video:view_count', $video['views']);
            $videoNode->addChild('video:video:family_friendly', 'no');
        }

        $url = $xml->addChild('url');
        $url->addChild('loc', url('/') . "/page/$page");
        $url->addChild('priority', '0.7');

        foreach ($videos as $video) {
            $imageNode = $url->addChild('image:image');
            $imageNode->addChild('image:loc', $video['default_thumb']["src"]);
            $imageNode->addChild('image:title', htmlspecialchars($video["title"]));
        }
        return $xml->asXML();
    }

    public function index()
    {
        $data = (new APIRequestController)->getData(1);
        $pages = intval($data["total_pages"]);

        $sitemapUrls = [
            '/sitemap/interns',
            '/sitemaps/sitemapindex2.xml',
        ];

        $sitemapUrls2 = [];

        for ($i = 1; $i <= 49998; $i++) {
            array_push($sitemapUrls, "/sitemap/page/$i");
        }

        for ($i = 49997; $i <= $pages; $i++) {
            array_push($sitemapUrls2, "/sitemap/page/$i");
        }

        $sitemapIndex = SitemapIndex::create();
        $sitemapIndex2 = SitemapIndex::create();

        foreach ($sitemapUrls as $url) {
            $sitemapIndex->add(($url));
        }
        foreach ($sitemapUrls2 as $url) {
            $sitemapIndex2->add(($url));
        }

        $sitemapIndex->writeToFile('sitemaps/sitemapindex.xml');
        $sitemapIndex2->writeToFile('sitemaps/sitemapindex2.xml');

        return redirect('/sitemaps/sitemapindex.xml');
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
                ->setPriority(0.9));
        }

        $sitemap->writeToFile(public_path('sitemaps/interns.xml'));

        return redirect('/sitemaps/interns.xml');
    }

    public function page($page)
    {
        $data = (new APIRequestController)->getData($page);

        $xml = $this->generate_video_sitemap($data['videos'], $page);

        file_put_contents("sitemaps/videos/page-$page.xml", $xml);

        return redirect("sitemaps/videos/page-$page.xml");
    }
}
