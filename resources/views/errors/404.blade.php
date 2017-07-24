@extends('layouts.inner')

@section('meta-title')
      {{config('app.name')}}
@endsection

@section('h1')
   @lang('index.404')
@endsection

@section('content')

   <p>@lang('index.404.content')</p>
@endsection




