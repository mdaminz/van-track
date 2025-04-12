@php
    $layout = match (Auth::user()->usertype) {
        'admin' => 'admin.admin-base',
        'driver' => 'driver.driver-base',
        default => 'user.user-base',
    };
@endphp

@extends($layout)

@section("body-content")
    <div class="card overflow-hidden mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);">
        </div>
        <!--/.bg-holder-->

        <div class="card-body position-relative">
            <h6 class="text-600">Affordable mMnthly Pricing</h6>
            <h2>Flexible Plans for Our Vantrack Operation</h2>
            <p>Pricing for VanTrack and streamline your fleet management.<br class="d-none d-md-block" /> Enjoy full
                control over schedules, attendance, and communication tools.</p>
        </div>

    </div>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row g-0">
                <div class="col-12 mb-3">
                    <div class="row justify-content-center justify-content-sm-between">
                        <div class="col-sm-auto text-center">
                            <h5 class="d-inline-block">Billed Monthly</h5>
                        </div>
                    </div>
                </div>


                @foreach ($rates as $rates)
                    <div class="col-lg-4 border-top border-bottom">
                        <div class="h-100">
                            <div class="text-center p-4">
                                <h3 class="fw-normal my-0">{{$rates->van->license_plate}}</h3>
                                {{-- <p class="mt-3">For teams that need to create project plans with confidence.</p> --}}
                                <h2 class="fw-medium my-4"> <sup class="fw-normal fs-2 me-1">RM</sup>{{$rates->price}}<small
                                        class="fs--1 text-700">/ month</small>
                                </h2><a class="btn btn-outline-primary" href="view_student">Register for your children now</a>
                            </div>
                            <hr class="border-bottom-0 m-0" />
                            <div class="text-start px-sm-4 py-4">
                                <h5 class="fw-medium fs-0">Track team projects with free:</h5>
                                <ul class="list-unstyled mt-3">
                                    <li class="py-1"><span class="me-2 fas fa-check text-success"> </span> From
                                        {{$rates->district}}
                                    </li>
                                    <li class="py-1"><span class="me-2 fas fa-check text-success"> </span> To
                                        {{$rates->school->name}}
                                    </li>
                                    <li class="py-1"><span class="me-2 fas fa-check text-success"> </span> Two Ways
                                    </li>
                                    <li class="py-1"><span class="me-2 fas fa-check text-success"> </span> Free RFID Card for
                                        new students
                                    </li>
                                    <li class="py-1"><span class="me-2 fas fa-check text-success"> </span> Free 24/7 Gps
                                        Tracking
                                    </li>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-lg-4 border-top border-bottom dark__bg-1000 px-4 px-lg-0"
                    style="background-color: rgba(115, 255, 236, 0.18);">
                    <div class="h-100">
                        <div class="text-center p-4">
                            <h3 class="fw-normal my-0">Business</h3>
                            <p class="mt-3">For teams and companies that need to manage work across initiatives.</p>
                            <h2 class="fw-medium my-4"> <sup class="fw-normal fs-2 me-1">&dollar;</sup>39<small
                                    class="fs--1 text-700">/ year</small>
                            </h2><a class="btn btn-primary" href="../../app/e-commerce/billing.html">Get Business</a>
                        </div>
                        <hr class="border-bottom-0 m-0" />
                        <div class="text-start px-sm-4 py-4">
                            <h5 class="fw-medium fs-0">Everything in Premium, plus:</h5>
                            <ul class="list-unstyled mt-3">
                                <li class="py-1"><span class="me-2 fas fa-check text-success"> </span> Portfolios
                                </li>
                                <li class="py-1"><span class="me-2 fas fa-check text-success"> </span> Lock custom fields
                                </li>
                                <li class="py-1"><span class="me-2 fas fa-check text-success"> </span> Onboarding plan
                                </li>
                                <li class="py-1"><span class="me-2 fas fa-check text-success"> </span> Resource Management
                                </li>
                                <li class="py-1"><span class="me-2 fas fa-check text-success"> </span> Lock custom fields
                                </li>
                            </ul><a class="btn btn-link" href="#">More about Business</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 border-top border-bottom">
                    <div class="h-100">
                        <div class="text-center p-4">
                            <h3 class="fw-normal my-0">Extended</h3>
                            <p class="mt-3">For organizations that need additional security and support.</p>
                            <h2 class="fw-medium my-4"> <sup class="fw-normal fs-2 me-1">&dollar;</sup>99<small
                                    class="fs--1 text-700">/ year</small>
                            </h2><a class="btn btn-outline-primary" href="../../app/e-commerce/billing.html">Purchase</a>
                        </div>
                        <hr class="border-bottom-0 m-0" />
                        <div class="text-start px-sm-4 py-4">
                            <h5 class="fw-medium fs-0">Everything in Business, plus:</h5>
                            <ul class="list-unstyled mt-3">
                                <li class="py-1"><span class="me-2 fas fa-check text-success"> </span> Portfolios
                                </li>
                                <li class="py-1"><span class="me-2 fas fa-check text-success"> </span> Tags <div
                                        class="badge badge-soft-primary rounded-pill">Coming soon</div>
                                </li>
                                <li class="py-1"><span class="me-2 fas fa-check text-success"> </span> Onboarding plan
                                </li>
                                <li class="py-1"><span class="me-2 fas fa-check text-success"> </span> Resource Management
                                </li>
                            </ul><a class="btn btn-link" href="#">More about Extended</a>
                        </div>
                    </div>
                </div> --}}


            </div>
        </div>
    </div>

@endsection