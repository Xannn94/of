@push('js')
    <script src="{{asset('js/jquery.fancybox.pack.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('googlemaps.key') }}"></script>
    <script>
        // модалка
        $(document).ready(function() {
            $('.affiliates_item_link').fancybox({
                ajax: {
                    complete: function () {
                        if (typeof(initMap) == "function") {
                            initMap();
                        }
                    }
                }
            });
        });
    </script>
@endpush

@push('css')
    <link href="{{asset('css/jquery.fancybox.css')}}" rel="stylesheet">
@endpush

@extends('layouts.inner')

@section('content')
    <div class="affiliates">
        <a href="{{ route('affiliates.big-map') }}#map">Открыть карту</a>
        @if(!$items->isEmpty())
            <div class="affiliates_items">
                @foreach($items as $item)
                    <article class="affiliates_item">
                        <h1>{{ $item->title }}</h1>
                        <div class="affiliates_item_info">

                            @if($item->address)
                                <p>
                                    <span class="affiliates_item_header">
                                        Адрес:
                                    </span>
                                    {{ $item->address }}
                                </p>
                            @endif

                            @if($item->work_time)
                                <p>
                                    <span class="affiliates_item_header">
                                        Время работы:
                                    </span>
                                    {{ $item->work_time }}
                                </p>
                            @endif

                            @if($item->work_break)
                                <p>
                                    <span class="affiliates_item_header">
                                        Перерыв:
                                    </span>
                                    {{ $item->work_break }}
                                </p>
                            @endif

                            @if($item->phone)
                                <p>
                                    <span class="affiliates_item_header">
                                        Телефоны:
                                    </span>
                                    {!! nl2br($item->phone) !!}
                                </p>
                            @endif
                            <a
                                class="affiliates_item_link fancybox.ajax"
                                href="{{ route('affiliates.map',$item->id) }}">
                                Смотреть на карте
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
@endsection