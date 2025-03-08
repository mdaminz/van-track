@extends('dashboard-base')

@section('body-content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Features</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item text-white active">Features</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

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
                            <a class="fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
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
                            <a class="fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
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
                            <a class="fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
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
                            <a class="fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
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
                            <a class="fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
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
                            <a class="fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
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
@endsection
