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
                    <h3>Report History Management</h3>
                    {{-- <p class="mb-0">Below is the list of all reports by user in the system.</p> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-sm-6 col-md-6">
            <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card"
                    style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
                </div>
                <!--/.bg-holder-->

                <div class="card-body position-relative">
                    <h6>Total Report</h6>
                    <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                        data-countup='{"endValue":58.386,"decimalPlaces":2,"suffix":"k"}'>{{$totalReports}}</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card"
                    style="background-image:url(assets/img/icons/spot-illustrations/corner-2.png);">
                </div>
                <!--/.bg-holder-->

                <div class="card-body position-relative">
                    <h6>Report Resolved Today</h6>
                    <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"
                        data-countup='{"endValue":23.434,"decimalPlaces":2,"suffix":"k"}'>{{$newReportsToday}}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3" id="table-student"
        data-list='{"valueNames":["no", "name", "type", "subject", "resolved", "status"],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Report</h5>
                </div>
                <div class="col-8 col-sm-auto ms-auto text-end ps-0">
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input fuzzy-search" type="search" placeholder="Search..."
                            aria-label="Search" />
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar">

                <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="sort align-middle" style="min-width: 3rem;" data-sort="no">No</th>
                            <th class="sort align-middle" style="min-width: 15rem;" data-sort="name">Full Name</th>
                            <th class="sort align-middle" style="min-width: 5rem;" data-sort="type">Type</th>
                            <th class="sort align-middle" style="min-width: 15rem;" data-sort="subject">Subject</th>
                            <th class="sort align-middle" style="min-width: 10rem;" data-sort="resolved">Resolved At</th>
                            <th class="sort align-middle" style="min-width: 10rem;" data-sort="status">Status</th>

                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-student">
                        @php
                            $number = 1;
                        @endphp
                        @foreach ($report_data as $report_data)
                            <tr class="btn-reveal-trigger">

                                <td class="no align-middle" style="min-width: 3rem;">{{ $number++ }}</td>
                                <td class="name align-middle" style="min-width: 10rem;"><a
                                        href="profile_detail/{{$report_data->user_id}}">{{ $report_data->user->name }}</a></td>
                                <td class="type align-middle" style="min-width: 5rem;">{{ $report_data->type }}</td>
                                <td class="subject align-middle" style="min-width: 10rem;">{{ $report_data->subject }}</td>
                                <td class="resolved align-middle" style="min-width: 10rem;">
                                    {{ \Carbon\Carbon::parse($report_data->resolved_at)->format('d M Y, h:i A') }}</td>
                                </td>
                                @if ($report_data->status == 'Resolved')
                                    <td class="align-middle"><span
                                            class="badge badge rounded-pill d-block py-2 badge-soft-success">Resolved<span
                                                class="fas fa-check" data-fa-transform="shrink-2"></span></span>
                                    </td>
                                @else
                                    <td class="align-middle"><span
                                            class="badge badge rounded-pill d-block p-2 badge-soft-secondary">Pending<span
                                                class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>
                                    </td>
                                @endif

                                <td class="align-middle text-end">
                                    <div class="dropdown font-sans-serif position-static">
                                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button"
                                            id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport"
                                            aria-haspopup="true" aria-expanded="false"><span
                                                class="fas fa-ellipsis-h fs--1"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                            aria-labelledby="order-dropdown-0">
                                            <div class="bg-white py-2"><a class="dropdown-item"
                                                    href="{{ url('detail_report', $report_data->id) }}">View</a>

                                            </div>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex align-items-center justify-content-center">
                <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous"
                    data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                <ul class="pagination mb-0"></ul>
                <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next"
                    data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
            </div>
        </div>
    </div>
@endsection