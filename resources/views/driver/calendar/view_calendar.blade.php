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
                    <h3>Calendar</h3>
                    {{-- <p class="mb-0">Below is your schedule of pickups and drop-offs.</p> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3 overflow-hidden">
        <div class="card-header">
            <div class="row gx-0 align-items-center">
                <div class="col-auto d-flex justify-content-end order-md-1">
                    <button class="btn icon-item icon-item-sm shadow-none p-0 me-1 ms-md-2" type="button" data-event="prev"
                        data-bs-toggle="tooltip" title="Previous">
                        <span class="fas fa-arrow-left"></span>
                    </button>
                    <button class="btn icon-item icon-item-sm shadow-none p-0 me-1 me-lg-2" type="button" data-event="next"
                        data-bs-toggle="tooltip" title="Next">
                        <span class="fas fa-arrow-right"></span>
                    </button>
                </div>
                <div class="col-auto col-md-auto order-md-2">
                    <h4 class="mb-0 fs-0 fs-sm-1 fs-lg-2 calendar-title">Driver Schedule</h4>
                </div>
                <div class="col col-md-auto d-flex justify-content-end order-md-3">
                    <button class="btn btn-falcon-primary btn-sm" type="button" data-event="today">Today</button>
                </div>
                <div class="col-md-auto d-md-none">
                    <hr />
                </div>
                <div class="col d-flex justify-content-end order-md-2">
                    <div class="dropdown font-sans-serif me-md-2">
                        <button class="btn btn-falcon-default text-600 btn-sm dropdown-toggle dropdown-caret-none"
                            type="button" id="calendar-view-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <span data-view-title="data-view-title">Month View</span>
                            <span class="fas fa-sort ms-2 fs--1"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="calendar-view-toggle">
                            <a class="dropdown-item d-flex justify-content-between" href="#!"
                                data-fc-view="dayGridMonth">Month View</a>
                            <a class="dropdown-item d-flex justify-content-between" href="#!"
                                data-fc-view="timeGridWeek">Week View</a>
                            <a class="dropdown-item d-flex justify-content-between" href="#!" data-fc-view="timeGridDay">Day
                                View</a>
                            <a class="dropdown-item d-flex justify-content-between" href="#!" data-fc-view="listWeek">List
                                View</a>
                            <a class="dropdown-item d-flex justify-content-between" href="#!" data-fc-view="listYear">Year
                                View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="calendar-outline" id="appCalendar"></div>
        </div>
    </div>

    <!-- FullCalendar Scripts -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('appCalendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth', // Set default view to Month view
                height: 'auto',
                headerToolbar: false,
                events: {!! $events !!},
                viewDidMount: function () {
                    document.querySelector('[data-view-title]').innerText = 'Month View';
                }
            });

            // Trigger rendering of the calendar
            setTimeout(() => {
                calendar.render();
            }, 100);

            // Navigation buttons
            document.querySelector('[data-event="today"]').addEventListener('click', () => calendar.today());
            document.querySelector('[data-event="prev"]').addEventListener('click', () => calendar.prev());
            document.querySelector('[data-event="next"]').addEventListener('click', () => calendar.next());

            // View switcher
            document.querySelectorAll('[data-fc-view]').forEach(button => {
                button.addEventListener('click', function () {
                    calendar.changeView(this.getAttribute('data-fc-view'));
                    document.querySelector('[data-view-title]').innerText = this.innerText.trim();
                });
            });
        });
    </script>

@endsection
