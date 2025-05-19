@extends('dashboard-base')

@section('body-content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="homepage/img/carousel-2.jpeg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Welcome To VanTrack</h5>
                                <h1 class="display-4 text-white animated slideInDown mb-4">Safety and Convenience for
                                    Parents and Drivers</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Stay connected, informed, and stress-free
                                    with our real-time tracking and communication system.</p>
                                <!-- <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read
                                                                More</a>
                                                            <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Free Quote</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="homepage/img/carousel-1.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Welcome To VanTrack</h5>
                                <h1 class="display-4 text-white animated slideInDown mb-4">Effortless School Van Management
                                    at Your Fingertips</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Track routes, manage attendance, and simplify
                                    payments with VanTrack's advanced tools system.</p>
                                <!-- <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read
                                                                More</a>
                                                            <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Free Quote</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="homepage/img/carousel-3.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Welcome To VanTrack</h5>
                                <h1 class="display-4 text-white animated slideInDown mb-4">Revolutionizing School Commutes
                                    with RFID Technology</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Experience reliable attendance logging,
                                    optimized scheduling, and seamless coordination every day.</p>
                                <!-- <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read
                                                                More</a>
                                                            <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Free Quote</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Feature Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center justify-content-center bg-light"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-location-arrow fa-2x text-primary"></i>
                        </div>
                        <h1 class="display-1 text-light mb-0">01</h1>
                    </div>
                    <h5>Reliable Tracking</h5>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center justify-content-center bg-light"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-edit fa-2x text-primary"></i>
                        </div>
                        <h1 class="display-1 text-light mb-0">02</h1>
                    </div>
                    <h5>Secure Attendance</h5>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center justify-content-center bg-light"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-stopwatch fa-2x text-primary"></i>
                        </div>
                        <h1 class="display-1 text-light mb-0">03</h1>
                    </div>
                    <h5>Seamless Payments</h5>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center justify-content-center bg-light"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-bus fa-2x text-primary"></i>
                        </div>
                        <h1 class="display-1 text-light mb-0">04</h1>
                    </div>
                    <h5>Exceptional Service</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Start -->



    <!-- About Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="homepage/img/about.jpg"
                            style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">About Us</h1>
                        </div>
                        <p class="mb-4 pb-2">At VanTrack, we are dedicated to transforming school transportation with
                            innovative, reliable, and safe solutions. Our platform uses cutting-edge technology, including
                            real-time tracking and RFID-based attendance, to ensure smooth, secure commutes for students and
                            peace of mind for parents and school administrators.</p>
                        <p class="mb-4 pb-2">At VanTrack, we are dedicated to transforming school transportation with
                            innovative, reliable, and safe solutions. Our platform uses cutting-edge technology, including
                            real-time tracking and RFID-based attendance, to ensure smooth, secure commutes for students and
                            peace of mind for parents and school administrators.</p>
                        <p class="mb-4 pb-2">At VanTrack, we are dedicated to transforming school transportation with
                            innovative, reliable, and safe solutions. Our platform uses cutting-edge technology, including
                            real-time tracking and RFID-based attendance, to ensure smooth, secure commutes for students and
                            peace of mind for parents and school administrators.</p>
                        <div class="row g-4 mb-4 pb-2">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa fa-users fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h2 class="text-primary mb-1" data-toggle="counter-up">{{ $userCount }}</h2>
                                        <p class="fw-medium mb-0">Happy Parents</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa fa-check fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h2 class="text-primary mb-1" data-toggle="counter-up">{{ $studentCount }}</h2>
                                        <p class="fw-medium mb-0">Student Number</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <a href="" class="btn btn-primary py-3 px-5">Explore More</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Key Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Our Key Features</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img style="height: 230px; width: 100%;" class="img-fluid" src="homepage/img/feature-1.jpg"
                                alt="">
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">Real-Time Van Tracking</h4> <br />
                            <p>Stay updated on the exact location of school vans through our live tracking system, ensuring
                                timely pickups and drop-offs with complete peace of mind.</p>
                            <!-- <a class="fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img style="height: 230px; width: 100%;" class="img-fluid" src="homepage/img/carousel-3.jpg"
                                alt="">
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">RFID-Based Attendance Management</h4>
                            <p>Seamlessly record student attendance as they board and leave the van using RFID technology,
                                providing accurate, hassle-free records.</p>
                            <!-- <a class="fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img style="height: 230px; width: 100%;" class="img-fluid" src="homepage/img/feature-3.jpg"
                                alt="">
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">Payment Management</h4> <br />
                            <p>Simplify fee collection with a secure payment system that tracks due dates, generates
                                invoices, and keeps all transactions organized.</p> <br />
                            <!-- <a class="fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img style="height: 230px; width: 100%;" class="img-fluid" src="homepage/img/feature-4.jpg"
                                alt="">
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">Route Optimization</h4>
                            <p>Efficiently plan and manage school van routes to minimize delays and save time, benefiting
                                both drivers and parents.</p>
                            <!-- <a class="fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img style="height: 230px; width: 100%;" class="img-fluid" src="homepage/img/feature-5.jpg"
                                alt="">
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">Parent-Driver Communication</h4>
                            <p>Facilitate direct communication between parents and drivers for real-time updates, urgent
                                notifications, or special requests.</p>
                            <!-- <a class="fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img style="height: 230px; width: 100%;" class="img-fluid" src="homepage/img/feature-6.jpg"
                                alt="">
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">Comprehensive Reporting</h4>
                            <p>Generate detailed reports for attendance, payment history, making it
                                easy for van operators to monitor operations.</p>
                            <!-- <a class="fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Key Features End -->


    <!-- Choose Us Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container feature px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 ps-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">Why Choose Us</h1>
                        </div>
                        <p class="mb-4 pb-2">At VanTrack, we understand the challenges of managing school transportation
                            and are committed to providing a solution that ensures safety, efficiency, and convenience for
                            parents, drivers, and schools. Here's why you can trust us:</p>
                        <div class="row g-4">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa fa-check fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="mb-2">Reliable and</p>
                                        <h5 class="mb-0">Secure Solutions</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa fa-user-check fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="mb-2">Seamless</p>
                                        <h5 class="mb-0">User Experience</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa fa-drafting-compass fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="mb-2">Innovative</p>
                                        <h5 class="mb-0">Technology</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa fa-headphones fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="mb-2">Proven</p>
                                        <h5 class="mb-0">Reliability</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="homepage/img/choose-us.jpg"
                            style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Choose Us End -->



    <!-- Services Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Our Services</h1>
            </div>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                        <li class="mx-2 active" data-filter="*">All</li>
                        <li class="mx-2" data-filter=".first">Primary School</li>
                        <li class="mx-2" data-filter=".second">Secondary School</li>
                    </ul>
                </div>
            </div>
            <div class="row g-4 portfolio-container">
                @foreach ($rates as $rates_data)
                    <div class="col-lg-4 col-md-6 portfolio-item {{ $rates_data->school->type }} wow fadeInUp"
                        data-wow-delay="0.4s">
                        {{-- Price badge in top-right --}}
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <img style="height: 300px;" class="img-fluid w-100"
                                    src="school/{{ $rates_data->school->image }}" alt="">
                                {{-- <div class="portfolio-overlay">
                                    <a class="btn btn-square btn-outline-light mx-1" href="school/{{ $schools->image }}"
                                        data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                                </div> --}}
                            </div>
                            <div class="border border-5 border-light border-top-0 p-4">
                                <p class="text-primary fw-medium mb-2">
                                    @if ($rates_data->school->type == 'first')
                                        Primary School
                                    @else
                                        Secondary School
                                    @endif
                                </p>
                                <div class="position-absolute top-0 end-0 m-4">
                                    <span class="badge bg-primary rounded-pill shadow">
                                        RM {{ number_format($rates_data->price, 2) }}
                                    </span>
                                </div>
                                <h5 class="lh-base mb-0">{{ $rates_data->district }}</a> ➡️</h5>
                                <h5 class="lh-base mb-0">{{ $rates_data->school->name }}</a></h5>
                                {{-- <p class="fw-normal mb-0">{{ $rates_data->school->first_address }}</p> --}}
                                <p class="fw-normal mb-0">{{ $rates_data->school->second_address }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Services End -->
    {{-- <!-- Quote Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container quote px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="homepage/img/quote.jpg"
                            style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 quote-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">Free Quote</h1>
                        </div>
                        <p class="mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet
                            diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet</p>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Your Name"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control border-0" placeholder="Your Email"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Your Mobile"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select border-0" style="height: 55px;">
                                        <option selected>Select A Service</option>
                                        <option value="1">Service 1</option>
                                        <option value="2">Service 2</option>
                                        <option value="3">Service 3</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control border-0" placeholder="Special Note"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End --> --}}


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Team Members</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($team_members as $team_members)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item">
                            <div class="overflow-hidden position-relative">
                                <img style="height: 450px;" class="img-fluid" src="{{$team_members->profile_photo_path}}"
                                    alt="">
                                {{-- <div class="team-social">
                                    <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                                </div> --}}
                            </div>
                            <div class="text-center border border-5 border-light border-top-0 p-4">
                                <h5 class="mb-0">{{$team_members->name}}</h5>
                                <small>{{$team_members->phone}}</small>
                                <small>({{ ucfirst($team_members->usertype) }})</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Testimonial</h1>
            </div>

            <div class="owl-carousel testimonial-carousel">
                @foreach ($feedbacks as $feedback)
                    <div class="testimonial-item text-center">
                        <img class="img-fluid bg-light p-2 mx-auto mb-3" src="/{{ $feedback->user->profile_photo_path }}"
                            style="width: 90px; height: 90px;">
                        <div class="testimonial-text text-center p-4">
                            <p>{{ $feedback->message }}
                            </p>
                            <h5 class="mb-1">{{ $feedback->user->name }}</h5>
                            <span class="fst-italic">{{ $feedback->user->email }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Testimonial End -->
@endsection