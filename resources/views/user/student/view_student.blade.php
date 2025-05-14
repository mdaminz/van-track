@extends(Auth::user()->usertype == 'admin' ? 'admin.admin-base' : 'user.user-base')


@section('body-content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);">
        </div>

        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Children Management</h3>
                    <p class="mb-0">Below is the list of all children associated with you in the system.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3" id="ordersTable"
        data-list='{"valueNames":["no","name","rfid","relationship","contact", "address"],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Children</h5>

                    <a style="margin-left: 10px;" href="create_student" class="btn btn-falcon-default btn-sm">
                        <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                        <span class="d-none d-sm-inline-block ms-1">New</span>
                    </a>
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
                            {{-- <th>
                                <div class="form-check fs-0 mb-0 d-flex align-items-center">
                                    <input class="form-check-input" id="checkbox-bulk-customers-select" type="checkbox"
                                        data-bulk-select='{"body":"table-orders-body","actions":"orders-bulk-actions","replacedElement":"orders-actions"}' />
                                </div>
                            </th> --}}
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="no">No</th>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="name">Full Name</th>
                            <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="rfid">RFID Tag</th>
                            @if (Auth::user()->usertype == 'admin')
                                <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address"
                                    style="min-width: 12.5rem;">Guardian</th>
                            @endif
                            <th class="sort pe-1 align-middle white-space-nowrap d-none d-md-table-cell" data-sort="relationship"
                                style="min-width: 12.5rem;">Relationship</th>
                            <th class="sort pe-1 align-middle white-space-nowrap d-none d-md-table-cell" data-sort="contact"
                                style="min-width: 12.5rem;">Emergency Contact</th>
                            <th class="sort pe-1 align-middle white-space-nowrap d-none d-md-table-cell" data-sort="address"
                                style="min-width: 12.5rem;">Address</th>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="status"
                                style="min-width: 5rem;">Status</th>
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
                        @foreach ($students as $students)
                            <tr class="btn-reveal-trigger">

                                <td class="no py-2 align-middle white-space-nowrap">{{ $number++ }}</td>
                                <!-- Increment the counter -->
                                <td class="name py-2 align-middle white-space-nowrap">{{ $students->full_name }}</td>
                                </td>
                                <td class="date py-2 align-middle">{{ $students->rfid_tag }}</td>
                                @if (Auth::user()->usertype == 'admin')
                                    <td class="date py-2 align-middle">{{ $students->user->name }}</td>
                                @endif
                                <td class="relationship py-2 align-middle white-space-nowrap d-none d-md-table-cell">{{ $students->relationship }}
                                </td>
                                <td class="contact py-2 align-middle white-space-nowrap d-none d-md-table-cell">{{ $students->emergency_contact }}
                                </td>
                                <td class="address py-2 align-middle white-space-nowrap d-none d-md-table-cell">{{ $students->address }}
                                </td>
                                </td>
                                @if ($students->status == 'Active')
                                    <td class="align-middle"><span
                                            class="badge badge rounded-pill d-block py-2 badge-soft-success">Active<span
                                                class="fas fa-check" data-fa-transform="shrink-2"></span></span>
                                    </td>
                                @else
                                    <td class="align-middle"><span
                                            class="badge badge rounded-pill d-block p-2 badge-soft-secondary">Inactive<span
                                                class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>
                                @endif
                                </td>
                                {{-- <td class="status py-2 align-middle text-center fs-0 white-space-nowrap">
                                    <img style="width: 120px;" src="student/{{ $students->profile_photo }}" alt="">
                                </td> --}}
                                <td class="py-2 align-middle white-space-nowrap text-end">
                                    <div class="dropdown font-sans-serif position-static">
                                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button"
                                            id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport"
                                            aria-haspopup="true" aria-expanded="false"><span
                                                class="fas fa-ellipsis-h fs--1"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                            aria-labelledby="order-dropdown-0">
                                            <div class="bg-white py-2"><a class="dropdown-item"
                                                    href="{{ url('detail_student', $students->id) }}">View</a><a
                                                    class="dropdown-item"
                                                    href="{{ url('update_student', $students->id) }}">Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger"
                                                    href="{{ url('delete_student', $students->id) }}">Delete</a>
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