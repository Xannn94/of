@extends('layouts.inner')

@section('content')
    <div class="gallery-list">
        @if (count($items))
            <div class="gallery-list__loading-message">@lang('gallery::index.loading')</div>
            @foreach($items as $entity)
                <div class="gallery-list__item">
                    <div class="gallery-list__thumbnail">
                        <a href="{{route($page->slug.'.show', $entity)}}">
                            <img class="fit-cover" src="{{$entity->image_thumb}}" alt="{{$entity->title}}">
                        </a>
                    </div>
                    <h2 class="gallery-list__title">
                        <a class="gallery-list__link" href="{{route($page->slug.'.show', $entity)}}">
                            {{$entity->title}}
                        </a>
                    </h2>

                    <div class="gallery-list__description">
                        <p>{{ nl2br(e($entity->preview)) }}</p>
                    </div>
                    <div class="gallery-list__date">
                        {!! Date::_('d.m.Y') !!}
                    </div>
                </div>
            @endforeach
            {{  $items->appends(\Request::except('page'))->links('common.paginate') }}
        @else
            <p>@lang('gallery::index.no_records')</p>
        @endif
    </div>
@endsection