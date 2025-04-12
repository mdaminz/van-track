@extends('user.user-base')

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
                                <div class="flex-1"><a class="stretched-link" href="view_student">
                                        <h6 class="text-800 mb-0">Childrens Profile</h6>
                                    </a>
                                    <p class="mb-0 fs--2 text-500">Edit and manage children's profile</p>
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
                    <h5 class="mb-0">Chil.. Attendance</h5><a class="btn btn-link btn-sm px-0"
                        href="/admin_view_attendance">Attendance<span class="fas fa-chevron-right ms-1 fs--2"> </span></a>
                </div>
                <div class="card-body">
                    <p class="fs--1 text-600">See children's attendance, <br /> time, and date</p>
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
                    <h6>Total Children</h6>
                    <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"
                        data-countup='{"endValue":23.434,"decimalPlaces":2,"suffix":"k"}'>{{$total_students}}</div><a
                        class="fw-semi-bold fs--1 text-nowrap" href="view_student">See all<span
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
                    <h6>Overdue Payment</h6>
                    <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif"
                        data-countup='{"endValue":43594,"prefix":"$"}'>RM {{$overdue}}</div><a
                        class="fw-semi-bold fs--1 text-nowrap" href="user_view_bill">See all<span
                            class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-xxl-8">
            <div class="card overflow-hidden h-100">
                <div class="card-body p-0 management-calendar">
                    <div class="row g-6">
                        <div class="col-md-14">
                            <div class="p-card">
                                <div class="d-flex justify-content-between">
                                    <div class="order-md-1">
                                        <button class="btn btn-sm border me-1 shadow-sm" type="button" data-event="prev"
                                            data-bs-toggle="tooltip" title="Previous"><span
                                                class="fas fa-chevron-left"></span></button>
                                        <button class="btn btn-sm text-secondary border px-sm-4 shadow-sm" type="button"
                                            data-event="today">Today</button>
                                        <button class="btn btn-sm border ms-1 shadow-sm" type="button" data-event="next"
                                            data-bs-toggle="tooltip" title="Next"><span
                                                class="fas fa-chevron-right"></span></button>
                                    </div>
                                    <button class="btn btn-sm text-primary border order-md-0" type="button"
                                        data-bs-toggle="modal" data-bs-target="#addEventModal"> <span
                                            class="fas fa-plus me-2"></span>New Schedule</button>
                                </div>
                            </div>
                            <div class="calendar-outline px-3" id="managementAppCalendar"
                                data-calendar-option='{"title":"management-calendar-title","day":"management-calendar-day","events":"management-calendar-events"}'>
                            </div>
                        </div>
                        {{-- <div class="col-md-5 bg-light pt-3">
                            <div class="px-3">
                                <h4 class="mb-0 fs-0 fs-sm-1 fs-lg-2" id="management-calendar-title"></h4>
                                <p class="text-500 mb-0" id="management-calendar-day"></p>
                                <ul class="list-unstyled mt-3 scrollbar management-calendar-events"
                                    id="management-calendar-events"></ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4">
            <div class="card mb-3">
                <div class="card-header bg-light d-flex justify-content-between">
                    <h5 class="mb-0">Attendance today</h5>
                </div>
                <div class="card-body fs--1 p-0">

                    @php
                        $maxToShow = 4;
                    @endphp

                    @if ($attendances->isEmpty())
                        <div class="text-center py-4">
                            <p class="mb-0">No Records Found</p>
                        </div>
                    @else
                        @foreach ($attendances->take($maxToShow) as $attendance)
                            <a class="border-bottom-0 notification rounded-0 border-x-0 border border-300" href="#!">
                                <div class="notification-avatar">
                                    <div class="avatar avatar-xl me-3">
                                        <div class="avatar-emoji rounded-circle"><span role="img" aria-label="Emoji">📅️</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="notification-body">
                                    <p class="mb-1">
                                        <strong>{{ $attendance->student->full_name }}</strong> with
                                        <strong>{{ $attendance->student->rfid_tag }}</strong> tag card at
                                    </p>
                                    <span class="notification-time">
                                        {{ \Carbon\Carbon::parse($attendance->created_at)->format('d M Y, h:i A') }}
                                    </span>
                                </div>
                            </a>
                        @endforeach

                        {{-- Show "See all" if more than 4 --}}
                        @if ($attendances->count() > $maxToShow)
                            <div class="text-center mt-2 mb-1">
                                <a href="{{ url('parent_view_attendance') }}" class="btn btn-sm btn-link">See all attendance</a>
                            </div>
                        @endif
                    @endif

                </div>
            </div>
        </div>

    </div>

@endsection