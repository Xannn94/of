{{--
    Чтобы вьюшка корректно работала нужно передать в неё следующие переменные:
    $entity - модель в которой есть поля $entity->lat, $entity->lng,$entity->zoom
    $lat    - lat по умолчанию
    $lng    - lng по умолчанию
    $zoom   - zoom по умолчанию
--}}

@push('js')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('googlemaps.key') }}"></script>
    <script type="text/javascript" src="/js/gmap3.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
            $('#map').gmap3({
                map: {
                    options: {
                        center: [
                            parseFloat('{{ $entity->lat?$entity->lat:$lat }}'),
                            parseFloat('{{ $entity->lng?$entity->lng:$lng }}')
                        ],
                        zoom: parseInt('{{ $entity->zoom?$entity->zoom:$zoom }}')
                    },
                    events: {
                        rightclick: function (map, event) {
                            var lat = event.latLng.lat(),
                                lng = event.latLng.lng();

                            $(this).gmap3({
                                marker: {
                                    id: "TRACKER",
                                    latLng: event.latLng
                                }
                            });

                            $('#lat_txt').html(lat);
                            $('#lng_txt').html(lng);
                            $('#zoom_txt').html(map.zoom);

                            $('#lat').val(lat);
                            $('#lng').val(lng);
                            $('#zoom').val(map.zoom);
                        },

                        zoom_changed: function (map, event) {
                            $('#zoom').val(map.zoom);
                            $('#zoom_txt').html(map.zoom);
                        }
                    }
                },

                marker: {
                    id: "TRACKER",
                    latLng: [parseFloat('{{$entity->lat?$entity->lat:$lat}}'), parseFloat('{{$entity->lng?$entity->lng:$lng}}')]
                }
            });
    });


    </script>
@endpush

<fieldset style="width:900px;">
    <legend>Место назначения</legend>
    <div id="map" style="height: 450px;"></div>
    <p class="help-block">Выберите точку назначения на карте и нажмите правую кнопку мыши</p>

    <p>LAT = <span id="lat_txt">{{ $entity->lat?$entity->lat:$lat }}</span></p>

    <p>LNG = <span id="lng_txt">{{ $entity->lng?$entity->lng:$lng }}</span></p>

    <p>ZOOM = <span id="zoom_txt">{{ $entity->zoom?$entity->zoom:$zoom }}</span></p>
</fieldset>