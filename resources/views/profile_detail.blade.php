@php
    $layout = match (Auth::user()->usertype) {
        'admin' => 'admin.admin-base',
        'driver' => 'driver.driver-base',
        default => 'user.user-base',
    };
@endphp

@extends($layout)

<base href="/public">

@section("body-content")

    <div class="content">

        <div class="card mb-3">
            <div class="card-header position-relative min-vh-25 mb-7">
                <div class="bg-holder rounded-3 rounded-bottom-0"
                    style="background-image:url(../../assets/img/generic/4.jpg);">
                </div>
                <!--/.bg-holder-->

                <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm"
                        src="{{ $users->profile_photo_path }}" width="200" alt="" /></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        @if ($users->status == 'Active')
                            <h4 class="mb-1"> {{ $users->name }} <span data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Active"><small class="fa fa-check-circle text-primary"
                                        data-fa-transform="shrink-4 down-2"></small></span>
                            </h4>
                        @else
                            <h4 class="mb-1"> {{ $users->name }}
                            </h4>
                        @endif
                        <h5 class="fs-0 fw-normal">{{ $users->email }}</h5>
                        <p class="text-500">{{ $users->phone }}</p>
                        {{-- <button class="btn btn-falcon-primary btn-sm px-3" type="button">Following</button>
                        <button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button> --}}
                        <div class="border-dashed-bottom my-4 d-lg-none"></div>
                    </div>
                    {{-- <div class="col ps-2 ps-lg-3"><a class="d-flex align-items-center mb-2" href="#"><span
                                class="fas fa-user-circle fs-3 me-2 text-700" data-fa-transform="grow-2"></span>
                            <div class="flex-1">
                                <h6 class="mb-0">Children ({{ $count_students }})</h6>
                            </div>
                        </a><a class="d-flex align-items-center mb-2" href="#"><img class="align-self-center me-2"
                                src="../../assets/img/logos/g.png" alt="Generic placeholder image" width="30" />
                            <div class="flex-1">
                                <h6 class="mb-0">Google</h6>
                            </div>
                        </a><a class="d-flex align-items-center mb-2" href="#"><img class="align-self-center me-2"
                                src="../../assets/img/logos/apple.png" alt="Generic placeholder image" width="30" />
                            <div class="flex-1">
                                <h6 class="mb-0">Apple</h6>
                            </div>
                        </a><a class="d-flex align-items-center mb-2" href="#"><img class="align-self-center me-2"
                                src="../../assets/img/logos/hp.png" alt="Generic placeholder image" width="30" />
                            <div class="flex-1">
                                <h6 class="mb-0">Hewlett Packard</h6>
                            </div>
                        </a>
                    </div> --}}
                </div>
            </div>

        </div>
        <div class="row g-0">
            <div class="col-lg-8 pe-lg-2">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Information</h5>
                    </div>
                    <div class="card-body bg-light">
                        <form action="" method="POST" class="row g-3">
                            <div class="col-lg-6">
                                <label class="form-label">User Role</label>
                                <input name="name" class="form-control" type="text" value="{{ ucfirst($users->usertype) }}"
                                    disabled />
                            </div>
                            <div class="col-lg-6 mb-0">
                                <label class="form-label">Status</label>
                                <input name="email" class="form-control" type="text" value="{{$users->status}}" disabled />
                            </div>

                        </form>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header bg-light">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0" id="followers">Children <span
                                        class="d-none d-sm-inline-block">({{ $count_students }})</span></h5>
                            </div>
                            {{-- <div class="col text-end"><a class="font-sans-serif"
                                    href="../../app/social/followers.html">All
                                    Members</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body bg-light px-1 py-0">
                        <div class="row g-0 text-center fs--1">
                            @foreach ($students as $students)
                                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                                    <div class="bg-white dark__bg-1100 p-3 h-100">
                                        <a href="../../pages/user/profile.html">
                                            <img src="student/{{ $students->profile_photo }}" alt="{{ $students->full_name }}"
                                                class="rounded-circle mb-3 shadow-sm" width="100" height="100"
                                                style="object-fit: cover;" />
                                        </a>
                                        <h6 class="mb-1">
                                            <a href="detail_student/{{$students->id}}">{{ $students->full_name }}</a>
                                        </h6>
                                        <p class="fs--2 mb-1">
                                            <a class="text-700">{{ $students->school->name }}</a>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 ps-lg-2">
                <div class="sticky-sidebar">
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Profile Information</h5>
                        </div>
                        <div class="card-body fs--1">
                            <div class="d-flex"><a href="#!"> <img class="img-fluid" src="{{ $users->profile_photo_path }}"
                                        alt="" width="56" /></a>
                                <div class="flex-1 position-relative ps-3">
                                    <h6 class="fs-0 mb-0">{{ $users->name }}
                                    </h6>
                                    <p class="mb-1"> {{ ucfirst($users->usertype) }}</p>
                                    <p class="text-1000 mb-0">{{ $users->email }} &bull;
                                        {{ $users->phone }}</p>
                                    <p class="text-1000 mb-0">{{ $users->address }}</p>

                                </div>
                            </div>


                        </div>
                    </div>
                    @if ($users->usertype == 'driver')
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Van Information</h5>
                            </div>
                            <div class="card-body fs--1">
                                <div class="d-flex"><a href="#!">
                                        <div class="avatar avatar-3xl">
                                            <div class="avatar-name rounded-circle"><span>VAN</span></div>
                                        </div>
                                    </a>
                                    <div class="flex-1 position-relative ps-3">
                                        <h6 class="fs-0 mb-0"> {{ $users->van->license_plate }}</h6>
                                        <p class="mb-1">Professional Van Driver</p>
                                        <p class="text-1000 mb-0"><a href="view_van_location/{{ $users->id }}">See live
                                                location</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 mb-lg-0">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Schedule Information</h5>
                            </div>
                            <div class="card-body fs--1">
                                @foreach ($rates as $rates_data)
                                    <div class="d-flex btn-reveal-trigger">
                                        <div class="calendar"><span class="calendar-month">Jan</span><span
                                                class="calendar-day">12</span></div>
                                        <div class="flex-1 position-relative ps-3">
                                            <h6 class="fs-0 mb-0">{{$rates_data->school->name}}</h6>
                                          
                                            <p class="mb-1">From {{$rates_data->district}}</p>
                                            <p class="text-1000 mb-0">Pickup Time: {{$rates_data->start_time}}</p>
                                            <p class="text-1000 mb-0">Return Time: {{$rates_data->end_time}}</p>
                                            <div class="border-dashed-bottom my-3"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection