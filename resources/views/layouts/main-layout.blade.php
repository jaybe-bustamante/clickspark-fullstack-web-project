<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>{{ $title ?? 'ClickSpark' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Styles -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="clearfix">

    <div id="main">
        <nav class="navbar px-0 mx-0 navbar-expand-lg sticky-top z-3" style="height: 80px">
            <div class="container-fluid mx-xxl-5">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/img/clickspark logo-main-01.svg" class="" alt="Logo" style="height: 38px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarSupportedContent">
                    <div class="offcanvas-header pb-1">
                        <a class="navbar-brand  offcanvas-logo" href="{{ url('/') }}">
                            <img src="/img/clickspark logo-main-01.svg" class="img-fluid" alt="Logo" style="height: 35px">
                        </a>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body nav-font">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto align-items-center">
                            <li class="nav-item nav-line-hover">
                                <a class="nav-link" href="{{ url('/services') }}">{{ __('Services') }}</a>
                            </li>
                            <li class="nav-item nav-line-hover">
                                <a class="nav-link " href="{{ url('/portfolio') }}">{{ __('Portfolio') }}</a>
                            </li>
                            <li class="nav-item nav-line-hover">
                                <a class="nav-link" href="{{ url('/pricing') }}">{{ __('Pricing') }}</a>
                            </li>
                            <li class="nav-item nav-line-hover">
                                <a class="nav-link" href="{{ url('/about') }}">{{ __('About') }}</a>
                            </li>
                            <li class="nav-item nav-line-hover">
                                <a class="nav-link" href="{{ url('/faq') }}">{{ __('FAQ') }}</a>
                            </li>
                            <li class="nav-item nav-line-hover">
                                <a class="nav-link" href="{{ url('contact') }}">{{ __('Contact Us') }}</a>
                            </li>

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto align-items-center">
                            <!-- Authentication Links -->
                            @guest
                            @if (Route::has('login'))
                            <li class="nav-item nav-line-hover">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @endif

                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                    <button type="button" class="cta-button btn btn-sm">Get Started
                                    </button>

                                </a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item nav-line-hover">
                                <a id="navbarDropdown" class="nav-link fw-bold" href="{{ url('/dashboard') }}">
                                    {{ __('Dashboard') }}
                                </a>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div>
            <!-- Alert Messages -->
            <div class="col-11 mx-auto pt-3">{{ $alert ?? '' }}</div>

            @if(session('newsletter_success'))
            <div class=" px-md-5 px-2">
                <div class="alert alert-success pt-3">
                    {{ session('newsletter_success') }}
                </div>
                @endif
            </div>
            <div class="px-md-5 px-2">
                @if (isset($errors) && $errors->any())
                <div class="alert alert-danger pt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>


            <main class="py-3">
                {{ $slot }}
            </main>


        </div>
        <!-- Scroll Up Button -->
        <button id="scrollUpButton" class="btn btn-lg py-2 z-2" style="display: none;">
            <i class="bi bi-chevron-double-up"></i>
        </button>

        <!-- Footer -->
        <footer id="footer" class=" py-0 my-0">
            <div>
                <img src="{{ asset('/img/footer-01.svg') }}" class="img-fluid pe-none" alt="Footer Image" style="width: 100dvw">
            </div>
            <div class="footer">
                <div class=" container-fluid px-xxl-5 pt-0 mt-0 ">
                    <div class="row row-cols-lg-auto pt-0 mt-0 d-flex justify-content-center justify-content-lg-evenly">

                        <div class="col-lg-3 d-block text-lg-start text-center justify-content-center">
                            <a href="{{ url('/') }}" class="footer-logo">
                                <img src="/img/clickspark-logo-white.png" class="img-fluid" alt="Logo" style="height: 35px">
                            </a>
                            <p class="mt-2 mb-0 px-lg-0 px-5 text-white" style="font-size: 0.85rem">ClickSpark is a graphic design and web development agency that creates custom designs and web applications for your business.</p>
                            <div class="d-flex fs-3 gap-4 soc-icons justify-content-lg-start justify-content-center ">
                                <div class="">
                                    <a href="https://www.facebook.com/weareclickspark" class="text-white ">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                </div>
                                <div class="">
                                    <a href="https://twitter.com/home" class="text-white">
                                        <i class="bi bi-twitter-x"></i>
                                    </a>
                                </div>
                                <div class="">
                                    <a href="https://www.linkedin.com/" class="text-white">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                </div>
                                <div class="">
                                    <a href="https://www.instagram.com/" class="text-white">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 mt-3 mb-0 text-lg-start text-center">
                            <div class="row justify-content-center">
                                <h5 class="fw-bold text-xl-start text-center text-white ">Resource</h5>
                                <div class="col-4 col-sm-3 col-lg-6">

                                    <ul class="list-unstyled ">
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        <li><a href="{{ url('/services') }}s">Services</a></li>
                                        <li><a href="{{ url('/portfolio') }}">Portfolio</a></li>
                                        <li><a href="{{ url('/pricing') }}">Pricing</a></li>
                                    </ul>
                                </div>
                                <div class="col-4 col-sm-3 col-lg-6">
                                    <ul class="list-unstyled">
                                        <li><a href="{{ url('/about') }}">About</a></li>
                                        <li><a href="{{ url('/faq') }}">FAQ</a></li>
                                        <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                                        <li><a href="{{ url('/contact') }}">Talk to Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-3 px-lg-0 px-sm-5 px-lg-0 text-lg-start text-center ">
                            <h5 class="fw-bold text-white">Join our Newsletter</h5>
                            <p class="mt-2 text-white">Let’s stay connected! Received offers and updates straight to your inbox.</p>
                            <form action="{{ route('newsletter.subscribe') }}" method="POST">
                                @csrf
                                <div class="input-group mb-3 px-sm-5 px-lg-0">
                                    <input type="text" class="form-control" placeholder="Enter your email" aria-label="Recipient's username" aria-describedby="button-addon2" id="newsletterEmail" name="email">
                                    <button class="btn subbtn" type="submit" id="button-addon2">Subscribe</button>
                                </div>
                            </form>


                        </div>
                    </div>
                    <hr class=" mt-4 border-white border-opacity-25">
                    <div class="text-center  pb-3" style="font-size: 0.7rem">
                        <p class="mb-0 text-white-50">Copyright © 2024 ClickSpark. &nbsp&nbsp All rights reserved to Jaybe &nbsp&nbsp|&nbsp&nbsp <a class="tnc" href="#Terms&Condition" data-bs-toggle="modal" data-bs-target="#TnCModal">Terms and Condition</a> &nbsp&nbsp|&nbsp&nbsp <a class="tnc" href="#PrivacyPolicy" data-bs-toggle="modal" data-bs-target="#PpModal" l>Privacy Policy</a></p>
                    </div>
                </div>
        </footer>

        {{-- Terms and Condition Modal --}}

        <div class="modal fade modal-lg" id="TnCModal" tabindex="-1" aria-labelledby="TnCmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="TnCmodalLabel">ClickSpark Terms and Conditions</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <h4 class="h5 fw-bold">Introduction</h4>

                            <p>
                                Welcome to Clickspark! These Terms and Conditions govern your use of our website and services, and by accessing or using our services, you agree to be bound by these terms. If you do not agree with any part of these terms, you may not use our services.
                            </p><br>
                            <h4 class="h5 fw-bold">Use of Service</h4>
                            <p>
                                You may use our services only as permitted by law and according to these terms. Our services may not be used for any illegal or unauthorized purpose. You must not attempt to disrupt or overload our system or network.</p><br>

                            <h4 class="h5 fw-bold">Accounts</h4>
                            <p>
                                When you create an account with us, you must provide information that is accurate, complete, and current at all times. Failure to do so constitutes a breach of the terms, which may result in immediate termination of your account on our service.</p><br>

                            <h4 class="h5 fw-bold">Intellectual Property</h4>
                            <p>
                                The service and its original content (excluding Content provided by users), features, and functionality are and will remain the exclusive property of Clickspark and its licensors. Our trademarks and trade dress may not be used in connection with any product or service without the prior written consent of Clickspark.</p><br>

                            <h4 class="h5 fw-bold">User Content</h4>
                            <p>
                                You are responsible for the content that you post to the service, including its legality, reliability, and appropriateness. By posting content to the service, you grant us the right and license to use, modify, publicly perform, publicly display, reproduce, and distribute such content on and through the service.</p><br>

                            <h4 class="h5 fw-bold">Links To Other Web Sites</h4>
                            <p>
                                Our Service may contain links to third-party web sites or services that are not owned or controlled by Clickspark.<br>

                                Clickspark has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that Clickspark shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p><br>

                            <h4 class="h5 fw-bold">Termination</h4>
                            <p>
                                We may terminate or suspend your account immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p><br>

                            <h4 class="h5 fw-bold">Changes</h4>
                            <p>
                                We reserve the right, at our sole discretion, to modify or replace these Terms at any time. We will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p><br>

                            <h4 class="h5 fw-bold">Contact Us</h4>
                            <p>
                                If you have any questions about these Terms, please <a class="link-offset-2-hover link-primary" href="contact">contact us.</a></p><br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

        {{-- Privacy Policy Modal --}}
        <div class="modal fade modal-lg" id="PpModal" tabindex="-1" aria-labelledby="PpModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="PpModalLabel">Privacy Policy</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>

                            <p class="small text-black-50 ">Effective Date: February 5, 2024</p>

                            <h4 class="h5 fw-bold">Introduction</h4>
                            <p>
                                Clickspark ("we", "us", or "our") is a small graphic design and web development agency committed to protecting the privacy of our users. This Privacy Policy explains how we collect, use, disclose, and protect your personal information when you use our website or mobile app ("Clickspark").</p><br>

                            <h4 class="h5 fw-bold">Information We Collect</h4>
                            <p>
                                <h5>We collect the following information from you:</h5>
                                <ul>
                                    <li>Personal Information: This includes information that can be used to identify you, such as your name, email address, phone number, and physical address. We collect this information when you contact us, subscribe to our newsletter, or request a quote.</li>
                                    <li>Usage Data: This includes information about how you use Clickspark, such as the pages you visit, the features you use, and the time you spend on the app. We collect this information through analytics tools.</li>
                                    <li>Device Information: This includes information about the device you use to access Clickspark, such as the type of device, operating system, and browser. We collect this information for security purposes and to improve our app.
                                    </li>
                                </ul>
                            </p><br>

                            <h4 class="h5 fw-bold">How We Use Your Information</h4>
                            <p>
                                <h5>We use your information to:</h5>
                                <ul>
                                    <li>Provide and improve Clickspark, including to personalize your experience and provide relevant content.</li>
                                    <li>Communicate with you about our services, including sending you newsletters, promotional offers, and important updates.</li>
                                    <li>Respond to your inquiries and requests.</li>
                                    <li>Analyze how you use Clickspark to improve our services.</li>
                                    <li>Comply with legal and regulatory requirements.</li>
                                </ul>
                            </p><br>

                            <h4 class="h5 fw-bold">How We Share Your Information</h4>
                            <p>
                                We may share your information with third-party service providers who help us operate Clickspark, such as hosting providers, email marketing services, and analytics providers. We will only share your information with these providers if they have agreed to protect your privacy and use your information only for the purposes we have authorized.<br>

                                We may also disclose your information if required by law or to protect the rights and safety of ourselves or others.</p><br>

                            <h4 class="h5 fw-bold">Data Retention</h4>

                            <p>
                                We will retain your information for as long as necessary to provide you with the services you have requested, or until you request us to delete it.</p><br>

                            <h4 class="h5 fw-bold">Your Choices</h4>
                            <p>
                                <h5>You have the following choices regarding your information:</h5>
                                <ul>
                                    <li>You can unsubscribe from our newsletter by clicking the unsubscribe link in any email we send you.</li>
                                    <li>You can request that we delete your information by <a href="contact" class="link-offset-2-hover link-primary">contacting us</a>.
                                    </li>
                                </ul>
                            </p><br>

                            <h4 class="h5 fw-bold">Security</h4>
                            <p>
                                We take reasonable measures to protect your information from unauthorized access, disclosure, alteration, or destruction. However, no website or app is completely secure, so please be aware of the inherent risks of sharing information online.</p><br>

                            <h4 class="h5 fw-bold">Children's Privacy</h4>
                            <p>
                                Clickspark is not intended for children under the age of 13. We do not knowingly collect personal information from children under 13. If you are a parent or guardian and you believe that your child has provided us with personal information, <a href="contact" class="link-offset-2-hover link-primary">please contact us</a>.
                            </p><br>

                            <h4 class="h5 fw-bold">Changes to this Privacy Policy</h4>
                            <p>
                                We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.
                            </p><br>

                            <h4 class="h5 fw-bold">Contact Us</h4>
                            <p>
                                If you have any questions about this Privacy Policy, please <a href="contact" class="link-offset-2-hover link-primary">contact us</a>.</p><br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('assets/js/brevo.js') }}"></script>

    <!-- JQuery Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    {{-- Owl Carousel --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/owl-carousel.js"></script>

    <!-- Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assets/js/scroll-effects.js') }}"></script>
    {{ $scripts ?? ''}}
</body>
</html>
