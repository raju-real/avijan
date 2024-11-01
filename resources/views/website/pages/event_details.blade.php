@extends('website.layouts.app')
@section('title', $event->title ?? 'Event Details')

@section('content')
<!-- About Section -->
<section id="about" class="about section margin-top-100">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $event->title }}</h2>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-3">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset($event->thumbnail) }}"
                    alt="" class="img-fluid">
            </div>

            <div class="col-lg-6 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="about-content ps-lg-3">
                    <h6 class="py-2 text-bold text-green">
                        <i class="bi bi-geo-alt"></i>
                        {{ $event->location ?? '' }}
                    </h6>
                    <h6 class="py-2 text-bold text-green">
                        <i class="bi bi-calendar4-event"></i>
                        {{ date('d m, y', strtotime($event->from_date)) . ' to ' . date('d m, y', strtotime($event->to_date)) }}
                    </h6>

                    <h6 class="py-2 text-bold text-green">
                        <i class="bi bi-clock"></i>
                        {{ date('h:i', strtotime($event->from_time)) . ' to ' . date('h:i', strtotime($event->to_time)) }}
                    </h6>
                    <p class="fst-italic">
                        {!! $event->description ?? '' !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section><!-- /About Section -->
    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Gallery</h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach($event->event_photos as $photo)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset($photo->photo_path) }}" class="img-fluid"
                                    alt="" style="height: 250px;width: 100%;">
                                
                            <div class="portfolio-info">
                                <h4>{{ $photo->title ?? '' }}</h4>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->
                    @endforeach
                </div><!-- End Portfolio Container -->
            </div>
        </div>
    </section><!-- /Portfolio Section -->
@endsection
