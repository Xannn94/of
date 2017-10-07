@if(!$items->isEmpty())
    <div class="menu__wrap">
        <nav class="menu">
            <ul class="menu__list">
                @foreach($items as $item)
                    @if($item->module === 'collections' && !$collections->isEmpty())
                        <li class="menu__item">
                            <a href="{{ route($item->slug) }}">{{ $item->title }}</a>
                            <ul class="drop-menu">
                                @foreach($collections as $collection)
                                    <li class="drop-menu__item">
                                        <a href="{{ route($item->slug.'.show',$collection->slug) }}">{{ $collection->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @elseif( ($children = $item->getChildren('in_menu')) && $children->isEmpty() )
                        <li class="menu__item"><a href="{{ route($item->slug) }}">{{ $item->title }}</a></li>
                    @else
                        <li class="menu__item">
                            <a href="{{ route($item->slug) }}">{{ $item->title }}</a>
                            <ul class="drop-menu">
                                @foreach($children as $child)
                                    <li class="drop-menu__item">
                                        <a href="{{ route($child->slug) }}">{{ $child->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
@endif