@if (count($items))
    <ul class="nav navbar-nav">
        <li>
            @if ($page->parent_id)
            <a href="{!! home() !!}">@lang('tree::index.home')</a>
            @endif
        </li>
        @foreach ($items as $item)
        <li {!!  (Request::is($item->slug) ? 'class="active"' : '')  !!}>
            <a href="{!! URL::route($item->slug) !!}">{{$item->title}}</a>
        </li>
        @endforeach
    </ul>
@endif
