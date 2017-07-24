<!DOCTYPE html>
<html class="no-js" lang="{!! lang() !!}">

<head>
    <meta charset="utf-8">

    @hasSection('meta-title')
    <title>@yield('meta-title')</title>
    @elseif(isset($meta->title) && $meta->title)
        <title>{{$meta->title}}</title>
    @endif

    @if(isset($og->site_name) && $og->site_name)
        <meta property="og:site_name" content="{{$og->site_name}}" />
    @endif

    @if(isset($og->image) && $og->image)
        <meta property="og:image" content="{{$og->image}}" />
    @endif

    @if(isset($og->title) && $og->title)
        <meta property="og:title" content="{{$og->title}}" />
    @endif

    @if(isset($og->description) && $og->description)
        <meta property="og:description" content="{{$og->description}}" />
    @endif

    @if(isset($meta->keywords) && $meta->keywords)
        <meta name="keywords" content="{{$meta->keywords}}" />
    @endif

    @if(isset($meta->description) && $meta->description)
        <meta name="description" content="{{$meta->description}}" />
    @endif

    <meta name="format-detection" content="telephone=no">
    <meta name="robots" content="noodp, noydir">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="HandheldFriendly" content="true">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta name="theme-color" content="#ffffff">


    <link type="image/png" href="/favicons/favicon.ico" rel="icon" sizes="48x48">
    <link type="image/png" href="/favicons/favicon-32x32.png" rel="icon" sizes="32x32">
    <link type="image/png" href="/favicons/favicon-16x16.png" rel="icon" sizes="16x16">
    <link href="/favicons/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180">
    <link href="/favicons/safari-pinned-tab.svg" rel="mask-icon">
    <link href="/favicons/manifest.json" rel="manifest">

    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/modules.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">

    @stack('css')

    <script src="/js/jquery-2.2.4.min.js"></script>
    <script src="/js/modernizr.js"></script>
    <script src="/js/bootstrap.js"></script>
</head>

<body class="page">
<!--[if lt IE 9]>
<p class="browsehappy">@lang('index.old_browser')</p><![endif]-->

<div class="page__content">
    <div class="page__wrapper">
        <div class="page__header">
            <header class="header">
                <div class="navbar navbar-default">
                    <div class="container">
                        <div class="navbar-header">
                            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navbar</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="{!! home() !!}">
                                <img src="/img/logo.png" alt="Logo">
                            </a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            @include('tree::menu')
                            <div class="top_auth">
                                @if(Auth::check())
                                    <p>{{ Auth::user()->name }}</p>
                                    <p>/</p>
                                    <a href="{{ route('user.logout') }}">Выйти</a>
                                @else
                                    <a href="{{ route('user.login') }}">Вход</a>
                                    <p>/</p>
                                    <a href="{{ route('user.register') }}">Регистрация</a>
                                @endif
                            </div>
                            @include('common.languages')

                            @include('search::main')
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <div class="page__main">
            <div class="container">
                @section('page_content')
                @show
            </div>
        </div>
        <div class="page__buffer"></div>
    </div>
    <div class="page__footer">
        <footer class="footer">
            <div class="container">
                <address>{!! widget('footer') !!}</address>
            </div>
        </footer>
    </div>
</div>
<script src="/js/plugins.js"></script>
<script src="/js/main.js"></script>

@stack('js')

</body>

</html>

