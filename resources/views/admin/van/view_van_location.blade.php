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

    <style>
        .custom-marker {
            background-size: cover;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            border: 2px solid white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
    </style>

    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);">
        </div>

        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Track Vans in Real Time</h3>
                    {{-- <p class="mb-0">Below is the list of vans available for live location tracking.</p> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
                    <a href="profile_detail/{{$van->user->id}}" class="mb-0">{{$van->user->name}}<span
                            style="margin-left: 10px"
                            class="badge rounded-pill badge-soft-primary">{{$van->license_plate}}</span></a>
                </div>
            </div>
        </div>
        <div class="card-body bg-light">
            <div id="map" style="height: 500px; width: 100%; border-radius:5px" ;></div>
        </div>
    </div>

    <script>
        function initMap() {
            const pos = { lat: {{ $lat }}, lng: {{ $lng }} };

            const map = new google.maps.Map(document.getElementById("map"), {
                center: pos,
                zoom: 15,
            });

            // Custom OverlayView class
            class CustomMarker extends google.maps.OverlayView {
                constructor(position, imageUrl, map) {
                    super();
                    this.position = position;
                    this.imageUrl = imageUrl;
                    this.map = map;
                    this.div = null;
                    this.setMap(map); // Adds to map
                }

                onAdd() {
                    this.div = document.createElement("div");
                    this.div.className = "custom-marker";
                    this.div.style.backgroundImage = `url('${this.imageUrl}')`;

                    const panes = this.getPanes();
                    panes.overlayImage.appendChild(this.div);
                }

                draw() {
                    const overlayProjection = this.getProjection();
                    const pixel = overlayProjection.fromLatLngToDivPixel(this.position);

                    if (this.div) {
                        this.div.style.left = `${pixel.x - 25}px`; // Center the circle (50/2)
                        this.div.style.top = `${pixel.y - 25}px`;
                        this.div.style.position = "absolute";
                    }
                }

                onRemove() {
                    if (this.div) {
                        this.div.parentNode.removeChild(this.div);
                        this.div = null;
                    }
                }
            }

            // Create the custom circular marker
            new CustomMarker(
                new google.maps.LatLng(pos.lat, pos.lng),
                '{{ asset($van->user->profile_photo_path) }}',
                map
            );

            // Add logged-in user's real location
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        const userPos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };

                        // Optional: adjust map to fit both user and van
                        const bounds = new google.maps.LatLngBounds();
                        bounds.extend(new google.maps.LatLng(pos.lat, pos.lng)); // van
                        bounds.extend(new google.maps.LatLng(userPos.lat, userPos.lng)); // user
                        map.fitBounds(bounds);

                        // Marker for the logged-in user
                        new google.maps.Marker({
                            position: userPos,
                            map: map,
                            title: "You",
                            icon: {
                                path: google.maps.SymbolPath.CIRCLE,
                                scale: 8,
                                fillColor: "#007bff",
                                fillOpacity: 1,
                                strokeWeight: 2,
                                strokeColor: "#ffffff",
                            },
                        });

                        // Optional: draw line from user to van
                        new google.maps.Polyline({
                            path: [userPos, pos],
                            geodesic: true,
                            strokeColor: "#00c853",
                            strokeOpacity: 0.7,
                            strokeWeight: 2,
                            map: map,
                        });
                    },
                    function (error) {
                        console.error("Error getting user location:", error);
                    }
                );
            } else {
                console.warn("Geolocation is not supported by this browser.");
            }

        }

        // Load the map script
        const script = document.createElement('script');
        script.src = "https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&callback=initMap";
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);
    </script>


@endsection