@extends('admin.admin-base')


@section('body-content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);">
        </div>

        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Feedback Management</h3>
                    <p class="mb-0">Below is the list of all feedback and review records in the system.</p>
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
                    <h6>Total Reviews</h6>
                    <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                        data-countup='{"endValue":58.386,"decimalPlaces":2,"suffix":"k"}'>{{$total_feedback}}</div>
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
                    <h6>5 Star Ratings</h6>
                    <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"
                        data-countup='{"endValue":23.434,"decimalPlaces":2,"suffix":"k"}'>{{$fivestar}}</div>
                </div>
            </div>
        </div>
    </div>


    <div class="card mb-3" id="ordersTable"
        data-list='{"valueNames":["no","rating","email","message",],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Feedbacks</h5>
                </div>
                {{-- <div class="col-8 col-sm-auto ms-auto text-end ps-0">
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input fuzzy-search" type="search" placeholder="Search..."
                            aria-label="Search" />
                    </form>
                </div> --}}
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
                            <th class="sort pe-1 align-middle" data-sort="rating">Rating</th>
                            <th class="sort pe-1 align-middle" data-sort="email">Email</th>
                            <th class="sort pe-1 align-middle" data-sort="address" style="min-width: 12.5rem;">Message</th>
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
                        @foreach ($feedback_data as $feedback_data)
                            <tr class="btn-reveal-trigger">

                                <td class="order py-2 align-middle">{{ $number++ }}</td>
                                <!-- Increment the counter -->
                                <td class="py-2 align-middle">{{ $feedback_data->rating }} Star
                                </td>
                                <td class="email py-2 align-middle"><a
                                        href="profile_detail/{{$feedback_data->user_id}}">{{ $feedback_data->user->email }}</a>
                                </td>
                                <td class="message py-2 align-middle">{{ $feedback_data->message }}
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
                                            <div class="bg-white py-2">
                                                <a class="dropdown-item text-danger"
                                                    href="{{ url('delete_feedback', $feedback_data->id) }}">Delete</a>
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

    <div class="col-sm-6 col-md-12">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">

                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info">
                    <!-- This is the chart container -->
                    <canvas id="ratingChart" width="500" height="300" style="max-height: 300px;"></canvas>

                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('ratingChart').getContext('2d');

        const ratingChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($ratingCounts->pluck('rating')->map(fn($r) => $r . ' Star')) !!},
                datasets: [{
                    data: {!! json_encode($ratingCounts->pluck('total')) !!},
                    backgroundColor: [
                        '#ef4444', // 1 star
                        '#f97316', // 2 stars
                        '#facc15', // 3 stars
                        '#4ade80', // 4 stars
                        '#60a5fa'  // 5 stars
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    title: {
                        display: true,
                        text: 'Feedback Star Ratings'
                    }
                }
            }
        });
    </script>

@endsection