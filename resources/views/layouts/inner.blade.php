@extends('layouts.app')

@section('page_content')
    <div class="text-wrapper">
        @include('common.sidebar')
        <div class="page-content">
            @include('tree::breadcrumbs')
            <h1>@yield('h1', @$meta->h1)</h1>
            @yield('content')
        </div>
        <div class="clear"></div>
    </div>
@endsection