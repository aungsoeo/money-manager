<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::to('/')}}">{{{trans('site/site.site_title')}}}</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ (Request::is('/') ? 'active' : '') }}">
                    <a href="{{ URL::to('') }}"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="{{ (Request::is('about') ? 'active' : '') }}">
                    <a href="{{ URL::to('about') }}">About</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                <li class="dropdown right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> {{{Auth::user()->name}}} <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ URL::to('home')}}"> <span class="glyphicon glyphicon-dashboard"></span> {{{ trans('site/site.dashboard') }}}</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('auth/logout')}}"> <span class="glyphicon glyphicon-off"></span> {{{ trans('site/site.logout') }}}</a>
                        </li>
                    </ul>
                </li>
                @else
                <li class="dropdown right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> {{{ trans('site/site.action') }}} <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ (Request::is('auth/login') ? 'active' : '') }}">
                            <a href="{{ URL::to('auth/login')}}"> <span class="glyphicon glyphicon-dashboard"></span> {{{ trans('site/site.login') }}}</a>
                        </li>
                        <li class="{{ (Request::is('auth/register') ? 'active' : '') }}">
                            <a href="{{ URL::to('auth/register')}}"> <span class="glyphicon glyphicon-off"></span> {{{ trans('site/site.sign_up') }}}</a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>