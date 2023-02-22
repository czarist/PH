{{-- start meta tags --}}

<title>Porn Hubbi - {{ $meta_tags['title'] }}</title>
<link rel="icon" href="{{ url('/') }}/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="{{ url('/') }}/img/apple-touch-icon.png">
<link rel="canonical" href="{{ url('/') }}">

<meta charset="UTF-8">
<meta name="robots" content="index, follow, all">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport-fit" content="cover">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="HandheldFriendly" content="True">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="msapplication-TileColor" content="#000">
<meta name="theme-color" content="#000">
<meta name="author" content="@czarist" />
<meta name="rating" content="adult">
<meta name="classification" content="adult">

<meta name='description' itemprop='description' content='{{ $meta_tags['description'] }}'>
<meta name='keywords' content='{{ $meta_tags['keywords'] }}'>
<meta name="thumbnail" content="{{ $meta_tags['thumbnail'] }}">
<meta property='article:published_time' content='{{ $meta_tags['published_time'] }}'>
<meta property='article:section' content='adult'>

<meta property="og:description" content="{{ $meta_tags['description'] }}">
<meta property="og:title" content="{{ $meta_tags['title'] }}">
<meta property="og:url" content="{{ $meta_tags['og:url'] }}">
<meta property="og:type" content="website">
<meta property="og:locale" content="en-us">
<meta property="og:site_name" content="Porn Hubbi">
<meta property="og:image:url" content="{{ $meta_tags['og:image:url'] }}">
<meta property="og:image:size" content="512">
<meta property="og:restrictions:age" content="18+" />

@if ($meta_tags['video'])
    <meta name="video:duration" content="{{ $meta_tags['video:duration'] }}" />
    <meta name="video:width" content="1280" />
    <meta name="video:height" content="720" />
    <meta name="video:tag" content="{{ $meta_tags['keywords'] }}" />
    <meta name="video:player" content="{{ $meta_tags['video:url'] }}" />
    <meta name="video:player:url" content="{{ $meta_tags['video:url'] }}" />

    <meta property="og:video" content="{{ $meta_tags['video:url'] }}" />
    <meta property="og:video:url" content="{{ $meta_tags['video:url'] }}" />
    <meta property="og:video:type" content="video/mp4" />
    <meta property="og:video:width" content="1280" />
    <meta property="og:video:height" content="720" />
    <meta property="og:video:duration" content="{{ $meta_tags['video:duration'] }}" />
    <meta property="og:video:tag" content="{{ $meta_tags['keywords'] }}" />
@endif

@foreach ($meta_tags['og:image'] as $meta_tag)
    <meta property="og:image" content="{{ $meta_tag }}">
@endforeach

@if ($meta_tags['video'])
    <script type="application/ld+json">
      {
        "@context": "https://schema.org/",
        "@type": "VideoObject",
        "name": "Porn Hubbi - {{ $meta_tags['title'] }}",
        "description": "{{$meta_tags['description']}}",
        "thumbnailUrl": "{{ $meta_tags['thumbnail'] }}",
        "uploadDate": "{{ $meta_tags['published_time'] }}",
        "duration": "{{ $meta_tags['time'] }}",
        "publisher": {
          "@type": "Organization",
          "name": "Porm Hubbi",
          "url": "{{ url('/') }}"
        },
        "contentUrl": "{{ $meta_tags['video:url'] }}",
        "embedUrl": "{{ $meta_tags['video:url'] }}",
        "interactionCount": {
          "@type": "InteractionCounter",
          "userInteractionCount": "{{ $meta_tags['views'] }}"
        }
      }
  </script>
@else
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "WebPage",
      "name": "Porn Hubbi - {{ $meta_tags['title'] }}",
      "url": "{{ request()->url() }}",
      "description": "{{$meta_tags['description']}}",
      "author": {
        "@type": "Person",
        "name": "@czarist"
      },
      "publisher": {
        "@type": "Organization",
        "name": "@czarist",
        "logo": {
          "@type": "ImageObject",
          "url": "{{ url('/') }}/img/apple-touch-icon.png",
          "width": 180,
          "height": 180
        }
      },
      "image": {
        "@type": "ImageObject",
        "url": "{{ url('/') }}/img/apple-touch-icon.png",
        "width": 180,
        "height": 180
      }
    }
    </script>
@endif

{{-- ends meta tags --}}
