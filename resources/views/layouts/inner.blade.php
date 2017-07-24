@extends('layouts.app')

@section('page_content')
    @include('tree::breadcrumbs')
    <div class="page-header"><h1>@yield('h1', @$meta->h1)</h1></div>

     @yield('content')
@endsection