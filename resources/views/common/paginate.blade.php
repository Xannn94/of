@if ($paginator->hasPages())
    <noindex>
        <nav class="text-center">
            <ul class="pagination">
                @if (!$paginator->onFirstPage())
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}">&larr;</a></li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li><span>{{ $page }}</span></li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}">&rarr;</a></li>
                @endif
            </ul>
        </nav>
    </noindex>
@endif

