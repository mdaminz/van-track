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

    <style>
        .gm-style-iw {
            pointer-events: auto !important;
        }

        .custom-marker {
            transition: transform 0.2s;
        }

        .custom-marker:hover {
            transform: scale(1.1);
            z-index: 1000;
        }
    </style>

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
            <div class="card">
                <div class="card-header position-relative min-vh-25 mb-7">
                    <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(homepage/img/about.jpg);">
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
                            <h5 class="fs-0 fw-normal">From {{$rate->district}}</h5>
                            <p class="text-500">{{$rate->school->name}}</p>
                            <div class="border-dashed-bottom my-4 d-lg-none"></div>
                            <p class="fs--1 mb-1">Pickup Time to School: <strong>{{ \Carbon\Carbon::parse($rate->start_time)->format('g:i a') }}</strong>
                            </p>
                            <p class="fs--1 mb-1">Pickup Time to Home: <strong>{{ \Carbon\Carbon::parse($rate->start_time)->format('g:i a') }}</strong>
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
                                    <th class="sort align-middle d-none d-md-table-cell" data-sort="email">Contact</th>
                                    <th class="sort align-middle" data-sort="status">Status</th>
                                    {{-- <th class="sort align-middle text-end">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody class="list" id="table-recent-leads-body">
                                @foreach ($students as $students_data)
                                    <tr class="hover-actions-trigger btn-reveal-trigger hover-bg-100">
                                        <td class="align-middle white-space-nowrap"><a
                                                href="detail_student/{{$students_data->id}}">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-xl">
                                                        <img class="rounded-circle"
                                                            src="student/{{$students_data->profile_photo}}" alt="" />
                                                    </div>
                                                    <h6 class="mb-0 ps-2 text-800 name">{{$students_data->full_name}}</h6>
                                                </div>
                                            </a></td>
                                        <td class="align-middle white-space-nowrap text-primary email">
                                            {{$students_data->rfid_tag}}
                                        </td>
                                        <td class="align-middle white-space-nowrap text-primary email d-none d-md-table-cell">
                                            {{$students_data->emergency_contact}}
                                        </td>
                                        @if ($students_data->attendance_status == "Present")
                                            <td class="align-middle white-space-nowrap">
                                                <small
                                                    class="badge fw-semi-bold rounded-pill status badge-soft-success">Present</small>
                                            </td>
                                        @else
                                            <td class="align-middle white-space-nowrap">
                                                <small
                                                    class="badge fw-semi-bold rounded-pill status badge-soft-danger">Absent</small>
                                            </td>
                                        @endif
                                        {{-- <td class="align-middle white-space-nowrap">
                                            <small
                                                class="badge fw-semi-bold rounded-pill status badge-soft-success">Present</small>


                                            {{--
                                        <td class="align-middle white-space-nowrap text-end position-relative">
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
    <div class="card mb-3">
        <div style="padding-bottom: 5px" class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
                    <h5>Student Address
                        <span style="margin-left: 10px" class="badge rounded-pill badge-soft-primary">{{$driver->van->license_plate}}</span>
                    </h5>
                </div>
            </div>
        </div>
        <div class="card-body bg-light">
            <div id="map" style="height: 500px; width: 100%; border-radius:5px; padding: 5px;"></div>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_laSxhJzorMjiy5WkWUSMxMexSk_beZI"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            class CustomMarker extends google.maps.OverlayView {
                constructor(position, imageUrl, map, infoContent = null) {
                    super();
                    this.position = position;
                    this.imageUrl = imageUrl;
                    this.map = map;
                    this.div = null;
                    this.infoContent = infoContent;
                    this.setMap(map);
                }

                onAdd() {
                    this.div = document.createElement("div");
                    this.div.className = "custom-marker";
                    this.div.style.width = "50px";
                    this.div.style.height = "50px";
                    this.div.style.borderRadius = "50%";
                    this.div.style.backgroundImage = `url('${this.imageUrl}')`;
                    this.div.style.backgroundSize = "cover";
                    this.div.style.border = "2px solid white";
                    this.div.style.boxShadow = "0 0 6px rgba(0,0,0,0.3)";
                    this.div.style.position = "absolute";
                    this.div.style.cursor = "pointer";

                    if (this.infoContent) {
                        const infoWindow = new google.maps.InfoWindow();
                        let hoverTimeout;

                        this.div.addEventListener("mouseenter", () => {
                            clearTimeout(hoverTimeout);
                            infoWindow.setContent(this.infoContent);
                            infoWindow.setPosition(this.position);
                            infoWindow.open(this.map);
                        });

                        this.div.addEventListener("mouseleave", () => {
                            hoverTimeout = setTimeout(() => {
                                infoWindow.close();
                            }, 1000);
                        });

                        google.maps.event.addListener(infoWindow, 'domready', () => {
                            const infoEl = document.getElementById(`info-${this.position.lat()}-${this.position.lng()}`);
                            if (infoEl) {
                                infoEl.addEventListener('mouseenter', () => clearTimeout(hoverTimeout));
                                infoEl.addEventListener('mouseleave', () => {
                                    hoverTimeout = setTimeout(() => infoWindow.close(), 1000);
                                });
                            }
                        });
                    }

                    this.getPanes().overlayImage.appendChild(this.div);
                }

                draw() {
                    const overlayProjection = this.getProjection();
                    const pos = overlayProjection.fromLatLngToDivPixel(this.position);
                    if (this.div) {
                        this.div.style.left = `${pos.x - 25}px`;
                        this.div.style.top = `${pos.y - 25}px`;
                    }
                }

                onRemove() {
                    if (this.div) {
                        this.div.parentNode.removeChild(this.div);
                        this.div = null;
                    }
                }
            }

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 13,
                center: { lat: 3.1390, lng: 101.6869 },
            });

            const students = @json($students);
            const geocoder = new google.maps.Geocoder();

            students.forEach(student => {
                const fullAddress = student.address;
                const imageUrl = `/student/${student.profile_photo}`;
                const infoContent = `
                                                    <div id="info-${student.id}" style="font-size: 14px; pointer-events: auto;">
                                                        <strong>${student.full_name}</strong><br>

                                                        <a href="https://www.google.com/maps/dir/?api=1&destination=${encodeURIComponent(student.address)}"
                                                           target="_blank"
                                                           title="Get Directions">${student.address}</a>
                                                    </div>
                                                `;

                geocoder.geocode({ address: fullAddress }, (results, status) => {
                    if (status === "OK" && results[0]) {
                        const position = results[0].geometry.location;
                        new CustomMarker(position, imageUrl, map, infoContent);
                    } else {
                        console.error("Geocode failed for:", fullAddress, status);
                    }
                });
            });

            // Show driver's location (with profile photo)
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(position => {
                    const myPos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    map.setCenter(myPos);

                    const driverImage = '{{ asset($driver->profile_photo_path) }}';
                    new CustomMarker(new google.maps.LatLng(myPos.lat, myPos.lng), driverImage, map);
                });
            }
        });
    </script>

    <script>
        function refreshStudentTable(rateId) {
            fetch(`/students/to-school/${rateId}/data`)
                .then(response => response.json())
                .then(data => {
                    const tbody = document.querySelector('#table-recent-leads-body');
                    tbody.innerHTML = ''; // clear old rows

                    data.students.forEach(student => {
                        const row = document.createElement('tr');
                        row.classList.add('hover-actions-trigger', 'btn-reveal-trigger', 'hover-bg-100');
                        row.innerHTML = `
                            <td class="align-middle white-space-nowrap">
                                <a href="/detail_student/${student.id}">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl">
                                            <img class="rounded-circle" src="/student/${student.profile_photo}" alt="" />
                                        </div>
                                        <h6 class="mb-0 ps-2 text-800 name">${student.full_name}</h6>
                                    </div>
                                </a>
                            </td>
                            <td class="align-middle white-space-nowrap text-primary email">${student.rfid_tag}</td>
                            <td class="align-middle white-space-nowrap text-primary email d-none d-md-table-cell">${student.emergency_contact}</td>
                            <td class="align-middle white-space-nowrap">
                                <small class="badge fw-semi-bold rounded-pill status badge-soft-${student.attendance_status === 'Present' ? 'success' : 'danger'}">
                                    ${student.attendance_status}
                                </small>
                            </td>
                        `;
                        tbody.appendChild(row);
                    });

                    // Update the student count in the header
                    const header = document.querySelector('h6.mb-0');
                    header.textContent = `Student (${data.presentCount}/${data.totalCount})`;
                });
        }

        // Call this on page load or with a button:
        // Example: refreshStudentTable({{ $rate->id }});

        // Optional: Auto refresh every 30 seconds
        setInterval(() => {
            refreshStudentTable({{ $rate->id }});
        }, 30000);
    </script>



    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script>


    <script src="https://maps.googleapis.com/maps/api/js?key={{ $googleMapsApiKey }}&callback=initMap" async defer></script>


@endsection