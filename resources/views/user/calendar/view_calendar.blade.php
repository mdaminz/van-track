@extends(Auth::user()->usertype == 'admin' ? 'admin.admin-base' : 'user.user-base')


@section('body-content')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
    <div class="card" style="border-radius: 10px;">
        <div class="card-body bg-white">
            <div id="calendar"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '{{ route('parent.calendar.events') }}',
                eventDidMount: function (info) {
                    const district = info.event.extendedProps.district || 'N/A';
                    const school = info.event.extendedProps.school || 'N/A';
                    const van = info.event.extendedProps.van || 'N/A';
                    const toSchool = info.event.extendedProps.toSchool || 'N/A';
                    const toHome = info.event.extendedProps.toHome || 'N/A';

                    const tooltip =
                        `District: ${district}\n` +
                        `School: ${school}\n` +
                        `Van: ${van}\n` +
                        `To School: ${toSchool}\n` +
                        `To Home: ${toHome}`;

                    info.el.setAttribute('title', tooltip);
                }
            });

            calendar.render();
        });
    </script>
@endsection