<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ $title ?? 'Admin Dashboard' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <!-- Styles -->
    <!-- Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/adminstyles.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>
<body class="clearfix">
    <div class="bg-light">
        <!-- Navigation -->
        @include('layouts.admin-nav')
        <!-- Sidebar menu for Client Dashboard -->
        <div class="d-flex z-0 p-0 m-0" id="wrapper">

            <div class="cs-bg text-white border-top-0 d-none d-lg-block sticky-top" id="sidebar-wrapper" style="min-width: 240px; height: 100dvh">
                <div class="sidebar-heading text-center py-2 fs-5 fw-bold">
                    Menu
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('admin.dashboard') }}" class="py-3 list-group-item list-group-item-action bg-light nav-line-hover button-3 small"><i class="bi bi-speedometer2"></i> Dashboard</a>
                    <a href="{{ route('admin.projects.all') }}" class="py-3 list-group-item list-group-item-action bg-light nav-line-hover button-3 small"><i class="bi bi-card-checklist"></i> Project Management</a>
                    <a href="{{ route('admin.portfolio.index') }}" class="py-3 list-group-item list-group-item-action bg-light nav-line-hover button-3 small"><i class="bi bi-images"></i> Portfolio Management</a>
                    <a href="{{ route('admin.users.index') }}" class="py-3 list-group-item list-group-item-action bg-light nav-line-hover button-3 small"><i class="bi bi-people"></i> User Management</a>
                    <a href="{{ route('admin.payments.index') }}" class="py-3 list-group-item list-group-item-action bg-light nav-line-hover button-3 small"><i class="bi bi-currency-dollar"></i> Earnings</a>
                    <a href="{{ route('admin.emails.index') }}" class="py-3 list-group-item list-group-item-action bg-light nav-line-hover button-3 small"><i class="bi bi-envelope-at"></i> Mails</a>
                </div>
            </div>

            <!-- Menu Toggler -->
            <button class="button-3 rounded-0 text-white d-flex align-items-center d-none d-lg-block p-0 sticky-top pe-2" style="max-height: 48px; max-width: 18px" id="menu-toggle">
                <i class="bi bi-chevron-compact-left"></i>
            </button>

            <!-- side-bar menu for mobile -->
            <div class="fixed-top z-0 ">
                <div class="d-lg-none p-0 m-0 position-relative ">
                    <div class="cs-bg border-0 d-lg-none  position-absolute" id="sidebar-wrapper" style="max-width: 45px; height: 100dvh">
                        <div class="sidebar-heading text-center py-2 cs-font fs-5 fw-bold">
                            <img src="{{asset('img/clickspark-icon-white.png')}}" width="35px" />
                        </div>
                        <div class="list-group mt-2 list-group-flush">
                            <a href="{{ route('admin.dashboard') }}" class="list-group-item button-3 list-group-item-action" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Dashboard"><i class="bi bi-speedometer2"></i></a>

                            <a href="{{ route('admin.projects.all') }}" class="list-group-item list-group-item-action button-3" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Project Management"><i class="bi bi-card-checklist"></i></a>

                            <a href="{{ route('admin.portfolio.index') }}" class="list-group-item list-group-item-action button-3" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Portfolio Management"><i class="bi bi-images"></i></a>

                            <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action button-3" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="User Management"><i class="bi bi-people"></i></a>

                            <a href="{{ route('admin.payments.index') }}" class="list-group-item list-group-item-action button-3" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Earnings"><i class="bi bi-currency-dollar"></i></a>

                            <a href="{{ route('admin.emails.index') }}" class="list-group-item list-group-item-action button-3" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Mails"><i class="bi bi-envelope-at"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Content -->
            <div id="page-content-wrapper" class="container-fluid container-lg ps-5 ps-lg-0 ">
                <div class="container-fluid">
                    <!-- Page indicator -->
                    <header class="">
                        <div class="container-fluid px-md-3 p-2">
                            {{ $header }}
                        </div>
                    </header>

                    <!-- Alert Messages -->
                    <div class="col-11 mx-auto pb-2">{{ $alert ?? '' }}</div>

                    <!-- Main Content -->
                    <main class="container-fluid px-md-3 px-0 m-0">{{ $slot }}</main>

                    <!-- Toast Notif-->

                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer id="footer" class="py-0 my-0">
            <div class="footer">
                <div class="container-fluid px-xxl-5 pt-0 mt-0">
                    <hr class="mt-2 border-white border-opacity-25" />
                    <div class="text-end pb-3" style="font-size: 0.6rem">
                        <p class="mb-0 text-white-50">
                            Copyright © 2024 ClickSpark. &nbsp&nbsp|&nbsp&nbsp All
                            rights reserved to Jaybe

                        </p>
                    </div>
                </div>
            </div>
        </footer>


    </div>

    <!-- JQuery Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Additional Scripts -->
    {{ $script ?? ''}}

    <script src="{{ asset('assets/js/scroll-effects.js') }}"></script>

    <script src="{{ asset('assets/js/sidebar_tooltip.js') }}"></script>

    <script src="{{ asset('assets/js/toast.js') }}"></script>
</body>
</html>
