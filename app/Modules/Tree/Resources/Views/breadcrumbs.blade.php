@if ($breadcrumbs)
        <ul class="bread-crumbs">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($breadcrumb->url && !$breadcrumb->last)
                    <li class="bread-crumbs__item">
                        <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                        <span class="bread-crumbs__separator">/</span>
                    </li>
                @else
                    <li class="bread-crumbs__item">{{ $breadcrumb->title }}</li>
                @endif
            @endforeach
        </ul>
@endif