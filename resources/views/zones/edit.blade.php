@extends('layouts.app')

@section('content')
    <h4>Edit Zone</h4>
  
<form method="POST" action="{{ route('zones.update', $zone->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Zone Name</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $zone->title) }}" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control @error('status') is-invalid @enderror">
            <option value="1" {{ old('status', $zone->status) == 1 ? 'selected' : '' }}>Publish</option>
            <option value="0" {{ old('status', $zone->status) == 0 ? 'selected' : '' }}>UnPublish</option>
        </select>
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label>Coordinates</label>
        <textarea name="coordinates" id="coordinates" class="form-control @error('coordinates') is-invalid @enderror" readonly>..{{ old('coordinates', $zone->alias) }}</textarea>
        @error('coordinates')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group" style="height:500px;">
        <input id="pac-input" class="controls rounded" type="text" placeholder="Search here" />
        <div id="map-canvas" style="height: 100%;"></div>
    </div>
    <button type="submit" class="btn btn-primary">Update Zone</button>
</form>
@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=drawing,places"></script>
    <script>
        var zoneCoordinates = {!! json_encode($zone->alias) !!};
        // Initialize map with existing zone coordinates
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

            // Display existing polygon if coordinates are available
            if (zoneCoordinates) {
                var polygonCoords = parseCoordinates(zoneCoordinates);
                var zonePolygon = new google.maps.Polygon({
                    paths: polygonCoords,
                    strokeColor: "#FF0000",
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: "#FF0000",
                    fillOpacity: 0.1,
                });
                zonePolygon.setMap(map);
                $('#coordinates').val(zoneCoordinates);
            }

            google.maps.event.addListener(drawingManager, "overlaycomplete", function(event) {
                if(lastpolygon) {
                    lastpolygon.setMap(null);
                }
                $('#coordinates').val(event.overlay.getPath().getArray());
                lastpolygon = event.overlay;
            });
        }

        function parseCoordinates(coordinates) {
            var points = [];
            var coordParts = coordinates.replace(/^\(|\)$/g, '').split('),(');
            coordParts.forEach(function(part) {
                var coords = part.split(',');
                points.push(new google.maps.LatLng(parseFloat(coords[1]), parseFloat(coords[0])));
            });
            return points;
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection

