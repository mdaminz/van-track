@extends('user.user-base')

@section('body-content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);">
        </div>

        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Children Attendance Records</h3>
                    <p class="mb-0">Below are the attendance details of Children registered in the system.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3" id="ordersTable"
        data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Children Attendance</h5>
                </div>
                <div class="col-8 col-sm-auto ms-auto text-end ps-0">

                    <div id="orders-actions">
                        <form method="GET" action="{{ route('parent_view_attendance') }}" class="d-inline">
                            <button class="btn btn-falcon-default btn-sm" type="submit" name="today"
                                value="{{ $isToday ? '0' : '1' }}">
                                <span class="fas fa-calendar-day"></span>
                                <span class="d-none d-sm-inline-block ms-1">{{ $isToday ? 'Show All' : 'Today' }}</span>
                            </button>
                        </form>


                        <button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-external-link-alt"
                                data-fa-transform="shrink-3 down-2"></span><span
                                class="d-none d-sm-inline-block ms-1">Export</span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar">
                <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                    <thead class="bg-200 text-900">
                        <tr>
                            {{-- <th>
                                <div class="form-check fs-0 mb-0 d-flex align-items-center">
                                    <input class="form-check-input" id="checkbox-bulk-customers-select" type="checkbox"
                                        data-bulk-select='{"body":"table-orders-body","actions":"orders-bulk-actions","replacedElement":"orders-actions"}' />
                                </div>
                            </th> --}}
                            <th class="sort" style="min-width: 5rem;" data-sort="order">No</th>
                            <th class="sort" style="min-width: 5rem;" data-sort="address">Date Time</th>
                            <th class="sort" style="min-width: 5rem;" data-sort="order">RFID Tag</th>
                            <th class="sort" style="min-width: 10rem;" data-sort="date">Student Name</th>
                            <th class="sort" style="min-width: 10rem;" data-sort="address">Address</th>
                            <th class="sort" data-sort="date">Status</th>

                            {{-- <th class="sort pe-1 align-middle white-space-nowrap text-center" data-sort="status">Photo
                            </th> --}}
                            {{-- <th class="no-sort"></th> --}}
                        </tr>
                    </thead>
                    <tbody class="list" id="table-orders-body">
                        @php
                            $number = 1; // Initialize the counter
                        @endphp
                        @foreach ($attendances as $attendances)
                            <tr class="btn-reveal-trigger">
                                {{-- <td class="align-middle" style="width: 28px;">
                                    <div class="form-check fs-0 mb-0 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="checkbox-0"
                                            data-bulk-select-row="data-bulk-select-row" />
                                    </div>
                                </td> --}}
                                <td class="order py-2">{{ $number++ }}</td>
                                <!-- Increment the counter -->
                                <td class="address py-2">
                                    {{ $attendances->created_at->format('d M Y, h:i A') }}
                                </td>
                                <td class="order py-2">{{ $attendances->rfid_tag }}
                                </td>
                                <td class="date py-2"><a
                                        href="detail_student/{{$attendances->student->id}}">{{ $attendances->student->full_name }}</a>
                                </td>
                                <td class="address py-2">
                                    {{ $attendances->student->address }}
                                </td>
                                @if ($attendances->status == 'In')
                                    <td class="align-middle"><span
                                            class="badge badge rounded-pill d-block py-2 badge-soft-success">In<span
                                                class="fas fa-check" data-fa-transform="shrink-2"></span></span>
                                    </td>
                                @else
                                    <td class="align-middle"><span
                                            class="badge badge rounded-pill d-block p-2 badge-soft-secondary">Out<span
                                                class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>
                                    </td>
                                @endif

                                {{-- <td class="status py-2 align-middle text-center fs-0 white-space-nowrap">
                                    <img style="width: 120px;" src="student/{{ $attendances->student->profile_photo }}" alt="">
                                </td> --}}
                                {{-- <td class="py-2 align-middle white-space-nowrap text-end">
                                    <div class="dropdown font-sans-serif position-static">
                                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button"
                                            id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport"
                                            aria-haspopup="true" aria-expanded="false"><span
                                                class="fas fa-ellipsis-h fs--1"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                            aria-labelledby="order-dropdown-0">
                                            <div class="bg-white py-2"><a class="dropdown-item" href="">Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td> --}}
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

    {{--
    <script>
        // Refresh the page every 5 seconds (5000 milliseconds)
        setInterval(function () {
            location.reload(); // Reloads the entire page
        }, 10000);
    </script> --}}
@endsection