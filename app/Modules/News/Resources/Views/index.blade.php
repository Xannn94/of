@extends('layouts.inner')

@section('content')
    @if(!$items->isEmpty())
        <div class="news-list">
            @foreach($items as $item)
                <div class="news-list__item">
                    <div class="news-list__item__inner">
                        @if($item->image_full)
                            <div class="news-list__item__pic">
                                <img src="{{ $item->image_full }}" alt="{{ $item->title }}">
                            </div>
                       @endif
                            <div class="news-list__item__descr">
                                <span class="news__item__date">{{ (new DateTime($item->date))->format('d.m.Y')}}</span>
                                <h6>
                                    {!! $item->content !!}
                                </h6>
                            </div>
                    </div>
                    <a class="news-list__item__mask" href="{{ route(Tree::getByModule('news')->slug.'.show',$item->id) }}"></a>
                </div>
            @endforeach
           {{  $items->appends(\Request::except('page'))->links('common.paginate') }}
        </div>
    @else
        <p>@lang('news::index.no_records')</p>
    @endif
@endsection