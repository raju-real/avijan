@extends('website.layouts.app')

@section('content')
<!-- Hero Section Start -->
<section class="hero-wrap style2">
    <div class="hero-slider-one owl-carousel" data-slider-id="1">
        <div class="hero-slide-item hero-slide-one bg-f">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-9">
                        <div class="hero-content" data-speed="0.10" data-revert="true">
                            <span>We'll Save Our Planet</span>
                            <h1>Lets Make Our Earth Green and Clean</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sollic itudin consectetur netus dui, ultrices or lectus ac egestas. Vivamus tellus vestibulum aliquet arcu.</p>
                            <a href="register.html" class="btn style2">Join With us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slide-item hero-slide-two bg-f">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-9">
                        <div class="hero-content" data-speed="0.10" data-revert="true">
                            <span>Save Our Soil</span>
                            <h1>Stop Using Plastic And Make Our land More Fertile</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sollicitudin consectetur netus dui, ultrices or lectus ac egestas. Vivamus tellus vestibulum aliquet arcu a duis. </p>
                            <a href="register.html" class="btn style2">Join With us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slide-item hero-slide-three bg-f">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6  col-md-10">
                        <div class="hero-content"  data-speed="0.10" data-revert="true">
                            <span>We'll Save Our Planet</span>
                            <h1>Lets Start Using Green Energy For A Better Planet</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sollicitudin consectetur netus dui, ultrices or lectus ac egestas. Vivamus tellus vestibulum aliquet arcu a duis. </p>
                            <a href="register.html" class="btn style2">Join With us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-slider-thumbs owl-thumbs" data-slider-id="1">
        <button class="owl-thumb-item">
            <img src="assets/img/hero/hero-thumb-1.jpg" alt="Images">
        </button>
        <button class="owl-thumb-item">
            <img src="assets/img/hero/hero-thumb-2.jpg" alt="Images">
        </button>
        <button class="owl-thumb-item">
            <img src="assets/img/hero/hero-thumb-3.jpg" alt="Images">
        </button>
    </div>
</section>
<!-- Hero Section End -->

 <!-- About Section Start -->
 <section class="about-wrap style2 ptb-100">
    <img src="assets/img/about/about-shape-1.png" alt="Image" class="about-shape-one moveHorizontal">
    <div class="container">
        <div class="row align-items-center gx-5">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                <div class="about-img-wrap">
                    <img src="assets/img/about/about-img-2.png" alt="Image" class="bounce">
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                <div class="about-content">
                    <div class="content-title style3">
                        <span>A Little Introduction <span class="bl-text">About Us</span></span>
                        <h2>Protect Our Earth Against Climate Change</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sollicitudin consectetur netus dui, ultrices or lectus ac egestas. Vivamus tellus vestibulum aliquet arcu a duis. Sollicitudin consectetur netus du ultric. </p>
                    </div>
                    <ul class="content-feature-list list-style">
                        <li><i class="ri-checkbox-circle-line"></i>Curabitur vitae ullamcorper libe roras id augue 
                        </li>
                        <li><i class="ri-checkbox-circle-line"></i>Felis cras luctus nisi in tincidunt blandit 
                        </li>
                        <li><i class="ri-checkbox-circle-line"></i>Sapien mi vestibulum est commodo lobortis metus 
                        </li>
                        <li><i class="ri-checkbox-circle-line"></i>Mauris vitae purus blandit fermentum </li>
                    </ul>
                    <a href="about.html" class="btn style2">Find Out More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Promo Video Section Start -->
<div class="promo-video style2 bg-f ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                <div class="content-title style4 text-center mb-40">
                    <span>Intro Video <span class="bl-text">Our Video</span></span>
                    <h2>Best Way To Make A Difference In The Lives Of Others</h2>
                </div>
                <a class="play-now" data-fancybox="" href="https://www.youtube.com/watch?v=UNSSuTSQI9I">
                    <i class="ri-play-fill"></i>
                    <span class="ripple"></span>
                </a>
            </div>
        </div>
    </div>
   
</div>
<!-- Promo Video Section End -->

<!-- Counter Section Start -->
<div class="counter-wrap style2 bg-lochi pt-100 pb-75">
    <img src="assets/img/bg-shape-2.png" alt="Image" class="counter-shape-one">
    <div class="container">
        <div class="counter-card-wrap style2">
            <div class="counter-card style1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                <div class="counter-icon">
                    <i class="flaticon-coin"></i>
                </div>
                <div class="counter-text">
                    <h2 class="counter-num">
                        <span class="odometer" data-count="8705"></span>
                    </h2>
                    <p>Donations</p>
                </div>
            </div>
            <div class="counter-card style2" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">
                <div class="counter-icon">
                    <i class="flaticon-campaign"></i>
                </div>
                <div class="counter-text">
                    <h2 class="counter-num">
                        <span class="odometer" data-count="9450"></span>
                    </h2>
                    <p>Fun Raised</p>
                </div>
            </div>
            <div class="counter-card style3" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                <div class="counter-icon">
                    <i class="flaticon-money-box"></i>
                </div>
                <div class="counter-text">
                    <h2 class="counter-num">
                        <span class="odometer" data-count="380"></span>
                    </h2>
                    <p>Campaigns</p>
                </div>
            </div>
            <div class="counter-card style4" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="500">
                <div class="counter-icon">
                    <i class="flaticon-volunteer"></i>
                </div>
                <div class="counter-text">
                    <h2 class="counter-num">
                        <span class="odometer" data-count="707"></span>
                    </h2>
                    <p>Volunteers</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter Section End -->

<!-- Event Section Start -->
<section class="event-wrap pt-100 pb-75">
    <img src="assets/img/shape-12.png" alt="Image" class="event-sape-two sm-none">
    <img src="assets/img/shape-5.png" alt="Image" class="event-sape-three">
    <div class="container">
        <div class="section-title style3 text-center mb-40">
            <span>Upcoming Events <span class="bl-text">Upcoming Events</span></span>
            <h2>Our Upcoming Events</h2>
        </div>
        <div class="row">
            <div class="col-xl-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                <div class="event-card style2">
                    <div class="event-img">
                        <img src="assets/img/event/event-10.jpg" alt="Image">
                        <span class="event-date">22 Mar, 2024</span>
                    </div>
                    <div class="event-info">
                        <h3><a href="event-details.html">Developing Low Carbon</a></h3>
                        <ul class="event-metainfo list-style">
                            <li><a href="event.html"><i class="ri-map-pin-line"></i>352 Waldeck Street, Abbott</a></li>
                            <li><a href="event.html"><i class="ri-time-line"></i>8:00 am - 5:00 pm</a></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet consec tetur adipiscing elit sollicitudin consec. </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">
                <div class="event-card style2">
                    <div class="event-img">
                        <img src="assets/img/event/event-11.jpg" alt="Image">
                        <span class="event-date">15 Mar, 2024</span>
                    </div>
                    <div class="event-info">
                        <h3><a href="event-details.html">Encourage For Green City</a></h3>
                        <ul class="event-metainfo list-style">
                            <li><a href="event.html"><i class="ri-map-pin-line"></i>16 Devils Hill Road, Jackson</a></li>
                            <li><a href="event.html"><i class="ri-time-line"></i>10:00 am - 3:00 pm</a></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet consec tetur adipiscing elit sollicitudin consec. </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                <div class="event-card style2">
                    <div class="event-img">
                        <img src="assets/img/event/event-12.jpg" alt="Image">
                        <span class="event-date">15 Aug, 2022</span>
                    </div>
                    <div class="event-info">
                        <h3><a href="event-details.html">Stop Deforestation</a></h3>
                        <ul class="event-metainfo list-style">
                            <li><a href="event.html"><i class="ri-map-pin-line"></i>19 Colonial Drive, Houston</a></li>
                            <li><a href="event.html"><i class="ri-time-line"></i>9:00 am - 2:00 pm</a></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet consec tetur adipiscing elit sollicitudin consec. </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="500">
                <div class="event-card style2">
                    <div class="event-img">
                        <img src="assets/img/event/event-13.jpg" alt="Image">
                        <span class="event-date">17 Jul, 2022</span>
                    </div>
                    <div class="event-info">
                        <h3><a href="event-details.html">Reduce CFC Gas</a></h3>
                        <ul class="event-metainfo list-style">
                            <li><a href="event.html"><i class="ri-map-pin-line"></i>Abbott, Gottlieb and Watsica</a></li>
                            <li><a href="event.html"><i class="ri-time-line"></i>8:00 am - 5:00 pm</a></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet consec tetur adipiscing elit sollicitudin consec. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Event Section End -->

<!-- Project Section Start -->
<section class="project-wrap ptb-100 bg-sand">
    <div class="container">
        <div class="section-title style3 text-center mb-40">
            <span>Donate Now <span class="bl-text">Donation</span></span>
            <h2>Our Latest Causes</h2>
        </div>
        <div class="project-slider-three owl-carousel">
            <div class="project-card style4" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                <div class="project-img">
                    <img src="assets/img/project/project-17.jpg" alt="Image">
                    <button class="like-btn" type="button"><i class="ri-heart-fill"></i></button>
                </div>
                <div class="project-info">
                    <h3><a href="project-details.html">Stop Cutting Down Trees
                    </a></h3>
                    <p>Lorem ipsum dolor sit amet cons ecte adipiscin elit.</p>
                    <div class="progressbar-wrap ">
                        <div class="progress-bar" data-percentage="32%">
                            <h4 class="progress-title-holder">
                                <span class="progress-number-wrapper">
                                    <span class="progress-number-mark">
                                        <span class="percent"></span>
                                    </span>
                                </span>
                            </h4>
                            <div class="progress-content-outter">
                                <div class="progress-content">
                                    <div class="amet"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="fund-collection list-style">
                        <li class="fund-raised">
                            $4800 Raised Of $19000
                        </li>
                        <li class="fund-goal">
                        32.00%
                        </li>
                    </ul>
                    <a href="donation.html" class="link style1">Donate Now<i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
            <div class="project-card style4" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                <div class="project-img">
                <img src="assets/img/project/project-18.jpg" alt="Image">
                    <button class="like-btn" type="button"><i class="ri-heart-fill"></i></button>
                </div>
                <div class="project-info">
                    <h3><a href="project-details.html">Be Efficient In Energy Use
                    </a></h3>
                    <p>Lorem ipsum dolor sit amet cons ecte adipiscin elit.</p>
                    <div class="progressbar-wrap ">
                        <div class="progress-bar" data-percentage="50%">
                            <h4 class="progress-title-holder">
                                <span class="progress-number-wrapper">
                                    <span class="progress-number-mark">
                                        <span class="percent"></span>
                                    </span>
                                </span>
                            </h4>
                            <div class="progress-content-outter">
                                <div class="progress-content">
                                    <div class="amet"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="fund-collection list-style">
                        <li class="fund-raised">
                            $4000 Raised Of $8000
                        </li>
                        <li class="fund-goal">
                        50.00%
                        </li>
                    </ul>
                    <a href="donation.html" class="link style1">Donate Now<i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
            <div class="project-card style4" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="300">
                <div class="project-img">
                <img src="assets/img/project/project-19.jpg" alt="Image">
                    <button class="like-btn" type="button"><i class="ri-heart-fill"></i></button>
                </div>
                <div class="project-info">
                    <h3><a href="project-details.html">Recycling Daily Waste
                    </a></h3>
                    <p>Lorem ipsum dolor sit amet cons ecte adipiscin elit.</p>
                    <div class="progressbar-wrap ">
                        <div class="progress-bar" data-percentage="70%">
                            <h4 class="progress-title-holder">
                                <span class="progress-number-wrapper">
                                    <span class="progress-number-mark">
                                        <span class="percent"></span>
                                    </span>
                                </span>
                            </h4>
                            <div class="progress-content-outter">
                                <div class="progress-content">
                                    <div class="amet"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="fund-collection list-style">
                        <li class="fund-raised">
                            $7000 Raised Of $10000
                        </li>
                        <li class="fund-goal">
                        70.00%
                        </li>
                    </ul>
                    <a href="donation.html" class="link style1">Donate Now<i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
            <div class="project-card style4" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400">
                <div class="project-img">
                <img src="assets/img/project/project-20.jpg" alt="Image">
                    <button class="like-btn" type="button"><i class="ri-heart-fill"></i></button>
                </div>
                <div class="project-info">
                    <h3><a href="project-details.html">Reduce Greenhouse Gas
                    </a></h3>
                    <p>Lorem ipsum dolor sit amet cons ecte adipiscin elit.</p>
                    <div class="progressbar-wrap ">
                        <div class="progress-bar" data-percentage="65%">
                            <h4 class="progress-title-holder">
                                <span class="progress-number-wrapper">
                                    <span class="progress-number-mark">
                                        <span class="percent"></span>
                                    </span>
                                </span>
                            </h4>
                            <div class="progress-content-outter">
                                <div class="progress-content">
                                    <div class="amet"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="fund-collection list-style">
                        <li class="fund-raised">
                            $6500 Raised Of $12000
                        </li>
                        <li class="fund-goal">
                        65.00%
                        </li>
                    </ul>
                    <a href="donation.html" class="link style1">Donate Now<i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
            <div class="project-card style4" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="500">
                <div class="project-img">
                <img src="assets/img/project/project-21.jpg" alt="Image">
                    <button class="like-btn" type="button"><i class="ri-heart-fill"></i></button>
                </div>
                <div class="project-info">
                    <h3><a href="project-details.html">Stop Using Plastic
                    </a></h3>
                    <p>Lorem ipsum dolor sit amet cons ecte adipiscin elit.</p>
                    <div class="progressbar-wrap ">
                        <div class="progress-bar" data-percentage="80%">
                            <h4 class="progress-title-holder">
                                <span class="progress-number-wrapper">
                                    <span class="progress-number-mark">
                                        <span class="percent"></span>
                                    </span>
                                </span>
                            </h4>
                            <div class="progress-content-outter">
                                <div class="progress-content">
                                    <div class="amet"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="fund-collection list-style">
                        <li class="fund-raised">
                            $8000 Raised Of $10000
                        </li>
                        <li class="fund-goal">
                        80.00%
                        </li>
                    </ul>
                    <a href="donation.html" class="link style1">Donate Now<i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
            <div class="project-card style4" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="600">
                <div class="project-img">
                <img src="assets/img/project/project-22.jpg" alt="Image">
                    <button class="like-btn" type="button"><i class="ri-heart-fill"></i></button>
                </div>
                <div class="project-info">
                    <h3><a href="project-details.html">Reduce Air Pollution
                    </a></h3>
                    <p>Lorem ipsum dolor sit amet cons ecte adipiscin elit.</p>
                    <div class="progressbar-wrap ">
                        <div class="progress-bar" data-percentage="45%">
                            <h4 class="progress-title-holder">
                                <span class="progress-number-wrapper">
                                    <span class="progress-number-mark">
                                        <span class="percent"></span>
                                    </span>
                                </span>
                            </h4>
                            <div class="progress-content-outter">
                                <div class="progress-content">
                                    <div class="amet"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="fund-collection list-style">
                        <li class="fund-raised">
                            $4500 Raised Of $9000
                        </li>
                        <li class="fund-goal">
                        45.00%
                        </li>
                    </ul>
                    <a href="donation.html" class="link style1">Donate Now<i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Project Section End -->

<!-- Team Section Start -->
<section class="team-wrap ptb-100 bg-sand">
    <div class="container">
        <div class="section-title style1 text-center mb-40">
            <span>Our Volunteer <img src="assets/img/section-shape.png" alt="Image"></span>
            <h2>Our Experts Volunteer</h2>
        </div>
        <div class="team-slider-one owl-carousel">
            <div class="team-card style1" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                <img src="assets/img/team/team-1.jpg" alt="Image">
                <div class="team-info">
                    <img src="assets/img/team/team-shape-2.png" alt="IMage" class="team-shape">
                    <h3><a href="team-details.html">Kevin Thompson</a></h3>
                    <span>Founder &amp; CEO</span>
                    <ul class="social-profile style1 list-style">
                        <li>
                            <a href="https://facebook.com/">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/">
                                <i class="ri-twitter-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com/">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://linkedin.com/">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="team-card style1" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                <img src="assets/img/team/team-2.jpg" alt="Image">
                <div class="team-info">
                    <img src="assets/img/team/team-shape-2.png" alt="IMage" class="team-shape">
                    <h3><a href="team-details.html">Isabella Woods</a></h3>
                    <span>Cheif Marketing Officer</span>
                    <ul class="social-profile style1 list-style">
                        <li>
                            <a href="https://facebook.com/">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/">
                                <i class="ri-twitter-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com/">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://linkedin.com/">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="team-card style1" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="300">
                <img src="assets/img/team/team-3.jpg" alt="Image">
                <div class="team-info">
                    <img src="assets/img/team/team-shape-2.png" alt="IMage" class="team-shape">
                    <h3><a href="team-details.html">Liam Stokes</a></h3>
                    <span>Senior Executive</span>
                    <ul class="social-profile style1 list-style">
                        <li>
                            <a href="https://facebook.com/">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/">
                                <i class="ri-twitter-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com/">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://linkedin.com/">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="team-card style1" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400">
                <img src="assets/img/team/team-4.jpg" alt="Image">
                <div class="team-info">
                    <img src="assets/img/team/team-shape-2.png" alt="IMage" class="team-shape">
                    <h3><a href="team-details.html">Lucy Floyd</a></h3>
                    <span>Accounts Manager</span>
                    <ul class="social-profile style1 list-style">
                        <li>
                            <a href="https://facebook.com/">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/">
                                <i class="ri-twitter-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com/">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://linkedin.com/">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="team-card style1" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="500">
                <img src="assets/img/team/team-5.jpg" alt="Image">
                <div class="team-info">
                    <img src="assets/img/team/team-shape-2.png" alt="IMage" class="team-shape">
                    <h3><a href="team-details.html">Hannah Adison</a></h3>
                    <span>Marketing Manager</span>
                    <ul class="social-profile style1 list-style">
                        <li>
                            <a href="https://facebook.com/">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/">
                                <i class="ri-twitter-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com/">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://linkedin.com/">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="team-card style1" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="600">
                <img src="assets/img/team/team-6.jpg" alt="Image">
                <div class="team-info">
                    <img src="assets/img/team/team-shape-2.png" alt="IMage" class="team-shape">
                    <h3><a href="team-details.html">Jaylen Mills </a></h3>
                    <span>Senior Executive</span>
                    <ul class="social-profile style1 list-style">
                        <li>
                            <a href="https://facebook.com/">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/">
                                <i class="ri-twitter-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com/">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://linkedin.com/">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Team Section End -->

<!-- Blog Section Start -->
<section class="blog-wrap ptb-100 bg-sand">
    <div class="container">
        <img src="assets/img/shape-7.png" alt="Image" class="blog-section-shape">
        <div class="section-title style3 mb-40 text-center">
            <span>Our Latest News <span class="bl-text">Our Blog</span></span>
            <h2>Our Latest News &amp; Articles</h2>
        </div>
        <div class="blog-slider-one owl-carousel">
            <div class="blog-card style2" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                <div class="blog-img">
                    <img src="assets/img/blog/blog-4.jpg" alt="">
                </div>
                <div class="blog-info">
                    <div class="blog-author">
                        <div class="blog-author-img">
                            <img src="assets/img/blog/author-1.jpg" alt="Image">
                        </div>
                        <div class="blog-author-info">
                            <span>Posted By</span>
                            <h6><a href="posts-by-author.html">David Warner</a></h6>
                        </div>
                    </div>
                    <h3><a href="blog-details-right-sidebar.html">Changes In Landscapes And Wildlife Community</a></h3>
                    <ul class="blog-metainfo list-style">
                        <li><a href="posts-by-date.html"><i class="ri-calendar-todo-line"></i>Mar 22, 2024</a></li>
                    </ul>
                </div>
                <a href="blog-details-right-sidebar.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
            </div>
            <div class="blog-card style2" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">
                <div class="blog-img">
                    <img src="assets/img/blog/blog-3.jpg" alt="">
                </div>
                <div class="blog-info">
                    <div class="blog-author">
                        <div class="blog-author-img">
                            <img src="assets/img/blog/author-7.jpg" alt="Image">
                        </div>
                        <div class="blog-author-info">
                            <span>Posted By</span>
                            <h6><a href="posts-by-author.html">Morgan Stanly</a></h6>
                        </div>
                    </div>
                    <h3><a href="blog-details-right-sidebar.html">Let’s Take Care of Nature for The Sake of The Earth</a></h3>
                    <ul class="blog-metainfo list-style">
                        <li><a href="posts-by-date.html"><i class="ri-calendar-todo-line"></i>Mar 17, 2024</a></li>
                    </ul>
                </div>
                <a href="blog-details-right-sidebar.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
            </div>
            <div class="blog-card style2" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                <div class="blog-img">
                    <img src="assets/img/blog/blog-2.jpg" alt="">
                </div>
                <div class="blog-info">
                    <div class="blog-author">
                        <div class="blog-author-img">
                            <img src="assets/img/blog/author-3.jpg" alt="Image">
                        </div>
                        <div class="blog-author-info">
                            <span>Posted By</span>
                            <h6><a href="posts-by-author.html">Michel Hudson</a></h6>
                        </div>
                    </div>
                    <h3><a href="blog-details-right-sidebar.html">Increasing Risk Of Storms, Droughts and Floods</a></h3>
                    <ul class="blog-metainfo list-style">
                        <li><a href="posts-by-date.html"><i class="ri-calendar-todo-line"></i>Mar 13, 2024</a></li>
                    </ul>
                </div>
                <a href="blog-details-right-sidebar.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
            </div>
            <div class="blog-card style2" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="500">
                <div class="blog-img">
                    <img src="assets/img/blog/blog-1.jpg" alt="">
                </div>
                <div class="blog-info">
                    <div class="blog-author">
                        <div class="blog-author-img">
                            <img src="assets/img/blog/author-4.jpg" alt="Image">
                        </div>
                        <div class="blog-author-info">
                            <span>Posted By</span>
                            <h6><a href="posts-by-author.html">Lisa Margaret</a></h6>
                        </div>
                    </div>
                    <h3><a href="blog-details-right-sidebar.html">Seven Things Nobody Told You About Water Pollution</a></h3>
                    <ul class="blog-metainfo list-style">
                        <li><a href="posts-by-date.html"><i class="ri-calendar-todo-line"></i>Mar 12, 2024</a></li>
                    </ul>
                </div>
                <a href="blog-details-right-sidebar.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection