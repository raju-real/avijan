@extends('website.layouts.app')
@section('title', 'Articles')

@section('content')
    @if (count(allArticles()))
        <!-- Services Section -->
        <section id="services" class="services section margin-top-100">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Articles</h2>
            </div><!-- End Section Title -->
            <div class="container">
                <div class="row g-5">
                    @foreach (allArticles() as $article)
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

   
@endsection
