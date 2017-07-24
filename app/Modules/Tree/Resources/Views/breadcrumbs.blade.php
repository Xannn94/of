@if ($breadcrumbs)
    <nav>
        <ul class="breadcrumbs">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($breadcrumb->url && !$breadcrumb->last)
                    <li class="breadcrumbs__item">
                        <a href="{{ $breadcrumb->url }}" class="breadcrumbs__link">{{ $breadcrumb->title }}</a>
                        <div class="breadcrumbs__separator"></div></li>
                @else
                    <li class="breadcrumbs__item"><span>{{ $breadcrumb->title }}</span></li>
                @endif
            @endforeach
        </ul>
    </nav>
@endif