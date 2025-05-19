@php
    $layout = match (Auth::user()->usertype) {
        'admin' => 'admin.admin-base',
        'driver' => 'driver.driver-base',
        default => 'user.user-base',
    };
@endphp

@extends($layout)

@section('body-content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);">
        </div>

        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Schedule List</h3>
                    {{-- <p class="mb-0">Below is the list of all schedule currently assign to you.
                    </p> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                @foreach ($schedule as $schedule_data)
                    <div class="mb-4 col-md-6 col-lg-4">
                        <div class="border rounded-1 h-100 d-flex flex-column justify-content-between pb-3">
                            <div class="overflow-hidden">
                                <div class="position-relative rounded-top overflow-hidden"><a class="d-block"
                                        ><img
                                            class="img-fluid rounded-top" src="homepage/img/about.jpg" alt="" /></a>
                                </div>
                                <div class="p-3">
                                    <h5 class="fs-0"><a class="text-dark"
                                            >{{$schedule_data->school->name}}
                                            -></a></h5>
                                    <p class="fs--1 mb-3"><a class="text-500" href="#!">{{$schedule_data->district}}</a></p>
                                    <p class="fs--1 mb-1">Pickup Time to School: <strong>{{$schedule_data->start_time}}</strong>
                                    </p>
                                    <p class="fs--1 mb-1">Pickup Time to Home: <strong>{{$schedule_data->end_time}}</strong>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex flex-between-center px-3">
                                <div class="ms-auto">
                                    <a class="btn btn-sm btn-falcon-default me-2" href="student_listToSchool/{{$schedule_data->id}}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="To School"><span class="fas fa-school"></span></a>
                                    <a class="btn btn-sm btn-falcon-default" href="student_listToHome/{{$schedule_data->id}}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="To Home"><span class="fas fa-home"></span></a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection