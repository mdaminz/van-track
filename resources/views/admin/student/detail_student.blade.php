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

    <div class="card mb-3">
        <div class="card-header position-relative min-vh-25 mb-7">
            <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(../../assets/img/generic/4.jpg);">
            </div>
            <!--/.bg-holder-->

            <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm"
                    src="student/{{$students->profile_photo}}" width="200" alt="" />

            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="mb-1">{{$students->full_name}}<span data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Verified"><small class="fa fa-check-circle text-primary"
                                data-fa-transform="shrink-4 down-2"></small></span>
                    </h4>
                    <h5 class="fs-0 fw-normal">{{$students->school->name}}</h5>
                    <p class="text-500">{{$students->district}}</p>
                    {{-- <button class="btn btn-falcon-primary btn-sm px-3" type="button">Following</button>
                    <button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button> --}}
                    <div class="border-dashed-bottom my-4 d-lg-none"></div>
                </div>
                {{-- <div class="col ps-2 ps-lg-3"><a class="d-flex align-items-center mb-2" href="#"><span
                            class="fas fa-user-circle fs-3 me-2 text-700" data-fa-transform="grow-2"></span>
                        <div class="flex-1">
                            <h6 class="mb-0">See followers (330)</h6>
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
                            <label class="form-label">Date of Birth</label>
                            <input name="name" class="form-control" type="text" value="{{$students->date_of_birth}}"
                                disabled />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Address</label>
                            <input name="email" class="form-control" type="text" value="{{$students->address}}" disabled />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">RFID Tag</label>
                            <input name="phone" class="form-control" type="text" value="{{$students->rfid_tag}}" disabled />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Contact</label>
                            <input name="address" class="form-control" type="text" value="{{$students->emergency_contact}}"
                                disabled />
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-light d-flex justify-content-between">
                    <h5 class="mb-0">Attendance</h5>
                    {{-- <a class="font-sans-serif" href="../../app/social/activity-log.html">All logs</a> --}}
                </div>
                <div class="card-body fs--1 p-0">

                    @if ($attendance->isEmpty())
                        <div class="text-center py-4">
                            <p class="mb-0">No Records Found</p>
                        </div>
                    @else
                        @foreach ($attendance as $record)
                            <a class="notification border-x-0 border-bottom-0 border-300 rounded-top-0" href="#!">
                                <div class="notification-avatar">
                                    <div class="avatar avatar-xl me-3">
                                        <div class="avatar-emoji rounded-circle">
                                            <span role="img" aria-label="Emoji">📅️</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="notification-body">
                                    <p class="mb-1">
                                        <strong>{{ $students->full_name }}</strong> with
                                        <strong>{{ $students->rfid_tag }}</strong> tag card at
                                    </p>
                                    <span class="notification-time">
                                        {{ \Carbon\Carbon::parse($record->created_at)->format('d M Y, h:i A') }}
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    @endif

                </div>
            </div>

        </div>
        <div class="col-lg-4 ps-lg-2">
            <div class="sticky-sidebar">
                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Guardian</h5>
                    </div>
                    <div class="card-body fs--1">
                        <div class="d-flex"><a href="#!"> <img class="img-fluid"
                                    src="{{ $students->user->profile_photo_path }}" alt="" width="56" /></a>
                            <div class="flex-1 position-relative ps-3">
                                <h6 class="fs-0 mb-0">{{ $students->user->name }}<span data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Verified"><small
                                            class="fa fa-check-circle text-primary"
                                            data-fa-transform="shrink-4 down-2"></small></span>
                                </h6>
                                <p class="mb-1">{{ $students->relationship }}</p>
                                <p class="text-1000 mb-0"> <a href="">{{ $students->user->email }}</a> &bull; <a
                                        href="#!">{{ $students->user->phone }}</a></p>
                                <p class="text-1000 mb-0">{{ $students->user->address }}</p>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">School</h5>
                    </div>
                    <div class="card-body fs--1">
                        <div class="d-flex"><a href="#!">
                                <div class="avatar avatar-3xl">
                                    <div class="avatar-name rounded-circle"><span>SK</span></div>
                                </div>
                            </a>
                            <div class="flex-1 position-relative ps-3">
                                <h6 class="fs-0 mb-0"> <a>{{$students->school->name}}<span data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Verified"><small
                                                class="fa fa-check-circle text-primary"
                                                data-fa-transform="shrink-4 down-2"></small></span></a></h6>
                                <p class="mb-1">{{ $students->type == 'second' ? 'Primary School' : 'Secondary School' }}
                                </p>

                                <p class="text-1000 mb-0">{{$students->school->first_address}}</p>
                                <p class="text-1000 mb-0">{{$students->school->second_address}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Van Information</h5>
                    </div>
                    <div class="card-body fs--1">
                        <div class="d-flex"><a href="#!">
                                <div class="avatar avatar-3xl">
                                    <div class="avatar-name rounded-circle"><span>Van</span></div>
                                </div>
                            </a>
                            <div class="flex-1 position-relative ps-3">
                                <h6 class="fs-0 mb-0"> <a>{{$students->rate?->van?->user?->name}}<span data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Verified"><small
                                                class="fa fa-check-circle text-primary"
                                                data-fa-transform="shrink-4 down-2"></small></span></a></h6>
                                <p class="mb-1">{{$students->van?->license_plate}}
                                </p>

                                <p class="text-1000 mb-0">{{$students->district}}</p>
                                <p class="text-1000 mb-0">{{$students->school->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection