<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- jQuery --}}
    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>

    <!-- JS Files -->

    <script src="{{ asset('js/app.js') }}"></script>

    @if ($pagination)
        <script src="{{ asset('js/pagination.js') }}"></script>
    @endif

    @if ($pagination_search)
        <script src="{{ asset('js/pagination_search.js') }}"></script>
    @endif

    @if ($pagination_category)
        <script src="{{ asset('js/pagination_category.js') }}"></script>
    @endif

    @if ($pagination_pornstars)
        <script src="{{ asset('js/pagination_pornstars.js') }}"></script>
    @endif

    @if ($pagination_pornstar)
        <script src="{{ asset('js/pagination_pornstar.js') }}"></script>
    @endif

    {{-- bootstrap JS --}}
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- CSS Files -->

    {{-- bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="{{ asset('icons-1.5.0/font/bootstrap-icons.css') }}" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Porn Hubbi</title>

    {{-- input hiddens --}}

    @if ($pagination_search)
        <input type="hidden" name="page_search" id="page_search" value="{{ $_GET['page_search'] }}">
        <input type="hidden" name="search_query" id="search_query" value="{{ $_GET['search_query'] }}">
    @endif

    <input type="hidden" name="baseURL" id="baseURL" value="{{ url('/') }}">

</head>

<body>
    <header class="bg-black">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="logo" width="200">
                </a>
                <ul class="navbar-nav mr-auto d-xl-flex d-none">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CATEGORIES
                        </a>
                        <div id="nav" class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item bg-dark" href="{{ url('/') }}/categories">Check All <i
                                    class="bi bi-arrow-right"></i>
                            </a>
                            <div class="dropdown-divider bg-dark"></div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}/random">RANDOM</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}/pornstars/1">PORNSTARS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">LIVE SEX</a>
                    </li>
                </ul>
                <form class="my-2 my-lg-0 d-flex" action="{{ url('/search') }}" id="search_videos">
                    <input type="hidden" name="page_search" id="page_search" value="1">
                    <input class="form-control mr-sm-2" type="text" id="search_query" placeholder="Search"
                        name="search_query">
                    <button class="btn my-2 my-sm-0" type="submit">
                        <i class="bi bi-search text-white"></i>
                    </button>
                </form>
            </nav>
        </div>
    </header>
