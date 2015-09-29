<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>@section('title') {{{trans('site/site.site_title')}}} @show</title>
    @section('meta_keywords')
    @show @section('meta_author')
    @show @section('meta_description')
        @show
                <!-- Mobile Specific Metas
		================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS
                ================================================== -->
        <link rel="stylesheet"
              href="{{asset('assets/site/css/bootstrap.min.css')}}">
        <link rel="stylesheet"
              href="{{asset('assets/site/css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet"
              href="{{asset('assets/site/css/half-slider.css')}}">
        <link rel="stylesheet"
              href="{{asset('assets/site/css/justifiedGallery.min.css')}}"/>
        <link rel="stylesheet"
              href="{{asset('assets/site/css/lightbox.min.css')}}"/>
                <style>
            body {
                padding: 30px 0;
            }

            @section('styles')


            @show
        </style>
        <!-- Javascripts
                ================================================== -->
        <script src="{{asset('assets/site/js/jquery-1.11.1.min.js')}}"></script>
        <script src="{{asset('assets/site/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/site/js/jquery.justifiedGallery.min.js')}}"></script>
        <script src="{{asset('assets/site/js/lightbox.min.js')}}"></script>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <link rel="shortcut icon"
              href="{{{ asset('assets/site/ico/favicon.ico') }}}">
</head>

<body>    
<div id="wrap">
        @include('partials.nav')
    <div class="container">
        @include('notifications')
        @yield('content')
    </div>
    <div id="push"></div>
</div>
@include('partials.footer')
@yield('scripts')
</body>
</html>

