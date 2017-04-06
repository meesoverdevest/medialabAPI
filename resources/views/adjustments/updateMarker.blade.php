@extends('layouts.app')

@section('content')
    {{--Voor de Google Maps voor winkelgebieden--}}
    {{--//http://codepen.io/jhawes/pen/ujdgK--}}
    {{--http://stackoverflow.com/questions/5072059/polygon-drawing-and-getting-coordinates-with-google-map-api-v3--}}
    <div class="container">

        <h1>Het updaten van de locatie</h1>
        <p>Hieronder staat de huidige locatie van de wijziging afgebeeld. Als er nog geen locatie gekozen was voor de wijziging, kunt u het adres invoeren in de zoekbalk.</p>

        {!! Form::open(['method' => 'POST','route' => ['admin.adjustments.updateMarkerPost', $adjustment->id]]) !!}



        <input id="pac-input" class="controls" type="text"
               placeholder="Enter a location">
        <div id="map-canvas"></div>


    {!! Form::hidden('places_id', '', ['class' => 'form-control', 'id' => 'places_id']) !!}
    {!! Form::hidden('lat', '', ['class' => 'form-control', 'id' => 'lat']) !!}
    {!! Form::hidden('lon', '', ['class' => 'form-control', 'id' => 'lon']) !!}




        {!! Form::close() !!}




    </div>

@stop

@section('javascript')
    {{--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>--}}
    <script>var places_id = "{{ $adjustment->google_id  }}";</script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API')}}&libraries=places&callback=initMap" async defer></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map-canvas'));

//            console.log(this.marker);

            var input = document.getElementById('pac-input');

            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);

            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            var infowindow = new google.maps.InfoWindow();
            var service = new google.maps.places.PlacesService(map);
            var marker;
            if(this.places_id){
                service.getDetails({
                    placeId: this.places_id
                }, function(result, status) {
                    if (status != google.maps.places.PlacesServiceStatus.OK) {
                        alert(status);
                        return;
                    }

                    if (result.geometry.viewport) {
                        map.fitBounds(result.geometry.viewport);
                        map.setZoom(13);
                    } else {
                        map.setCenter(result.geometry.location);
                        map.setZoom(13);
                    }

                    marker = new google.maps.Marker({
                        map: map,
                        position: result.geometry.location
                    });

                    marker.addListener('click', function() {
                        infowindow.open(map, marker);
                    });

                    infowindow.setContent('<div><strong>' + result.name + '</strong><br>' +
                            result.formatted_address);
                    infowindow.open(map, marker);
                });


            } else {
                marker = new google.maps.Marker({
                    map: map,
                });

                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });
            }



            autocomplete.addListener('place_changed', function() {
                infowindow.close();
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    return;
                }

                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(13);
                }

                var lat = place.geometry.location.lat();
                var lon = place.geometry.location.lng();

                document.getElementById('places_id').value = place.place_id;
                document.getElementById('lat').value = "";
                document.getElementById('lat').value = lat;
                document.getElementById('lon').value = "";
                document.getElementById('lon').value = lon;

                // Set the position of the marker using the place ID and location.
                marker.setPlace({
                    placeId: place.place_id,
                    location: place.geometry.location
                });
                marker.setVisible(true);

                infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                        place.formatted_address + '<br>' +
                '<input class="btn btn-primary form-control" value="Save this Area" type="submit">');
                infowindow.open(map, marker);
            });
        }


        function showPoints(){
            document.getElementById('places_id').value = "";
            document.getElementById('places_id').value = this.points;
        }


    </script>
@stop