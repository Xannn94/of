@extends('layouts.inner')

@section('content')
    <div class="news-full">
        @if ($entity->image_thumb)
            <div class="news-full__photo">
                <a href="{{$entity->image_full}}"><img class="fit-cover" src="{{$entity->image_full}}" alt="{{$entity->title}}"></a>
            </div>
        @endif

        <div class="news-full__date">
            {{Date::_('d.m.Y H:i:s')}}
        </div>

        <div class="news-full__content">
            {!! $entity->content !!}
        </div>

        <a class="get-back" href="{{route($page->slug)}}">@lang('news::index.back')</a>
    </div>
@endsection