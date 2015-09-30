<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>@section('title') {{{trans('site/site.site_title')}}} @show</title>
    @section('meta_keywords')
        <meta name="keywords" content="your, awesome, keywords, here"/>
    @show @section('meta_author')
        <meta name="author" content="Jon Doe"/>
    @show @section('meta_description')
        <meta name="description"
              content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei."/>
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
        <!-- Javascripts
                ================================================== -->
        <script src="{{asset('assets/site/js/jquery-1.11.1.min.js')}}"></script>
        <script src="{{asset('assets/site/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/site/js/jquery.justifiedGallery.min.js')}}"></script>
        <script src="{{asset('assets/site/js/lightbox.min.js')}}"></script>

        <style>
            body {
                padding: 60px 0;
            }

            @section('styles')


            @show
        </style>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <link rel="shortcut icon"
              href="{{{ asset('assets/site/ico/favicon.ico') }}}">
</head>

<body>
<div id="wrap">
    @include('partials.nav')
    @yield('carousel')
    <div class="container">
        <!--@include('notifications')-->
        @yield('content')
        @yield('galeries')
    </div>
    <div id="push"></div>
</div>
<hr>
<div id="footer">
    <div class="container">
        <p class="text-muted credit">
            <span style="text-align: left; float: left">&copy; <?php echo date('Y'); ?>
                <a href="{{URL::to('/')}}">{{{trans('site/site.site_title')}}}</a>
            </span>
            <span class="hidden-phone" style="text-align: right; float: right">
                Powered by: <a href="http://laravel.com/" alt="Laravel 5.1">Savan Koradia</a></span></p>
    </div>
</div>
@yield('scripts')
</body>
</html>

