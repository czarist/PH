<script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "ItemList",
      "name": "Porn Hubbi - {{ $meta_tags['title'] }}",
      "description": "{{ $meta_tags['description'] }}",
      "itemListElement": [

        @foreach ($data['videos'] as $video)

        {
          "@type": "VideoObject",
          "name": "{{ $video['title'] }}",
          "description": "{{ $video['title'] . ' - ' . $video['keywords'] }}",
          "thumbnailUrl": "{{ $video['default_thumb']['src'] }}",
          "uploadDate": "{{ $video['formattedDate'] }}",
          "duration": "{{ $video['time'] }}",
          "contentUrl": "{{ url('/') . "/video/" .  $video['id'] . "/" . preg_replace('/[^a-z0-9]+/i', '-', $video['title'])}}",
          "embedUrl": "{{ $video['embed'] }}"
        },

        @endforeach
      ]
    }
    </script>
