<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Avijan')</title>
    <meta name="base-url" base_url="{!! url('/') !!}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/common/images/logo.jpg') }}" rel="icon">
    <link href="{{ asset('assets/common/images/logo.jpg') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/user/css/main.css') }}" rel="stylesheet">

</head>

<body class="index-page">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v21.0&appId=449348979123201"></script>

    <header id="header"
        class="header d-flex align-items-center fixed-top {{ request()->segment(1) !== null || count(sliderImages()) == 0 ? 'bg-dark' : '' }}">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('assets/common/images/logo.jpg') }}" alt="">
                {{-- <h1 class="sitename">{{ siteSetting()['company_name'] ?? 'Avijan' }}</h1> --}}
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    @include('website.layouts.menus')
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <main class="main">

        @yield('content')

    </main>

    <footer id="footer" class="footer footer-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="d-flex align-items-center">
                        <span class="sitename">{{ siteSetting()['company_name'] ?? 'Avijan' }}</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>{{ siteSetting()['footer_text'] ?? '' }}</p>
                    </div>
                </div>

                <div class="col-lg-6 footer-links">
                    <div class="fb-page" data-href="{{ siteSetting()['facebook_url'] ?? '' }}" data-width="500" data-height="500"
                        data-hide-cover="false" data-show-facepile="false"></div>
                </div>

                <div class="col-lg-2 col-md-2">
                    <h4>Follow Us On</h4>
                    <div class="social-links d-flex">
                        <a target="_blank" href="{{ siteSetting()['linkedin_url'] ?? '#' }}"><i
                                class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong
                    class="px-1 sitename">{{ siteSetting()['company_name'] ?? '' }}</strong> <span>All Rights
                    Reserved</span></p>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/user/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/user/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/user/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/user/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/user/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/user/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/user/js/main.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '#send-contact-message', function(event) {
            event.preventDefault();

            const $sendButton = $('.send-contact-message');
            const $form = $('.php-email-form');
            const $loading = $('.loading');
            const $sentMessage = $('.sent-message');
            const $errorMessage = $('.error-message');

            $loading.removeClass('d-none');
            $sendButton.attr('disabled', true);

            $.ajax({
                url: "{{ route('send-contact-message') }}",
                method: 'POST',
                data: $form.serialize(),
                dataType: 'json',
                success: function(response) {
                    console.log("Response ", response);
                    $form.find('.form-control').removeClass('border-danger');
                    $('.contact-error-message').empty();

                    $loading.addClass('d-none');
                    if (response.status === 'success') {
                        $form[0].reset();
                        $errorMessage.addClass('d-none');
                        $sentMessage.removeClass('d-none').text(response.message);
                    } else {
                        $sentMessage.addClass('d-none');
                        $errorMessage.removeClass('d-none').text(response.message);
                    }

                    $sendButton.attr('disabled', false);
                },
                error: function(error) {
                    $sendButton.attr('disabled', false);
                    if (error.status === 422) {
                        $loading.addClass('d-none');
                        const errors = error.responseJSON.errors;

                        $('.contact-error-message').empty();
                        $.each(errors, function(field, messages) {
                            const $field = $(`.${field}_field`);
                            const $errorField = $(`.${field}_error`);

                            $field.addClass('border-danger');
                            $errorField.empty().text(messages[0]);
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>
