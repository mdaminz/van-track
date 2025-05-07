@php
    $layout = match (Auth::user()->usertype) {
        'admin' => 'admin.admin-base',
        'driver' => 'driver.driver-base',
        default => 'user.user-base',
    };
@endphp

@extends($layout)

<base href="/public">

@section('body-content')

    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);">
        </div>

        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Report #{{$report_data->id}}</h3>
                    <p class="mb-0">Below is the Full Report Information.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-0">
        <div class="col-lg-8 pe-lg-2">
            <div class="card mb-3 mb-lg-0">
                <div class="card-body">
                    <h5 class="fs-0 mb-3">{{$report_data->subject}}</h5>
                    <p>{!! nl2br(e($report_data->description)) !!}</p>
                    <img class="img-fluid w-100" style="" src="report/{{$report_data->image}}" alt="">
                </div>
            </div>
        </div>
        <div class="col-lg-4 ps-lg-2">
            <div class="sticky-sidebar">
                <div class="card mb-3 fs--1">
                    <div class="card-body">
                        <h6>Date And Time</h6>
                        <p class="mb-1">{{ \Carbon\Carbon::parse($report_data->created_at)->format('d M Y, h:i A') }}

                        <h6 class="mt-4">User Information</h6>
                        <p class="mb-1">Name: {{$report_data->user->name}}
                        <p class="mb-1">Email Address: {{$report_data->user->email}}
                        <p class="mb-1">Phone Number: {{$report_data->user->phone}}
                        <p class="mb-1">Address: {{$report_data->user->address}}

                        <h6 class="mt-4">Status</h6>
                        <p class="fs--1 mb-0">Resolved At: {{ \Carbon\Carbon::parse($report_data->resolved_at)->format('d M Y, h:i A') }}</p>
                        <p class="fs--1 mb-0">Remarks: {{$report_data->remarks}}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection