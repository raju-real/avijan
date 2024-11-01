@extends('website.layouts.app')
@section('title', 'Events')

@section('content')
    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section margin-top-100">

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
                                <p>{!! strLimit($event->description,100) !!}</p>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->
                    @endforeach
                </div><!-- End Portfolio Container -->
            </div>
        </div>
    </section><!-- /Portfolio Section -->
@endsection
