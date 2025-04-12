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
                <div class="card bg-dark text-white overflow-hidden light mb-3" style="max-width: 100rem; height: 20rem; position: relative;">
                  
                  <!-- Background Image -->
                  <img 
                    src="homepage/img/carousel-2.jpeg" 
                    alt="Card image"
                    style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 1;"
                  />
          
                  <!-- Dark Overlay -->
                  <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.3); z-index: 2;"></div>
          
                  <!-- Text Content -->
                  <div class="card-img-overlay d-flex align-items-end" style="z-index: 3;">
                    <div>
                      <a href="/view_van_location/{{$vans->user_id}}" class="card-title text-white">
                        {{ $vans->license_plate }}
                      </a>
                      <p class="card-text">{{ $vans->user->name }}</p>
                    </div>
                  </div>
          
                </div>
              @endforeach
            </div>
          </div>
          
          
          
          
    </div>
@endsection
