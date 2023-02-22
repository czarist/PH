<!DOCTYPE html>
<html lang="en">

<head>

    @include('layout.meta')

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

    {{-- input hiddens --}}

    @if ($pagination_search)
        <input type="hidden" name="page_search" id="page_search" value="{{ $_GET['page_search'] }}">
        <input type="hidden" name="search_query" id="search_query" value="{{ $_GET['search_query'] }}">
    @endif

    <input type="hidden" name="baseURL" id="baseURL" value="{{ url('/') }}">
    <input type="hidden" name="title" id="title" value="{{ $meta_tags['title'] }}">
</head>

<body class="bg-dark">
    <div class="buttons-mobile d-xl-none d-flex">
        <i id="open-menu" class="bi bi-grid-3x3-gap-fill text-white h1"></i>
        <i id="close-menu" class="bi bi-x-square-fill text-white h1 d-none"></i>
    </div>
    <header id="header" class="bg-black">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center align-items-center">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="logo" width="200">
                </a>

                {{-- menu desktop --}}

                <ul class="navbar-nav mr-auto d-xl-flex d-none">
                    <li class="nav-item active">
                        <a id="home-nav-link" class="nav-link" href="{{ url('/') }}">Home<span
                                class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="cat-nav-link" href="#" id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <a class="nav-link" id="stars-nav-link" href="{{ url('/') }}/pornstars/1">PORNSTARS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">LIVE SEX</a>
                    </li>
                </ul>

                {{-- menu mobile --}}

                <ul class="navbar-nav mr-auto d-none" id="mobile-nav">
                    <li class="nav-item active">
                        <a id="home-nav-link-mob" class="nav-link" href="{{ url('/') }}">Home<span
                                class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="cat-nav-link-mob" class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CATEGORIES
                        </a>
                        <div id="nav-mobile" class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
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
                        <a class="nav-link" id="stars-nav-link-mob"
                            href="{{ url('/') }}/pornstars/1">PORNSTARS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">LIVE SEX</a>
                    </li>
                </ul>
                <form class="my-2 my-lg-0 d-flex" action="{{ url('/search') }}" id="search_videos">
                    <input type="hidden" name="page_search" id="page_search" value="1">
                    <input class="form-control" type="text" id="search_query" placeholder="Search"
                        name="search_query">
                    <button id="search-button" class="btn my-2 my-sm-0" type="submit">
                        <i class="bi bi-search text-dark"></i>
                    </button>
                </form>
            </nav>
        </div>
    </header>
