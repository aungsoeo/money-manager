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
            @if (Auth::check())
            <ul class="nav navbar-nav">
                @if (Auth::user()->type == "USER")
                <li class="{{ (Request::is('user/dashboard') ? 'active' : '') }}">
                    <a href="{{ URL::to('/user/dashboard') }}"> <span class="glyphicon glyphicon-home"></span> {{{ trans('site/user.dashboard') }}}</a>
                </li>
                @else
                <li class="{{ (Request::is('admin/dashboard') ? 'active' : '') }}">
                    <a href="{{ URL::to('/admin/dashboard') }}"> <span class="glyphicon glyphicon-home"></span> {{{ trans('site/user.dashboard') }}}</a>
                </li>
                <li class="{{ (Request::is('admin/users') ? 'active' : '') }}">
                    <a href="{{ URL::to('/admin/users') }}"> <span class="glyphicon glyphicon-user"></span> {{{ trans('admin/user.users') }}}</a>
                </li>
                <li class="{{ (Request::is('admin/category') ? 'active' : '') }}">
                    <a href="{{ URL::to('/admin/category') }}"> <span class="glyphicon glyphicon-list-alt"></span> Category</a>
                </li>
                @endif
            </ul>
            @endif
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