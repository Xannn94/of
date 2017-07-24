@extends('layouts.inner')

@section('content')
    <div class="news-list">
        @if (count($items))
            @foreach($items as $entity)
                <div class="news-list__item">
                    @if($entity->image_mini)
                        <div class="news-list__left">
                            <div class="news-list__image">
                                <a href="{{route($page->slug.'.show', $entity)}}">
                                    <img class="fit-cover" src="{{$entity->image_mini}}" alt="{{$entity->title}}">
                                </a>
                            </div>
                        </div>
                    @endif

                    <div class="news-list__right">
                        <div class="news-list__top">
                            <h2 class="news-list__title">
                                <a href="{{route('news.show', $entity->id)}}">{{$entity->title}}</a>
                            </h2>

                            <div class="news-list__date">{!! Date::_('d.m.Y H:i:s') !!}
                            </div>
                        </div>
                        <div class="news-list__content">
                            <p>{{ nl2br(e($entity->preview)) }}</p>
                        </div>
                        <a class="news-list__link"
                           href="{{route($page->slug.'.show', $entity)}}">@lang('news::index.read_more')</a>
                    </div>
                </div>
            @endforeach
            {{  $items->appends(\Request::except('page'))->links('common.paginate') }}
        @else
            <p>@lang('news::index.no_records')</p>
        @endif
    </div>
@endsection