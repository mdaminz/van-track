@php
  $layout = match (Auth::user()->usertype) {
    'admin' => 'admin.admin-base',
    'driver' => 'driver.driver-base',
    default => 'user.user-base',
  };
@endphp

@extends($layout)


<base href="/public">

@section('body-content')

    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);">
        </div>

        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Track Vans in Real Time</h3>
                    <p class="mb-0">Below is the list of vans available for live location tracking.</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
                    <h5 class="mb-0">Van A</h5>
                </div>
            </div>
        </div>
        <div class="card-body bg-light">
            <div id="map" style="height: 500px; width: 100%; border-radius:5px";></div>
        </div>
    </div>

    <script>
        function initMap() {
            const pos = { lat: {{ $lat }}, lng: {{ $lng }} };

            const map = new google.maps.Map(document.getElementById("map"), {
                center: pos,
                zoom: 15,
            });

            // Custom marker: Using a div for the circular marker
            const markerDiv = document.createElement('div');
            markerDiv.classList.add('custom-marker');
            markerDiv.style.backgroundImage = `url('{{ asset($van->user->profile_photo_path) }}')`;
            markerDiv.style.backgroundSize = 'cover';
            markerDiv.style.borderRadius = '50%';
            markerDiv.style.width = '50px';
            markerDiv.style.height = '50px';
            markerDiv.style.border = '2px solid white'; // Optional, adds a border to the circular marker

            // Create the custom overlay for the map
            const marker = new google.maps.OverlayView();

            marker.onAdd = function () {
                const layer = document.createElement('div');
                layer.appendChild(markerDiv);
                this.getPanes().overlayLayer.appendChild(layer);

                const projection = this.getProjection();
                const position = projection.fromLatLngToDivPixel(pos);

                markerDiv.style.position = 'absolute';
                markerDiv.style.left = `${position.x - 25}px`; // Offset for centering
                markerDiv.style.top = `${position.y - 25}px`;  // Offset for centering
            };

            marker.setMap(map);
        }

        // Load Google Maps API
        const script = document.createElement('script');
        script.src = "https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&callback=initMap";
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);
    </script>

@endsection
