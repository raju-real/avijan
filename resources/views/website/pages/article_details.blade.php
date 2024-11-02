@extends('website.layouts.app')
@section('title', $article->title ?? 'article Details')

@section('content')
<!-- About Section -->
<section id="about" class="about section margin-top-100">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $article->title }}</h2>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-3">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset($article->image) }}"
                    alt="" class="img-fluid">
            </div>

            <div class="col-lg-6 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="about-content ps-lg-3">
                    <p class="fst-italic">
                        {!! $article->description ?? '' !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section><!-- /About Section -->
   
@endsection
