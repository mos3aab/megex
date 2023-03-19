<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Use csrf token for security -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Megex</title>
    <!-- Use asset helper to load css files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my-slider.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>

<body>
    <!-- Navigation -->
    <ul class="nav nav-tabs" id="navId">
        <a class="navbar-brand" href="/">
            <img src="https://www.medexsepeti.ae/image/logos_ae/black-background1_.svg?v=3" alt=""
                width="100" height="50">
        </a>
        <form class="form-inline mt-2 mt-md-0 col-md-6 justify-content-center">
            <input class="form-control mr-sm-2 col-md-6" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"> Admin</span></a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/admin">Admin</a>
                <a class="dropdown-item" href="/products">Products</a>
                {{-- <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Exit</a> --}}
            </div>
        </li>
    </ul>

    <!-- Use yield directive to display page content -->
    @yield('content')

    <!-- Use asset helper to load js files -->
    <script src="{{ asset('js/ism-2.2.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
