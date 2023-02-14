<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="{{ asset('icons-1.5.0/font/bootstrap-icons.css') }}" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- JS Files -->
    <script src="{{ asset('js/app.js') }}"></script>

    @if ($pagination)
        <script src="{{ asset('js/pagination.js') }}"></script>
    @endif

    @if ($pagination_search)
        <script src="{{ asset('js/pagination_search.js') }}"></script>
        <input type="hidden" name="page_search" id="page_search" value="{{ $_GET['page_search'] }}">
        <input type="hidden" name="search_query" id="search_query" value="{{ $_GET['search_query'] }}">
    @endif

    <title>Porn Hubbi</title>

    <input type="hidden" name="baseURL" id="baseURL" value="{{ url('/') }}">
</head>

<body>
    <header class="bg-black">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="logo" width="200">
                </a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CATEGORIES
                        </a>
                        <div id="nav" class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item bg-dark" href="{{ url('/') }}/categorys">Check All <i class="bi bi-arrow-right"></i>
                            </a>
                            <div class="dropdown-divider bg-dark"></div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">RANDOM</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">PORNSTARS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">LIVE SEX</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" id="search_videos">
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
