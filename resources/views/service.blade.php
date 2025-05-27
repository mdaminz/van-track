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
                @foreach ($rates as $rates_data)
                    <div class="col-lg-4 col-md-6 portfolio-item {{ $rates_data->school->type }} wow fadeInUp"
                        data-wow-delay="0.4s">
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
                                <h5 class="lh-base mb-0">From {{ $rates_data->district }}</a></h5>
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
                            <p>{{ $feedback->message }}</p>
                            @if ($feedback->rating == '5')
                                <img class="p-2 mx-auto mb-3" src="homepage/img/5-star.png" style="width: 200px; height: 50px;">
                            @elseif ($feedback->rating == '4')
                                <img class="p-2 mx-auto mb-3" src="homepage/img/4-star.png" style="width: 180px; height: 50px;">
                            @elseif ($feedback->rating == '3')
                                <img class="p-2 mx-auto mb-3" src="homepage/img/3-star.png" style="width: 140px; height: 50px;">
                            @elseif ($feedback->rating == '2')
                                <img class="p-2 mx-auto mb-3" src="homepage/img/2-star.png" style="width: 90px; height: 50px;">
                            @elseif ($feedback->rating == '1')
                                <img class="p-2 mx-auto mb-3" src="homepage/img/1-star.png" style="width: 70px; height: 50px;">
                            @endif
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