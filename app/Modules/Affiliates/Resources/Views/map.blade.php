<div style="width: 600px; height: 450px; background-color: #fff" id="map"></div>
<div class="affiliate-info" style="display: none; font-family: 'Arial',sans-serif; font-size: 11px;">
    <span style="font-weight: bold;"><b>@lang('affiliates::index.oneTitle'): </b>{{$entity->title}}<br></span>
    <span><b>@lang('affiliates::index.address')</b>{{$entity->address}}: <br></span>
    <span> <b>@lang('affiliates::index.workTime')</b>{{$entity->work_time}}: <br></span>
    <span><b>@lang('affiliates::index.workBreak')</b>{{$entity->work_break}}: <br></span>
</div>

<script>
    var map;
    function initMap() {
        var zoom = parseInt('{{ $entity->zoom }}');
        var lat = parseFloat('{{ $entity->lat }}');
        var lng = parseFloat('{{ $entity->lng }}');

        var options = {
            zoom: zoom,
            center: {lat: lat, lng: lng},
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true
        },
            map     = new google.maps.Map(document.getElementById('map'), options),
            marker  = new google.maps.Marker({
                position: {lat: lat, lng: lng},
                map: map,
                title: '{{ $entity->title }}'
            }),
            infowindow = new google.maps.InfoWindow();

        infowindow.setContent($('.affiliate-info').html());
        infowindow.open(map, marker);

        google.maps.event.addListener(marker, 'click', function(){
            infowindow.open(map, marker);
        });
    }
</script>


