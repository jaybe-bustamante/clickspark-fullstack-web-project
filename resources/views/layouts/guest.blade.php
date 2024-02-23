<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'ClickSpark' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Styles -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/gueststyles.css') }}">


</head>
<body class="bg-white container-fluid p-0 m-0">
    <div class=" d-flex justify-content-center pt-2 pt-lg-4 mt-md-3">
        <a href="/" class=" text-center">
            <img src="{{ asset('img/clickspark-logo-icon.png') }}" alt="ClickSpark" class="guestlogo img-fluid" />
        </a>
    </div>

    <div class="py-2">
        {{ $slot }}
    </div>


    <!-- Bootstrap Scripts -->
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
