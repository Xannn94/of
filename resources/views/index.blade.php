@extends('layouts.app')

@section('page_content')
    <div class="row">
        <div class="col-sm-8">
            <div class="page-header">
                <h1>{!! $meta->h1 !!}</h1>
            </div>
            <!-- Класс обычной текстовой страницы, которую будут писать пользователи-->
            <div class="page-content">
                {!! $page->content !!}
            </div>
        </div>
      @include('news::main')
    </div>
@endsection
