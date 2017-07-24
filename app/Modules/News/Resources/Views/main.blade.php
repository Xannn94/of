@if (count($items))
<div class="col-sm-4">
    <div class="sidebar">
        <div class="news-widget">
            <div class="news-widget__title-main">
                @lang('news::index.title')
            </div>

            @foreach($items as $item)
                <div class="news-widget__item">
                    <h2 class="news-widget__title">
                        <a href="{!! route('news.show', $item->id) !!}">{{$item->title}}</a>
                    </h2>
                    <div class="news-widget__content">
                        <p>{{ nl2br(e($item->preview)) }}</p>
                    </div>
                    <a class="news-widget__link" href="{!! route('news.show', $item->id) !!}">
                        @lang('news::index.read_more')
                    </a>
                </div>
           @endforeach
        </div>
    </div>
</div>
@endif