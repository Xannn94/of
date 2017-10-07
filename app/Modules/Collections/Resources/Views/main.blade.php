@if(!$collections->isEmpty())
    <div class="new-model__slider">
        @foreach($collections as $collection)
            <div class="new-model__slide">
                <div class="new-modal__pic">
                    @if($collection->image_full)
                        <img src="{{ $collection->image_full }}" alt="{{ $collection->title }}">
                    @endif
                    <h5 class="new-model__title">{{ $collection->title }}</h5>
                </div>
                <div class="new-model__descr">{{ $collection->preview }}</div>
                @if($tree = Tree::getByModule('collections'))
                    <a href=" {{ route($tree->slug.'.show',$collection->slug) }}" class="mask"></a>
                @endif
            </div>
        @endforeach
    </div>
@endif