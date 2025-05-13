@extends('dashboard-base')

@section('body-content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Service</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item text-white active">Service</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

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
                @foreach ($schools as $schools)
                    <div class="col-lg-4 col-md-6 portfolio-item {{ $schools->type }} wow fadeInUp" data-wow-delay="0.4s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <img style="height: 300px;" class="img-fluid w-100" src="school/{{ $schools->image }}" alt="">
                                {{-- <div class="portfolio-overlay">
                                    <a class="btn btn-square btn-outline-light mx-1" href="school/{{ $schools->image }}"
                                        data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                                </div> --}}
                            </div>
                            <div class="border border-5 border-light border-top-0 p-4">
                                <p class="text-primary fw-medium mb-2">
                                    @if ($schools->type == 'first')
                                        Primary School
                                    @else
                                        Secondary School
                                    @endif
                                </p>
                                <h5 class="lh-base mb-0">{{ $schools->name }}</a></h5>
                                <p class="fw-normal mb-0">{{ $schools->first_address }}</p>
                                <p class="fw-normal mb-0">{{ $schools->second_address }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Services End -->

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