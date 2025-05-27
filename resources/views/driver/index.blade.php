@extends('driver.driver-base')

@section('body-content')


    <div class="row g-3 mb-3">
        <div class="col-xxl-6 col-lg-12">
            <div class="card h-100">
                <div class="bg-holder bg-card"
                    style="background-image:url(../assets/img/icons/spot-illustrations/corner-3.png);">
                </div>
                <!--/.bg-holder-->

                <div class="card-header z-index-1">
                    <h5 class="text-primary">Welcome back {{$user->name}}! </h5>
                    <h6 class="text-600">Here are some quick links for you to start </h6>
                </div>
                <div class="card-body z-index-1">
                    <div class="row g-2 h-100 align-items-end">
                        <div class="col-sm-6 col-md-5">
                            <div class="d-flex position-relative">
                                <div class="icon-item icon-item-sm border rounded-3 shadow-none me-2"><span
                                        class="fas fa-chess-rook text-primary"></span></div>
                                <div class="flex-1"><a class="stretched-link" href="update_profile/{{ $user->id }}">
                                        <h6 class="text-800 mb-0">Profile</h6>
                                    </a>
                                    <p class="mb-0 fs--2 text-500">Customize your profile now</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-5">
                            <div class="d-flex position-relative">
                                <div class="icon-item icon-item-sm border rounded-3 shadow-none me-2"><span
                                        class="fas fa-crown text-warning"></span></div>
                                <div class="flex-1"><a class="stretched-link" href="/view_van">
                                        <h6 class="text-800 mb-0">Check for Van's Location</h6>
                                    </a>
                                    <p class="mb-0 fs--2 text-500">Worry Free Check's Van Location </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-5">
                            <div class="d-flex position-relative">
                                <div class="icon-item icon-item-sm border rounded-3 shadow-none me-2"><span
                                        class="fas fa-video text-success"></span></div>
                                <div class="flex-1"><a class="stretched-link" href="/view_forum_post">
                                        <h6 class="text-800 mb-0">Click to Communicate</h6>
                                    </a>
                                    <p class="mb-0 fs--2 text-500">Manage and communicate your forum</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-5">
                            <div class="d-flex position-relative">
                                <div class="icon-item icon-item-sm border rounded-3 shadow-none me-2"><span
                                        class="fas fa-user text-info"></span></div>
                                <div class="flex-1"><a class="stretched-link" href="driver_calendar">
                                        <h6 class="text-800 mb-0">Check your Schedule</h6>
                                    </a>
                                    <p class="mb-0 fs--2 text-500">See your schedule here</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-6">
            <div class="card h-100">
                <div class="card-header d-flex flex-between-center">
                    <h5 class="mb-0">Student Atten..</h5><a class="btn btn-link btn-sm px-0"
                        href="/driver_view_attendance">Attendance<span class="fas fa-chevron-right ms-1 fs--2"> </span></a>
                </div>
                <div class="card-body">
                    <p class="fs--1 text-600">See student's attendance, <br /> time, and date</p>
                    <div class="progress mb-3 rounded-pill" style="height: 6px;">
                        <div class="progress-bar bg-progress-gradient rounded-pill" role="progressbar" style="width: 100%"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-primary">Last Updated: </p>
                    <p class="mb-0 fs--2 text-500">{{ \Carbon\Carbon::now()->format('F j, Y') }}</p>

                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-6">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col">
                            <p class="mb-1 fs--2 text-500">Upcoming post</p>
                            <h5 class="text-primary fs-0">Vantrack Forum</h5>
                        </div>
                        <div class="col-auto">
                            <div class="bg-soft-primary px-3 py-3 rounded-circle text-center"
                                style="width:60px;height:60px;">
                                @php
                                    $day = now()->format('d');        // e.g., 08
                                    $month = now()->format('M');      // e.g., Apr
                                @endphp

                                <h5 class="text-primary mb-0 d-flex flex-column mt-n1">
                                    <span>{{ $day }}</span>
                                    <small class="text-primary fs--2 lh-1">{{ strtoupper($month) }}</small>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex align-items-end">
                    <div class="row g-3 justify-content-between">
                        <div class="col-10 mt-0">
                            <p class="fs--1 text-600 mb-0">Post updates, suggestions, and ideas for improving the VanTrack
                                system. Let's collaborate to make it better!</p>
                        </div>
                        <div class="col-auto">

                            <a href="/view_forum_post" class="btn btn-success w-100 fs--1" type="button">
                                <span class="fas fa-pen me-2"></span>Post Now
                            </a>
                        </div>
                        <div class="col-auto ps-0">
                            <div class="avatar-group avatar-group-dense">
                                <div class="avatar avatar-xl border border-3 border-light rounded-circle">
                                    <img class="rounded-circle" src="../assets/img/team/1-thumb.png" alt="" />

                                </div>
                                <div class="avatar avatar-xl border border-3 border-light rounded-circle">
                                    <img class="rounded-circle" src="../assets/img/team/2-thumb.png" alt="" />

                                </div>
                                <div class="avatar avatar-xl border border-3 border-light rounded-circle">
                                    <img class="rounded-circle" src="../assets/img/team/3-thumb.png" alt="" />

                                </div>
                                <div class="avatar avatar-xl border border-3 border-light rounded-circle">
                                    <div class="avatar-name rounded-circle "><span>+50</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row g-3 mb-3">
        <div class="col-sm-6 col-md-4">
            <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card"
                    style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
                </div>
                <!--/.bg-holder-->

                <div class="card-body position-relative">
                    <h6>Unresolved Report</h6>
                    <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                        data-countup='{"endValue":58.386,"decimalPlaces":2,"suffix":"k"}'>{{$unresolved_reports}}</div><a
                        class="fw-semi-bold fs--1 text-nowrap" href="/user_view_report">See all<span
                            class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card"
                    style="background-image:url(assets/img/icons/spot-illustrations/corner-2.png);">
                </div>
                <!--/.bg-holder-->

                <div class="card-body position-relative">
                    <h6>Total Students</h6>
                    <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"
                        data-countup='{"endValue":23.434,"decimalPlaces":2,"suffix":"k"}'>{{$total_students}}</div><a
                        class="fw-semi-bold fs--1 text-nowrap" href="/admin_view_student">See all<span
                            class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card"
                    style="background-image:url(assets/img/icons/spot-illustrations/corner-3.png);">
                </div>
                <!--/.bg-holder-->

                <div class="card-body position-relative">
                    <h6>Today Attendance</h6>
                    <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif"
                        data-countup='{"endValue":43594,"prefix":"$"}'>0</div><a
                        class="fw-semi-bold fs--1 text-nowrap" href="driver_view_attendance">See all<span class="fas fa-angle-right ms-1"
                            data-fa-transform="down-1"></span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-xl-7 col-xxl-8">
            <div class="card h-100">
                <div class="card-header bg-light d-flex flex-between-center">
                    <h5 class="mb-0">Your Current Location</h5>
                    {{-- <div class="dropdown font-sans-serif btn-reveal-trigger">
                        <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                            type="button" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true"
                            aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item"
                                href="#!">Edit</a><a class="dropdown-item" href="#!">Move</a><a class="dropdown-item"
                                href="#!">Resize</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-warning"
                                href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                        </div>
                    </div> --}}
                </div>
                <div class="card-body h-100 p-0">
                    <div class="h-100 bg-white" id="map" style="min-height: 300px;"></div>
                </div>
                <div class="card-footer bg-light">
                    <div class="row justify-content-between">
                        <div class="col-auto">
                        </div>
                        <div class="col-auto"><a class="btn btn-falcon-default btn-sm"
                                href="view_van_location/{{ auth()->user()->id }}"><span
                                    class="d-none d-sm-inline-block me-1">Location</span>overview<span
                                    class="fa fa-chevron-right ms-1 fs--1"></span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 pe-lg-2 mb-3">
            <div class="card mb-3 mb-lg-0 h-110">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Your Schedule</h5>
                </div>
                <div class="card-body fs--1">
                    @foreach ($rates as $rate)
                        <div class="d-flex btn-reveal-trigger">
                            <div class="calendar"><span class="calendar-month">Jan</span><span class="calendar-day">12</span>
                            </div>
                            <div class="flex-1 position-relative ps-3">
                                <h6 class="fs-0 mb-0"><a href="/student_listToHome/{{$rate->id}}">{{$rate->school->name}}</a></h6>
                                <p class="mb-1">From <a href="/student_listToHome/{{$rate->id}}" class="text-700">From {{$rate->district}}</a></p>
                                <p class="text-1000 mb-0">Pickup Time: {{$rate->start_time}}</p>
                                <p class="text-1000 mb-0">Return Time: {{$rate->end_time}}</p>
                                <div class="border-dashed-bottom my-3"></div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="card-footer bg-light p-0 border-top"><a class="btn btn-link d-block w-100"
                        href="/schedule_list">All Schedule<span
                            class="fas fa-chevron-right ms-1 fs--2"></span></a></div>
            </div>
        </div>
    </div>




@endsection