<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>E-Commerce App- @yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('front/css/styles.css')}}" rel="stylesheet" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        
        {{-- Additional Head content --}}
        @yield('head')

    </head>
    <body>
        <!-- Navigation-->
        @include('front.parts.nav')

        <!-- Header-->
        @hasSection ('header')
            @yield('header')
        @endif

        <!-- Section-->
        @yield('content')
        

        <!-- Footer-->
        @include('front.parts.footer')


        {{-- Scripts --}}
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('front/js/scripts.js')}}"></script>

        @yield('scripts')
    </body>
</html>
