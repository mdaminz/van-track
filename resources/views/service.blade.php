@extends('dashboard-base')

@section('body-content')
   <!-- Testimonial Start -->
   <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="section-title text-center">
            <h1 class="display-5 mb-5">Testimonial</h1>
        </div>

        <div class="owl-carousel testimonial-carousel">
            @foreach ($feedbacks as $feedback)
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light p-2 mx-auto mb-3" src="homepage/img/no-profile-photo.jpg"
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
