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

    <link type="image/png" href="{{ asset('/favicons/favicon.ico') }}" rel="icon" sizes="48x48">
    <link href="{{ asset('/favicons/apple-touch-icon-180-180.png') }}" rel="apple-touch-icon" sizes="180x180">
    <link href="{{ asset('/favicons/manifest.json') }}" rel="manifest">

    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/media.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/fonts.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/colorbox.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/jquery.formstyler.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">

    @stack('css')
</head>