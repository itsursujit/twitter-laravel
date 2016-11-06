var Map = Backbone.Model.extend({
    events: {
        'click .reload-map' : 'show_expo'
    },
    show_expo: function() {
        if(attrs.map){
            attrs.self.searchStoreBounds(attrs.map, attrs);
        }
    },
    initialize: function(attrs){
        var self= this;
        var map = null;
        var mapOption = {
            zoom: 4,
            center: {
                lat: 24.260547,
                lng: 11.714687
            },
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var input = document.getElementById('search-bar');
        map = new google.maps.Map(document.getElementById('map'), mapOption);
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }
            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
        });
        attrs.map = map;
        attrs.self = self;
        google.maps.event.addListener(map, 'dragend', function() {
            //self.searchStoreBounds(map, attrs);
        });
        google.maps.event.addListener(map, 'idle', function() {
            self.searchStoreBounds(map, attrs);
        });
        google.maps.event.addListener(map, 'dragstart', function() {
            //this.searchStoresBounds(map.getBounds().toUrlValue());
        });

        google.maps.event.addListener(map, 'bounds_changed', function() {
            //searchStoresBounds(map.getBounds().toUrlValue());
        });
    },
    searchStoreBounds: function(map, attrs) {
        var url = '/locate/expos';
        var parameter = {
            bounds: map.getBounds().toUrlValue(),
            center: map.getCenter().toUrlValue()
        };
        jQuery.ajax({
            url: url,
            data: parameter,
            dataType: 'json',
            success: showStores
        });
        function getDataList(markers){
            if(attrs.firstLoad == 0){
                attrs.firstLoad = 1;
                AutoCenter(markers);
            }
        }

        function AutoCenter(markers) {
            if (markers.length > 0) {
                var bounds = new google.maps.LatLngBounds();
                $.each(markers, function(index, marker) {
                    bounds.extend(marker.position);
                });
                map.fitBounds(bounds);
            }

        }
        function showStores(data, status, xhr) {
            var id;
            var markers = [];
            var markersById = [];
            var infowindow = new google.maps.InfoWindow();
            for (i = 0; i < data['data'].length; i++) {
                attrs.loadedExpo.push(data['data'][i]['expo_id']);
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(data['data'][i]['lat'], data['data'][i]['lng']),
                    map: map,
                    icon: '/assets/img/marker.png',
                    lat: data['data'][i]['lat'],
                    lng: data['data'][i]['lng'],
                    id: data['data'][i]['expo_id'],
                    distance: data['data'][i]['distance'],
                    title: data['data'][i]['title']
                    /*,
                     zIndex: google.maps.Marker.MAX_ZINDEX + 1*/
                });
                markers[i] = marker;
                markersById[data['data'][i]['expo_id']] = marker;
                /*infowindow = new google.maps.InfoWindow({
                    content: '<h4>' + data['data'][i]['title'] + '</h4><p>Location: '+data['data'][i]['city'] + ', ' + data['data'][i]['state'] +'</p>'
                });*/

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        if(!map.getBounds().contains(marker.getPosition()))
                        {
                            map.setCenter(marker.getPosition());
                        }
                        infowindow.setContent('<h4>' + data['data'][i]['title'] + '</h4>'+
                            '<p>Location: '+data['data'][i]['city'] + ', ' + data['data'][i]['state'] +'<br>'+
                            'Date: ' + data['data'][i]['start_date'] + '. For More Info <a href="#" class="filter-link" data-filter=".expo-'+data['data'][i]['expo_id']+'">See Below</a></p>');
                        infowindow.open(map, marker);
                        var parameter = {
                            id: marker.id,
                            bounds : map.getBounds().toUrlValue()
                        };
                    }
                })(marker, i));
                google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
                    return function() {

                    }
                })(marker, i));
                google.maps.event.addListener(marker, 'mouseout', (function(marker, i) {
                    return function() {

                    }
                })(marker, i));
            }

            //console.log(attrs.loadedExpo);
            getDataList(markers);
        }
    }
});