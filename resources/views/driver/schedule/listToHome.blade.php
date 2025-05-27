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
                    <h3>Attendance List</h3>
                    {{-- <p class="mb-0">Below is the list of all schedule currently assign to you.
                    </p> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-lg-5">
            <div class="card mb-3">
                <div class="card-header position-relative min-vh-25 mb-7">
                    <div class="bg-holder rounded-3 rounded-bottom-0"
                        style="background-image:url(homepage/img/about.jpg);">
                    </div>
                    <!--/.bg-holder-->

                    <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm"
                            src="{{$driver->profile_photo_path}}" width="200" alt="" /></div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <h4 class="mb-1"> {{$driver->name}}<span data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Verified"><small class="fa fa-check-circle text-primary"
                                        data-fa-transform="shrink-4 down-2"></small></span>
                            </h4>
                            <h5 class="fs-0 fw-normal">{{$rate->school->name}} -></h5>
                            <p class="text-500">{{$rate->district}}</p>
                            <div class="border-dashed-bottom my-4 d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card" id="TableCrmRecentLeads"
                data-list='{"valueNames":["name","email","status"],"page":8,"pagination":true}'>
                <div class="card-header d-flex flex-between-center py-2">
                    <h6 style="margin-top: 5px;" class="mb-0">Student ({{ $presentCount }}/{{ $totalCount }})</h6>
                </div>
                <div class="card-body px-0 py-0">
                    <div class="table-responsive scrollbar">
                        <table class="table fs--1 mb-0">
                            <thead class="bg-200 text-800">
                                <tr>
                                    <th class="sort align-middle" data-sort="name">Name</th>
                                    <th class="sort align-middle" data-sort="email">RFID Tag</th>
                                    <th class="sort align-middle" data-sort="email">Contact</th>
                                    <th class="sort align-middle" data-sort="status">Status</th>
                                    {{-- <th class="sort align-middle text-end">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody class="list" id="table-recent-leads-body">
                                @foreach ($students as $students_data)
                                    <tr class="hover-actions-trigger btn-reveal-trigger hover-bg-100">
                                        <td class="align-middle white-space-nowrap"><a href="detail_student/{{$students_data->id}}">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-xl">
                                                        <img class="rounded-circle" src="student/{{$students_data->profile_photo}}"
                                                            alt="" />

                                                    </div>
                                                    <h6 class="mb-0 ps-2 text-800 name">{{$students_data->full_name}}</h6>
                                                </div>
                                            </a></td>
                                        <td class="align-middle white-space-nowrap text-primary email">{{$students_data->rfid_tag}}</td>
                                        <td class="align-middle white-space-nowrap text-primary email">{{$students_data->emergency_contact}}</td>
                                        @if ($students_data->attendance_status == "Present")
                                            <td class="align-middle white-space-nowrap">
                                                <small class="badge fw-semi-bold rounded-pill status badge-soft-success">Present</small>
                                            </td>
                                        @else
                                            <td class="align-middle white-space-nowrap">
                                                <small class="badge fw-semi-bold rounded-pill status badge-soft-danger">Absent</small>
                                            </td>
                                        @endif
                                        {{-- <td class="align-middle white-space-nowrap">
                                            <small class="badge fw-semi-bold rounded-pill status badge-soft-success">Present</small>


                                        {{-- <td class="align-middle white-space-nowrap text-end position-relative">
                                            <div class="hover-actions bg-100">
                                                <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm"><span
                                                        class="far fa-edit"></span></button>
                                                <button class="btn icon-item rounded-3 me-2 fs--2 icon-item-sm"><span
                                                        class="far fa-comment"></span></button>
                                            </div>
                                            <div class="dropdown font-sans-serif btn-reveal-trigger">
                                                <button
                                                    class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none"
                                                    type="button" id="crm-recent-leads-3" data-bs-toggle="dropdown"
                                                    data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                                        class="fas fa-ellipsis-h fs--2"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2"
                                                    aria-labelledby="crm-recent-leads-3"><a class="dropdown-item"
                                                        href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                                        href="#!">Remove</a>
                                                </div>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection