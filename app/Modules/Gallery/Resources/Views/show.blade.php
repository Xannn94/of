@extends('layouts.inner')

@section('content')

<div class="gallery-full">
    <div class="gallery-full__loading-message">
        @lang('gallery::index.loading')
    </div>
    <div class="gallery-full__top">
        <div class="gallery-full__description">
           {!! $entity->content !!}
        </div>
        <div class="gallery-full__date">{{Date::_('d.m.Y', $entity->add_date)}}</div>
    </div>

    @if (count($entity->images()))
        <div class="gallery-full__list">
            @foreach($entity->images()->orderBy('position')->orderBy('id', 'desc')->get() as $image)
            <div class="gallery-full__item">
                <div class="gallery-full__image">
                    <a href="{{$image->image_full}}" rel="gallery">
                        <img src="{{$image->image_thumb}}" alt="img">
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    @endif

    <a class="get-back" href="{{route($page->slug)}}">@lang('gallery::index.back')</a>
</div>
@endsection