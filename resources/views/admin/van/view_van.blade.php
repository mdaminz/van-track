@extends(
    Auth::user()->usertype == 'admin' ? 'admin.admin-base' : 
    (Auth::user()->usertype == 'driver' ? 'driver.driver-base' : 'user.user-base')
)

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
                    <h5 class="mb-0" >Available Vans</h5>
                </div>
            </div>
        </div>
        <div class="card-body bg-light">
            <div class="tab-content">

               @foreach ($vans as $vans)

                <div class="card bg-dark text-white overflow-hidden light mb-3" style="max-width: 100rem; max-height: 20rem;">
                    <div class="bg-holder rounded-3 overlay overlay-10"></div>
                    <div class="card-img-top" style="height: 100%; overflow: hidden;">
                        <img class="img-fluid w-100" src="homepage/img/choose-us.jpg" alt="Card image"
                            style="object-fit: cover;" />
                    </div>
                    <div class="card-img-overlay d-flex align-items-end">
                        <div>
                            <a href="/view_van_location/{{$vans->user_id}}" class="card-title text-white">{{$vans->license_plate}}</a>
                            <p class="card-text">{{$vans->user->name}}</p>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection
