@extends('website.layouts.app')
@section('title', 'Contact Us')

@section('content')

    <!-- Contact Section -->
    <section id="contact" class="contact section margin-top-100">

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
                <div class="col-md-12">
                    <iframe class="mb-4 mb-lg-0 mt-2" src="{{ siteSetting()['google_map_url'] }}" frameborder="0"
                style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                </div>

            </div>

        </div>

    </section><!-- /Contact Section -->
@endsection
