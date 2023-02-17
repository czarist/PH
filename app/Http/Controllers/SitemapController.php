<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function generate()
    {
        // URLs dos sitemaps secundários
        $sitemapUrls = [
            '/sitemap-1.xml',
            '/sitemap-2.xml',
            '/sitemap-3.xml',
            '/sitemap-4.xml',
        ];

        // Criar cada um dos sitemaps secundários
        foreach ($sitemapUrls as $url) {
            $sitemap = Sitemap::create(url('/'));

            // Adicionar URLs ao sitemap secundário
            for ($i = 1; $i <= 10; $i++) {
                $sitemap->add(
                    Url::create(url("/page/{$i}"))
                        ->setLastModificationDate(Carbon::now())
                        ->setChangeFrequency('daily')
                        ->setPriority(0.5)
                );
            }

            // Escrever o sitemap secundário para um arquivo
            $sitemap->writeToFile($url);
        }

        // Criar o sitemap index
        $sitemapIndex = Sitemap::create();

        // Adicionar cada sitemap secundário ao sitemap index
        foreach ($sitemapUrls as $url) {
            $sitemapIndex->add(
                Url::create(url($url))
                    ->setLastModificationDate(Carbon::now())
                    ->setChangeFrequency('daily')
                    ->setPriority(0.5)
            );
        }

        // Escrever o sitemap index para um arquivo
        $sitemapIndex->writeToFile('sitemap.xml');

        return 'Sitemap gerado com sucesso!';
    }
}
