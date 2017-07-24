@extends('layouts.inner')
@push('js')
    <script>
        var map;
        var infowindow;
        var markerList = [];

        function initMap() {
            var options = {
                zoom: 11,
                center: {lat: 42.8749981, lng: 74.6103646},
                mapTypeId: google.maps.MapTypeId.ROADMAP,
            };
            map = new google.maps.Map(document.getElementById('map'), options);
            infowindow = new google.maps.InfoWindow();

            var items = <?= $items ?>,
                marker, i;

            for(i = 0; i < items.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(items[i][1], items[i][2]),
                    map: map,
                    title: items[i][4],
                    address: items[i][5],
                    work_time: items[i][6],
                    work_break: items[i][7]
                });

                markerList.push(marker);

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent($('#aff-'+i).html());
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('googlemaps.key') }}&callback=initMap"></script>
@endpush

@section('content')
    <div class="affiliates">
        <a href="{{ route('affiliates') }}">Открыть Таблицу</a>
        <div id="map"></div>
        <?php $affiliates = collect(json_decode($items)) ?>

        <ul style="display: none">
            @for($i=0; $i< $affiliates->count(); $i++)
                <li id="aff-{{ $i }}">
                    <div style="font-size: 12px;">
                        <b>@lang('affiliates::index.oneTitle')</b>{{$affiliates[$i][4]}}<br>
                        <b>@lang('affiliates::index.address')</b>{{$affiliates[$i][5]}}<br>
                        <b>@lang('affiliates::index.workTime')</b>{{$affiliates[$i][6]}}<br>
                        <b>@lang('affiliates::index.workBreak')</b>{{$affiliates[$i][7]}}<br>
                    </div>
                </li>
            @endfor
        </ul>
    </div>
@endsection

