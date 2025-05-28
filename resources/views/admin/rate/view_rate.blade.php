@extends('admin.admin-base')


@section('body-content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);">
        </div>

        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Rate & Schedule Management</h3>
                    {{-- <p class="mb-0">Below is the list of all rates records in the system.</p> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3" id="ordersTable"
        data-list='{"valueNames":["order","date","address","status","amount"],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Rates</h5>

                    <a style="margin-left: 10px;" href="create_rate" class="btn btn-falcon-default btn-sm">
                        <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                        <span class="d-none d-sm-inline-block ms-1">New</span>
                    </a>
                </div>
                <div class="col-8 col-sm-auto ms-auto text-end ps-0">
                    <div id="orders-actions">
                        {{-- <a href="admin_create_student" class="btn btn-falcon-default btn-sm">
                            <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                            <span class="d-none d-sm-inline-block ms-1">New</span>
                        </a> --}}

                        {{-- <button class="btn btn-falcon-default btn-sm mx-2" type="button"><span class="fas fa-filter"
                                data-fa-transform="shrink-3 down-2"></span><span
                                class="d-none d-sm-inline-block ms-1">Filter</span></button> --}}
                        {{-- <button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-external-link-alt"
                                data-fa-transform="shrink-3 down-2"></span><span
                                class="d-none d-sm-inline-block ms-1">Export</span></button> --}}
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
                            <th class="sort pe-1 align-middle" data-sort="order">No</th>
                            <th class="sort pe-1 align-middle" data-sort="order">School</th>
                            <th class="sort pe-1 align-middle" data-sort="order">District</th>
                            <th class="sort pe-1 align-middle" data-sort="order">Van Plate</th>
                            <th class="sort pe-1 align-middle" data-sort="address">Price</th>
                            {{-- <th class="sort pe-1 align-middle white-space-nowrap text-center" data-sort="status">
                                Profile
                                Photo</th> --}}
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-orders-body">
                        @php
                            $number = 1; // Initialize the counter
                        @endphp
                        @foreach ($rates as $rates)
                            <tr class="btn-reveal-trigger">

                                <td class="order py-2 align-middle">{{ $number++ }}</td>
                                <!-- Increment the counter -->
                                <td class="order py-2 align-middle">{{ $rates->school->name }}
                                </td>
                                <td class="order py-2 align-middle">{{ $rates->district }}
                                </td>
                                <td class="address py-2 align-middle">{{ $rates->van->license_plate }}
                                <td class="address py-2 align-middle">RM {{ $rates->price }}
                                </td>

                                <td class="py-2 align-middle white-space-nowrap text-end">
                                    <div class="dropdown font-sans-serif position-static">
                                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button"
                                            id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport"
                                            aria-haspopup="true" aria-expanded="false"><span
                                                class="fas fa-ellipsis-h fs--1"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                            aria-labelledby="order-dropdown-0">
                                            <div class="bg-white py-2">
                                                <a class="dropdown-item"
                                                    href="{{ url('update_rate', $rates->id) }}">Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="{{ url('delete_rate', $rates->id) }}">Delete</a>
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