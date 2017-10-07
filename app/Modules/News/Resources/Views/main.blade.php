@if (!$items->isEmpty() && ($newsPage = Tree::getByModule('news')))
    <div class="news">
        <h3 class="news__title"><a href="{{ route($newsPage->slug) }}">@lang('news::index.title')</a></h3>
        <div class="news__items">
            @foreach($items as $item)
                <div class="news__item">
                    <span class="news__date">{{ $item->date }}</span>
                    <p class="news__descr">
                        <a href="{{ route($newsPage->slug.'.show',$item->id) }}">
                            <span class="link-dashed">
                                {{ $item->preview }}
                            </span>
                        </a>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endif