<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ $title ?? 'User Dashboard' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <!-- Styles -->
    <!-- Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/userstyles.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>
<body class="clearfix">
    <div class="bg-light">
        <!-- Navigation -->
        @include('layouts.navigation')
        <!-- Sidebar menu for Client Dashboard -->
        <div class="d-flex z-0 p-0 m-0" id="wrapper">

            <div class="cs-bg text-white border-top-0 d-none d-lg-block sticky-top" id="sidebar-wrapper" style="min-width: 240px; height: 100dvh">
                <div class="sidebar-heading text-center py-2 fs-5 fw-bold">
                    Menu
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="py-3 list-group-item list-group-item-action bg-light nav-line-hover button-3"><i class="bi bi-speedometer2"></i> Dashboard</a>
                    <a href="{{ route('profile.edit') }}" class="py-3 list-group-item list-group-item-action bg-light nav-line-hover button-3"><i class="bi bi-person"></i> Profile</a>
                    <a href="{{ route('projects.index') }}" class="py-3 list-group-item list-group-item-action bg-light nav-line-hover button-3"><i class="bi bi-file-earmark-richtext"></i> My
                        Projects</a>
                    <a href="{{ route('my-payments') }}" class="py-3 list-group-item list-group-item-action bg-light nav-line-hover button-3"><i class="bi bi-credit-card-2-back"></i> My
                        Payments</a>

                </div>
            </div>

            <!-- Menu Toggler -->
            <button class="button-3 rounded-0 text-white d-flex align-items-center d-none d-lg-block p-0 sticky-top pe-2" style="max-height: 48px; max-width: 18px" id="menu-toggle">
                <i class="bi bi-chevron-compact-left"></i>
            </button>

            <!-- side-bar menu for mobile -->
            <div class="fixed-top z-0">
                <div class="d-lg-none p-0 m-0 position-relative">
                    <div class="cs-bg border-0 d-lg-none position-absolute" id="sidebar-wrapper" style="max-width: 48px; height: 100dvh">
                        <div class="sidebar-heading text-center py-2 cs-font fs-5 fw-bold">
                            <img src="{{asset('img/clickspark-icon-white.png')}}" width="35px" />
                        </div>
                        <div class="list-group mt-2 list-group-flush">
                            <a href="{{ route('dashboard') }}" class="list-group-item button-3 list-group-item-action" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Dashboard"><i class="bi bi-speedometer2"></i></a>
                            <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action button-3" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Profile"><i class="bi bi-person"></i></a>
                            <a href="{{ route('projects.index') }}" class="list-group-item list-group-item-action button-3" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="My Projects"><i class="bi bi-file-earmark-richtext"></i></a>
                            <a href="{{ route('my-payments') }}" class="list-group-item list-group-item-action button-3" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="My Payments"><i class="bi bi-credit-card-2-back"></i></a>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->

            <div id="page-content-wrapper" class="container-fluid container-lg ps-5 ps-lg-0 ">
                <div class="container-fluid">
                    <!-- Page indicator -->
                    <header class="">
                        <div class="container-fluid py-2 px-md-3 px-1">
                            {{ $header }}
                        </div>
                    </header>

                    <!-- Alert Messages -->
                    <div class="col-11 mx-auto pb-2">{{ $alert ?? '' }}</div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Main Content -->
                    <main class="container-fluid px-md-3 px-1">{{ $slot }}</main>

                    <!-- Toast Notif-->

                </div>
            </div>
        </div>

        <button id="scrollUpButton" class="btn btn-lg py-2 z-2" style="display: none;">
            <i class="bi bi-chevron-double-up"></i>
        </button>






        <!-- Footer -->
        <footer id="footer" class="py-0 my-0">
            <div class="footer">
                <div class="container-fluid px-xxl-5 pt-0 mt-0">
                    <hr class="mt-2 border-white border-opacity-25" />
                    <div class="text-center pb-3" style="font-size: 0.6rem">
                        <p class="mb-0 text-white-50">
                            Copyright © 2024 ClickSpark. &nbsp&nbsp All
                            rights reserved to Jaybe &nbsp&nbsp|&nbsp&nbsp
                            <a class="tnc" href="#Terms&Condition" data-bs-toggle="modal" data-bs-target="#TnCModal">Terms and Condition</a>
                            &nbsp&nbsp|&nbsp&nbsp
                            <a class="tnc" href="#PrivacyPolicy" data-bs-toggle="modal" data-bs-target="#PpModal" l>Privacy Policy</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>

        {{-- Terms and Condition Modal --}}

        <div class="modal fade modal-lg" id="TnCModal" tabindex="-1" aria-labelledby="TnCmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="TnCmodalLabel">
                            ClickSpark Terms and Conditions
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <h4 class="h5 fw-bold">Introduction</h4>

                            <p>
                                Welcome to Clickspark! These Terms and
                                Conditions govern your use of our website
                                and services, and by accessing or using our
                                services, you agree to be bound by these
                                terms. If you do not agree with any part of
                                these terms, you may not use our services.
                            </p>
                            <br />
                            <h4 class="h5 fw-bold">Use of Service</h4>
                            <p>
                                You may use our services only as permitted
                                by law and according to these terms. Our
                                services may not be used for any illegal or
                                unauthorized purpose. You must not attempt
                                to disrupt or overload our system or
                                network.
                            </p>
                            <br />

                            <h4 class="h5 fw-bold">Accounts</h4>
                            <p>
                                When you create an account with us, you must
                                provide information that is accurate,
                                complete, and current at all times. Failure
                                to do so constitutes a breach of the terms,
                                which may result in immediate termination of
                                your account on our service.
                            </p>
                            <br />

                            <h4 class="h5 fw-bold">
                                Intellectual Property
                            </h4>
                            <p>
                                The service and its original content
                                (excluding Content provided by users),
                                features, and functionality are and will
                                remain the exclusive property of Clickspark
                                and its licensors. Our trademarks and trade
                                dress may not be used in connection with any
                                product or service without the prior written
                                consent of Clickspark.
                            </p>
                            <br />

                            <h4 class="h5 fw-bold">User Content</h4>
                            <p>
                                You are responsible for the content that you
                                post to the service, including its legality,
                                reliability, and appropriateness. By posting
                                content to the service, you grant us the
                                right and license to use, modify, publicly
                                perform, publicly display, reproduce, and
                                distribute such content on and through the
                                service.
                            </p>
                            <br />

                            <h4 class="h5 fw-bold">
                                Links To Other Web Sites
                            </h4>
                            <p>
                                Our Service may contain links to third-party
                                web sites or services that are not owned or
                                controlled by Clickspark.<br />

                                Clickspark has no control over, and assumes
                                no responsibility for, the content, privacy
                                policies, or practices of any third party
                                web sites or services. You further
                                acknowledge and agree that Clickspark shall
                                not be responsible or liable, directly or
                                indirectly, for any damage or loss caused or
                                alleged to be caused by or in connection
                                with use of or reliance on any such content,
                                goods or services available on or through
                                any such web sites or services.
                            </p>
                            <br />

                            <h4 class="h5 fw-bold">Termination</h4>
                            <p>
                                We may terminate or suspend your account
                                immediately, without prior notice or
                                liability, for any reason whatsoever,
                                including without limitation if you breach
                                the Terms.
                            </p>
                            <br />

                            <h4 class="h5 fw-bold">Changes</h4>
                            <p>
                                We reserve the right, at our sole
                                discretion, to modify or replace these Terms
                                at any time. We will try to provide at least
                                30 days notice prior to any new terms taking
                                effect. What constitutes a material change
                                will be determined at our sole discretion.
                            </p>
                            <br />

                            <h4 class="h5 fw-bold">Contact Us</h4>
                            <p>
                                If you have any questions about these Terms,
                                please
                                <a class="link-offset-2-hover link-primary" href="contact">contact us.</a>
                            </p>
                            <br />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Privacy Policy Modal --}}
        <div class="modal fade modal-lg" id="PpModal" tabindex="-1" aria-labelledby="PpModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="PpModalLabel">
                            Privacy Policy
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p class="small text-black-50">
                                Effective Date: February 5, 2024
                            </p>

                            <h4 class="h5 fw-bold">Introduction</h4>
                            <p>
                                Clickspark ("we", "us", or "our") is a small
                                graphic design and web development agency
                                committed to protecting the privacy of our
                                users. This Privacy Policy explains how we
                                collect, use, disclose, and protect your
                                personal information when you use our
                                website or mobile app ("Clickspark").
                            </p>
                            <br />

                            <h4 class="h5 fw-bold">
                                Information We Collect
                            </h4>
                            <p></p>
                            <h5>
                                We collect the following information from
                                you:
                            </h5>
                            <ul>
                                <li>
                                    Personal Information: This includes
                                    information that can be used to identify
                                    you, such as your name, email address,
                                    phone number, and physical address. We
                                    collect this information when you
                                    contact us, subscribe to our newsletter,
                                    or request a quote.
                                </li>
                                <li>
                                    Usage Data: This includes information
                                    about how you use Clickspark, such as
                                    the pages you visit, the features you
                                    use, and the time you spend on the app.
                                    We collect this information through
                                    analytics tools.
                                </li>
                                <li>
                                    Device Information: This includes
                                    information about the device you use to
                                    access Clickspark, such as the type of
                                    device, operating system, and browser.
                                    We collect this information for security
                                    purposes and to improve our app.
                                </li>
                            </ul>
                            <br />

                            <h4 class="h5 fw-bold">
                                How We Use Your Information
                            </h4>
                            <p></p>
                            <h5>We use your information to:</h5>
                            <ul>
                                <li>
                                    Provide and improve Clickspark,
                                    including to personalize your experience
                                    and provide relevant content.
                                </li>
                                <li>
                                    Communicate with you about our services,
                                    including sending you newsletters,
                                    promotional offers, and important
                                    updates.
                                </li>
                                <li>
                                    Respond to your inquiries and requests.
                                </li>
                                <li>
                                    Analyze how you use Clickspark to
                                    improve our services.
                                </li>
                                <li>
                                    Comply with legal and regulatory
                                    requirements.
                                </li>
                            </ul>
                            <br />

                            <h4 class="h5 fw-bold">
                                How We Share Your Information
                            </h4>
                            <p>
                                We may share your information with
                                third-party service providers who help us
                                operate Clickspark, such as hosting
                                providers, email marketing services, and
                                analytics providers. We will only share your
                                information with these providers if they
                                have agreed to protect your privacy and use
                                your information only for the purposes we
                                have authorized.<br />

                                We may also disclose your information if
                                required by law or to protect the rights and
                                safety of ourselves or others.
                            </p>
                            <br />

                            <h4 class="h5 fw-bold">Data Retention</h4>

                            <p>
                                We will retain your information for as long
                                as necessary to provide you with the
                                services you have requested, or until you
                                request us to delete it.
                            </p>
                            <br />

                            <h4 class="h5 fw-bold">Your Choices</h4>
                            <p></p>
                            <h5>
                                You have the following choices regarding
                                your information:
                            </h5>
                            <ul>
                                <li>
                                    You can unsubscribe from our newsletter
                                    by clicking the unsubscribe link in any
                                    email we send you.
                                </li>
                                <li>
                                    You can request that we delete your
                                    information by
                                    <a href="contact" class="link-offset-2-hover link-primary">contacting us</a>.
                                </li>
                            </ul>
                            <br />

                            <h4 class="h5 fw-bold">Security</h4>
                            <p>
                                We take reasonable measures to protect your
                                information from unauthorized access,
                                disclosure, alteration, or destruction.
                                However, no website or app is completely
                                secure, so please be aware of the inherent
                                risks of sharing information online.
                            </p>
                            <br />

                            <h4 class="h5 fw-bold">Children's Privacy</h4>
                            <p>
                                Clickspark is not intended for children
                                under the age of 13. We do not knowingly
                                collect personal information from children
                                under 13. If you are a parent or guardian
                                and you believe that your child has provided
                                us with personal information,
                                <a href="contact" class="link-offset-2-hover link-primary">please contact us</a>.
                            </p>
                            <br />

                            <h4 class="h5 fw-bold">
                                Changes to this Privacy Policy
                            </h4>
                            <p>
                                We may update this Privacy Policy from time
                                to time. We will notify you of any changes
                                by posting the new Privacy Policy on this
                                page.
                            </p>
                            <br />

                            <h4 class="h5 fw-bold">Contact Us</h4>
                            <p>
                                If you have any questions about this Privacy
                                Policy, please
                                <a href="contact" class="link-offset-2-hover link-primary">contact us</a>.
                            </p>
                            <br />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JQuery Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Additional Scripts -->
    {{ $script ?? ''}}

    <script src="{{ asset('assets/js/scroll-effects.js') }}"></script>

    <script src="{{ asset('assets/js/userfunctionalities.js') }}"></script>

    <!-- BS form validation -->
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
    <script src="{{ asset('assets/js/toast.js') }}"></script>

</body>
</html>
