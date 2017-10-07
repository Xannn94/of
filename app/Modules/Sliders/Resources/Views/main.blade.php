@if(!$items->isEmpty())
    <div class="slider">
        @foreach($items as $item)
            @if($item->image_full)
                <div class="slide">
                    <img src="{{ $item->image_full }}" alt="{{ $item->title?$item->title:'slide_image' }}">
                    @if($item->title)
                        <h3 class="slide__info"{{ $item->title_color?'style="'.$item->title_color.'"':null }}>
                            {{ $item->title }}
                        </h3>
                    @endif
                    @if($item->link)
                        <a href="{{ $item->link }}" class="mask" target="{{$item->link}}"></a>
                    @endif
                </div>
            @endif
        @endforeach
    </div>
@endif