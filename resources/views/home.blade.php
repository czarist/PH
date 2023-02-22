@include('layout.header')

<input type="hidden" name="page" id="page" value="{{ $page }}">
<input type="hidden" name="total_pages" id="total_pages" value="{{ $total_pages }}">

<div id="content" class=" pt-5 pb-5 bg-dark">
    <div class="container-fluid">
        <div class="row">
            @foreach ($data['videos'] as $video)
                @include('layout.videobox')
            @endforeach
        </div>
        <div class="w-100 d-flex justify-content-center align-items-center">
            <div class="mb-4" id="pagination"></div>
        </div>
    </div>
</div>

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
          "contentUrl": "{{ $video['embed'] }}",
          "embedUrl": "{{ $video['embed'] }}"
        },

        @endforeach
      ]
    }
    </script>
@include('layout.footer')
