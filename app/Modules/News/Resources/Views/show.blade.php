@extends('layouts.inner')

@section('content')
    <div class="news-full">
        @if ($entity->image_thumb)
            <div class="news-full__pic">
                <img src="{{$entity->image_full}}" alt="{{$entity->title}}">
            </div>
        @endif
        {!! $entity->content !!}
        <a href="{{ route(Tree::getByModule('news')->slug) }}" class="back-link"> &#8592; Вернуться к списку новостей</a>
        <div class="clear"></div>
    </div>
@endsection

