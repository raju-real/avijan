@extends('website.layouts.app')
@section('title', 'About Us')

@section('content')
    <!-- About Section -->
    <section id="about" class="about section margin-top-100">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>About Us</h2>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset(siteSetting()['about_us_image'] ?? 'assets/common/images/about_us.jpg') }}"
                        alt="" class="img-fluid">
                </div>

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-content ps-0 ps-lg-3">
                        <h3>{{ siteSetting()['about_us_title'] ?? '' }}</h3>
                        <p class="fst-italic">
                            {!! siteSetting()['about_us'] ?? '' !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->

    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Mission & Vission</h2>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-12 justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-content ps-0 ps-lg-3">
                        <p class="fst-italic">
                            {!! siteSetting()['mission_vission'] ?? '' !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Privacy Policy</h2>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-12 justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-content ps-0 ps-lg-3">
                        <p class="fst-italic">
                            {!! siteSetting()['privacy_policy'] ?? '' !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
