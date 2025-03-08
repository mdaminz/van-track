@extends(
    Auth::user()->usertype == 'admin' ? 'admin.admin-base' : 
    (Auth::user()->usertype == 'driver' ? 'driver.driver-base' : 'user.user-base')
)

@section('body-content')
    <link href="../../vendors/leaflet/leaflet.css" rel="stylesheet" />
    <link href="../../vendors/leaflet.markercluster/MarkerCluster.css" rel="stylesheet" />
    <link href="../../vendors/leaflet.markercluster/MarkerCluster.Default.css" rel="stylesheet" />


    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);">
        </div>

        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Track Vans in Real Time</h3>
                    <p class="mb-0">Below is the van you choosed for live location tracking.</p>
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
            <div id="map" style="height:500px"></div>
        </div>
    </div>

    <script src="../../vendors/leaflet/leaflet.js"></script>
    <script src="../../vendors/leaflet.markercluster/leaflet.markercluster.js"></script>
    <script src="../../vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js"></script>
@endsection
