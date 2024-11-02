@extends('website.layouts.app')
@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    @if(count(sliderImages()))
    <section id="hero" class="hero section dark-background">
        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            @foreach (sliderImages() as $slider)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset($slider->photo_path) }}" alt="">
                    <div class="carousel-container">
                        <h3>{{ $slider->title ?? '' }}</h3>
                        @if($slider->type == 'event')
                        <a href="{{ route('event-details',$slider->slug) }}" class="btn-get-started">Show Details</a>
                        @endif
                    </div>
                </div><!-- End Carousel Item -->
            @endforeach
            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>
            <ol class="carousel-indicators"></ol>
        </div>
    </section><!-- /Hero Section -->
    @endif

    <!-- About Section -->
    <section id="about" class="about section {{ count(sliderImages()) == 0 ? 'margin-top-100' : '' }}">

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
                            {!! strLimit(siteSetting()['about_us'] ?? '', 700) !!}
                        </p>
                        <a href="{{ route('about-us') }}" class="btn btn-sm btn-info">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->

    @if (count(upcommingEvents()))
        <!-- Services Section -->
        <section id="services" class="services section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Our Upcomming Events</h2>
            </div><!-- End Section Title -->
            <div class="container">
                <div class="row g-5">
                    @foreach (upcommingEvents() as $event)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item item-cyan position-relative">
                                <img src="{{ asset($event->thumbnail) }}" alt="" class="img-responsive border-r-10"
                                    height="200" width="200">
                                <div class="ps-3">
                                    <h3>{{ $event->title ?? '' }}</h3>
                                    <p>{!! strLimit($event->description, 150) !!}</p>

                                    <h6 class="py-2 text-bold text-green">
                                        <i class="bi bi-calendar4-event"></i>
                                        {{ date('d m, y', strtotime($event->from_date)) . ' to ' . date('d m, y', strtotime($event->to_date)) }}
                                    </h6>

                                    <h6 class="py-2 text-bold text-green">
                                        <i class="bi bi-clock"></i>
                                        {{ date('h:i', strtotime($event->from_time)) . ' to ' . date('h:i', strtotime($event->to_time)) }}
                                    </h6>
                                    <a href="{{ route('event-details', $event->slug) }}"
                                        class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach
                </div>
            </div>
        </section><!-- /Services Section -->
    @endif

    @if (count(completeEvents()))
    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Event We Have Done</h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                @if (count(eventCategories()))
                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach (eventCategories() as $category)
                            <li data-filter=".filter-{{ $category->id }}">{{ $category->name ?? '' }}</li>
                        @endforeach
                    </ul><!-- End Portfolio Filters -->
                @endif
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach(completeEvents() as $event)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $event->category_id }}">
                        <div class="portfolio-content h-100">
                            <a href="{{ route('event-details',$event->slug) }}">
                                <img src="{{ asset($event->thumbnail) }}" class="img-fluid"
                                    alt="" style="height: 250px;width: 100%;"></a>
                            <div class="portfolio-info">
                                <h4><a href="{{ route('event-details',$event->slug) }}" title="{{ $event->title ?? '' }}">{{ $event->title ?? '' }}</a></h4>
                                <p>{!! strLimit($event->description,100) !!}
                                    
                                </p>
                               
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->
                    @endforeach
                </div><!-- End Portfolio Container -->
            </div>
        </div>
    </section><!-- /Portfolio Section -->
    @endif

    @if(count(allFaqs()))
    <!-- Faq Section -->
    <section id="faq" class="faq section light-background">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="content px-xl-5">
                        <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
                    </div>
                </div>

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                    <div class="faq-container">
                        @foreach(allFaqs() as $faq)
                        <div class="faq-item {{ $loop->first ? 'faq-active' : '' }}">
                            <h3><span class="num">{{ $loop->index + 1 }}.</span> <span>{{ $faq->question ?? '' }}</span>
                            </h3>
                            <div class="faq-content">
                                <p>{{ $faq->answer ?? '' }}</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Faq Section -->
    @endif

    @if (count(webArticles()))
        <!-- Services Section -->
        <section id="services" class="services section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Articles</h2>
            </div><!-- End Section Title -->
            <div class="container">
                <div class="row g-5">
                    @foreach (webArticles() as $article)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item item-cyan position-relative">
                                <img src="{{ asset($article->image) }}" alt="" class="img-responsive border-r-10"
                                    height="200" width="200">
                                <div class="ps-3">
                                    <h3>{{ $article->title ?? '' }}</h3>
                                    <p>{!! strLimit($article->description, 150) !!}</p>
                                    <a href="{{ route('article-details', $article->slug) }}"
                                        class="read-more stretched-link">Read More <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach
                </div>
            </div>
        </section><!-- /Services Section -->
    @endif

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="200">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Address</h3>
                                <p>{{ siteSetting()['address'] ?? '' }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="300">
                                <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <p>{{ siteSetting()['mobile'] ?? '' }}</p>
                                <p>{{ siteSetting()['phone'] ?? '' }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="400">
                                <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>{{ siteSetting()['email'] ?? '' }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            
                        </div><!-- End Info Item -->

                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="col-12 text-center">
                        <div class="loading d-none">Please wait...</div>
                            <div class="alert alert-danger error-message d-none"></div>
                            <div class="alert alert-success sent-message d-none"></div>

                    </div>
                    <form action="{{ route('send-contact-message') }}" method="post" class="php-email-form" >
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control name_field" id="name"
                                        placeholder="Your Name">
                                    <span class="text-danger contact-error-message name_error"></span>
                            </div>

                            <div class="col-md-6 ">
                                <input type="text" class="form-control email_field" name="email" id="email"
                                        placeholder="Your Email">
                                    <span class="text-danger contact-error-message email_error"></span>
                            </div>

                            <div class="col-12">
                                <input type="text" class="form-control mobile_field" name="mobile" id="mobile"
                                        placeholder="Mobile">
                                    <span class="text-danger contact-error-message mobile_error"></span>
                            </div>

                            <div class="col-12">
                                <textarea class="form-control message_field" name="message" rows="5" placeholder="Message"></textarea>
                                <span class="text-danger contact-error-message message_error"></span>
                            </div>

                            <div class="col-12 text-center">
                                    <button class="btn btn-primary send-contact-message" type="button"
                                    id="send-contact-message">Send Message</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->
@endsection
