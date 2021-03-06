<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph Protocol (OGP) -->
    <meta property="og:title" content="Konada"/>
    <meta property="og:image" content="https://konada.ca/logos/logo.png"/>
    <meta property="og:description" content="Konada is the website for u of manitoba students."/>
    <meta property="og:url" content="https://konada.ca"/>

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app_custom.css') }}" rel="stylesheet" type="text/css">
    
    <!-- include summernote css/js -->
    <link href="{{ asset('dist/summernote-bs4.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('dist/summernote-bs4.js') }}" defer></script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white">
        <div class="container">
            <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> -->
            <a id="navbar-logo" class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('logos/logo.png') }}" alt="WinnipegKR Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->first_name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <a class="dropdown-item" href="/user/{{ Auth::user()->id }}/settings" onclick="event.preventDefault();">
                                Settings
                            </a>

                            <a class="dropdown-item" href="/mypage">
                                My Posts
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endAuth
                </ul>
            </div>
        </div>
    </nav>
    <div id="second-nav-bar" class="second-nav-bar shadow-sm">
        <div class="second-nav-bar d-flex justify-content-center">
            <div class="logo_wrapper">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('logos/logo.png') }}" alt="WinnipegKR Logo">
                </a>
            </div>
            <div class="form_wrapper align-self-center">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    <!-- <nav id="last-nav-bar" class="navbar navbar-expand-lg p-0 border border-black">
        <div class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <b>구인</b>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <b>자유게시판</b>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <b>뉴스</b>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <b>중고</b>
                    </a>
                </li>
            </ul>
        </div>
    </nav> -->
    <!-- Body -->
    <div id="app">
        <div class="main py-2">
            @yield('content')
        </div>
    </div>
    <div class="footer d-flex justify-content-center">
        &copy; 2019 Han Kyung Sung All Rights Reserved.
    </div>
</body>

</html>