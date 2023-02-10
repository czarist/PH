<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="{{ asset('icons-1.5.0/font/bootstrap-icons.css') }}" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- JS Files -->
    <script src="{{ asset('js/app.js') }}"></script>

    <title>Porn Hubbi</title>
</head>

<body>
    <header class="bg-black">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand text-white" href="#">
                    <img src="{{ asset('img/logo.png') }}" alt="logo" width="200">
                </a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CATEGORIES
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item bg-dark" href="#">HOME</a>
                            <div class="dropdown-divider bg-dark"></div>
                            <a class="dropdown-item bg-dark" href="#">Another action</a>
                            <div class="dropdown-divider bg-dark"></div>
                            <a class="dropdown-item bg-dark" href="#">Something else here</a>
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
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn my-2 my-sm-0" type="submit"><i class="bi bi-search text-white"></i></button>
                </form>
            </nav>
        </div>
    </header>
