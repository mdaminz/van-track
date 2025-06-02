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
                    <h3>Student Attendance Records</h3>
                    {{-- <p class="mb-0">Below are the attendance details of students registered in the system.</p> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3" id="ordersTable"
        data-list='{"valueNames":["no","date","rfid","studname","school", "address", "status"],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Student Attendance</h5>
                </div>
                <div class="col-8 col-sm-auto ms-auto text-end ps-0">
                    <div id="orders-actions" class="d-flex justify-content-end align-items-center gap-2">

                        {{-- <div class="col-8 col-sm-auto ms-auto text-end ps-0">
                            <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                                <input class="form-control search-input fuzzy-search" type="search" placeholder="Search..."
                                    aria-label="Search" />
                            </form>
                        </div> --}}

                        <!-- Select Dropdown -->
                        <select id="rate-select" class="form-select form-select-sm" style="max-width: 200px;">
                            <option value="">All Rates</option>
                            @foreach ($rates as $rate)
                                <option value="{{ $rate->id }}">
                                    School: {{ $rate->school->name }} | District: {{ $rate->district }}
                                </option>
                            @endforeach
                        </select>

                        <!-- Today/Show All Toggle Button -->
                        <button id="filter-button" class="btn btn-falcon-default btn-sm" type="button">
                            <span class="d-none d-sm-inline-block ms-1">Today</span>
                        </button>

                        <!-- Export Button -->
                        <button class="btn btn-falcon-default btn-sm" type="button" onclick="exportAttendanceTable()">
                            <span class="d-none d-sm-inline-block ms-1">Export</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive scrollbar">
                <table id="attendance-table" class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="sort" data-sort="no">No</th>
                            <th class="sort" data-sort="date">Date Time</th>
                            <th class="sort" data-sort="rfid">RFID Tag</th>
                            <th class="sort" data-sort="studname">Student Name</th>
                            <th class="sort" data-sort="school">School</th>
                            <th class="sort d-none d-md-table-cell" data-sort="address">Address</th>
                            <th hidden class="sort" data-sort="rate">Rate</th>
                            <th class="sort" data-sort="status">Status</th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-orders-body">
                        @php $number = 1; @endphp
                        @foreach ($attendances as $attendances)
                            <tr class="btn-reveal-trigger">
                                <td class="no py-2">{{ $number++ }}</td>
                                <td class="date py-2 date-cell" data-date="{{ $attendances->created_at }}">
                                    {{ $attendances->created_at->format('d M Y, h:i A') }}
                                </td>
                                <td class="rfid py-2">{{ $attendances->rfid_tag }}</td>
                                <td class="studname py-2">
                                    <a href="detail_student/{{ $attendances->student->id }}">
                                        {{ $attendances->student->full_name }}
                                    </a>
                                </td>
                                <td class="school py-2">{{ $attendances->student->school->name }}</td>
                                <td class="address py-2 d-none d-md-table-cell">{{ $attendances->student->address }}</td>
                                <td hidden class="rate py-2" data-rate="{{ $attendances->student->rate_id }}">
                                    {{ $attendances->student->rate_id }}
                                </td>
                                <td class="align-middle">
                                    @if ($attendances->status == 'In')
                                        <span class="badge badge rounded-pill d-block py-2 badge-soft-success">
                                            In <span class="fas fa-check" data-fa-transform="shrink-2"></span>
                                        </span>
                                    @else
                                        <span class="badge badge rounded-pill d-block p-2 badge-soft-secondary">
                                            Out <span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span>
                                        </span>
                                    @endif
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

    <!-- JS Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <script>
        function exportAttendanceTable() {
            const table = document.getElementById('attendance-table');
            const wb = XLSX.utils.table_to_book(table, { sheet: "Attendance Records" });
            XLSX.writeFile(wb, "attendance_records.xlsx");
        }

        const filterButton = document.getElementById("filter-button");
        let showingTodayOnly = false;

        filterButton.addEventListener("click", function () {
            const today = new Date().toISOString().slice(0, 10);
            const rows = document.querySelectorAll("#attendance-table tbody tr");

            if (!showingTodayOnly) {
                rows.forEach(row => {
                    const dateCell = row.querySelector(".date-cell");
                    const rowDate = new Date(dateCell.getAttribute("data-date")).toISOString().slice(0, 10);
                    row.style.display = rowDate === today ? "" : "none";
                });
                filterButton.innerHTML = `<span class="d-none d-sm-inline-block ms-1">Show All</span>`;
                showingTodayOnly = true;
            } else {
                rows.forEach(row => row.style.display = "");
                filterButton.innerHTML = `<span class="d-none d-sm-inline-block ms-1">Today</span>`;
                showingTodayOnly = false;
            }
        });

        // Rate filter
        const rateSelect = document.getElementById('rate-select');

        rateSelect.addEventListener('change', function () {
            const selectedRate = this.value;
            const rows = document.querySelectorAll("#attendance-table tbody tr");

            rows.forEach(row => {
                const rateCell = row.querySelector(".rate");
                const rateValue = rateCell ? rateCell.getAttribute('data-rate') : null;

                const showRow = selectedRate === "" || rateValue === selectedRate;
                row.style.display = showRow ? "" : "none";
            });
        });
    </script>

    <script>
        function refreshAttendanceTable() {
            fetch('{{ route('api.driver.attendance') }}')
                .then(response => response.text())
                .then(html => {
                    document.querySelector('#attendance-table tbody').innerHTML = html;

                    // Re-apply filters if needed
                    applyRateFilter();
                    applyDateFilter();
                })
                .catch(error => console.error('Error refreshing attendance:', error));
        }

        // Auto-refresh every 30 seconds
        setInterval(refreshAttendanceTable, 10000);

        // Filter re-application functions
        function applyRateFilter() {
            const selectedRate = document.getElementById('rate-select').value;
            const rows = document.querySelectorAll("#attendance-table tbody tr");

            rows.forEach(row => {
                const rateCell = row.querySelector(".rate");
                const rateValue = rateCell ? rateCell.getAttribute('data-rate') : null;
                const showRow = selectedRate === "" || rateValue === selectedRate;
                row.style.display = showRow ? "" : "none";
            });
        }

        function applyDateFilter() {
            if (!showingTodayOnly) return;

            const today = new Date().toISOString().slice(0, 10);
            const rows = document.querySelectorAll("#attendance-table tbody tr");

            rows.forEach(row => {
                const dateCell = row.querySelector(".date-cell");
                const rowDate = new Date(dateCell.getAttribute("data-date")).toISOString().slice(0, 10);
                row.style.display = rowDate === today ? "" : "none";
            });
        }
    </script>


@endsection