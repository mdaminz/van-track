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
                    <h5 class="mb-0" >Available Vans....</h5>
                </div>
            </div>
        </div>
        <div class="card-body bg-light">
            <div class="tab-content">

                {{-- <div class="tab-pane preview-tab-pane active" role="tabpanel"
                    aria-labelledby="tab-dom-c248fa66-0194-40a0-8634-a668263afe42"
                    id="dom-c248fa66-0194-40a0-8634-a668263afe42">

                    <div class="position-relative py-6 py-lg-8 light">
                        <div class="bg-holder rounded-3 overlay overlay-6"
                            style="background-image:url(homepage/img/choose-us.jpg);">
                        </div>
                        <div class="card-img-overlay d-flex align-items-end">
                            <div>
                                <h5 class="card-title text-white">Van A</h5>
                                <p class="card-text text-white">Some quick example text to build on the card title and make
                                    up the bulk
                                    of the card's content.</p>
                            </div>
                        </div>
                    </div>


                </div> --}}

                <div class="card bg-dark text-white overflow-hidden light" style="max-width: 100rem; max-height: 20rem;">
                    <div class="bg-holder rounded-3 overlay overlay-10"></div>
                    <div class="card-img-top" style="height: 100%; overflow: hidden;">
                        <img class="img-fluid w-100 h-100" src="homepage/img/choose-us.jpg" alt="Card image"
                            style="object-fit: cover;" />
                    </div>
                    <div class="card-img-overlay d-flex align-items-end">
                        <div>
                            <a href="/view_van_location" class="card-title text-white">Van A</a>
                            <p class="card-text">SS3 Petaling Jaya -> SMK Sri Permata</p>
                        </div>
                    </div>
                </div>

                <div class="card bg-dark text-white overflow-hidden light mt-4" style="max-width: 100rem; max-height: 20rem;">
                    <div class="bg-holder rounded-3 overlay overlay-10"></div>
                    <div class="card-img-top" style="height: 100%; overflow: hidden;">
                        <img class="img-fluid w-100 h-100" src="homepage/img/choose-us.jpg" alt="Card image"
                            style="object-fit: cover;" />
                    </div>
                    <div class="card-img-overlay d-flex align-items-end">
                        <div>
                            <a href="/view_van_location" class="card-title text-white">Van B</a>
                            <p class="card-text">Sungai Way -> SK Kampung Tunku</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
