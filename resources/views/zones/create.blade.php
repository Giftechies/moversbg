@extends('layouts.app')

@section('content')
    <h4>Add Zone</h4>
    <form method="POST" action="{{ route('zones.store') }}">
        @csrf
        <div class="row">
            <div class="form-group col-12">
                <label>Zone Name</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group col-12">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1">Publish</option>
                    <option value="0">UnPublish</option>
                </select>
            </div>
            <div class="form-group col-12">
                <label>Coordinates</label>
                <textarea name="coordinates" id="coordinates" class="form-control" readonly></textarea>
            </div>
            <div class="form-group col-12" style="height:500px;">
                <input id="pac-input" class="controls rounded" style="height: 3em;width:fit-content;" type="text" placeholder="Search here" />
                <div id="map-canvas" style="height: 100%; margin:0px; padding: 0px;"></div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Zone</button>
    </form>
@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=drawing,places"></script>
    <script>
        var map;
        var drawingManager;
        var lastpolygon = null;

        function initialize() {
            var myLatlng = { lat: 21.2408, lng: 72.8806 };
            var myOptions = {
                zoom: 13,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

            drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.POLYGON,
                drawingControl: true,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_CENTER,
                    drawingModes: [google.maps.drawing.OverlayType.POLYGON]
                },
                polygonOptions: {
                    editable: true
                }
            });
            drawingManager.setMap(map);

            google.maps.event.addListener(drawingManager, "overlaycomplete", function(event) {
                if(lastpolygon) {
                    lastpolygon.setMap(null);
                }
                var coordinates = formatPolygonCoordinates(event.overlay.getPath().getArray());
                $('#coordinates').val(coordinates);
                lastpolygon = event.overlay;
            });

            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });

            let markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    const icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25),
                    };
                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map,
                        icon,
                        title: place.name,
                        position: place.geometry.location,
                    }));
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }
        function formatPolygonCoordinates(pathArray) {
            var coords = [];
            pathArray.forEach(function(point) {
                coords.push(point.lng() + ',' + point.lat());
            });
            // Close the polygon by adding the first point again at the end
            coords.push(pathArray.getAt(0).lng() + ',' + pathArray.getAt(0).lat());
            return '(' + coords.join('),(') + ')';
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>