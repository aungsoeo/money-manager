@extends('site.layouts.default') {{-- Web site Title --}}
@section('title') {{{ trans('site/user.register') }}} :: @parent
@stop {{-- Content --}} @section('content')
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>{{{ trans('site/user.register') }}}</b>
            </div>
            <div class="panel-body">
                @include('notifications')
                <form method="POST" action="{{URL::to('auth/register')}}"
                      accept-charset="UTF-8">
                    <!-- CSRF Token -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <!-- ./ csrf token -->
                    <fieldset>
                        <div class="form-group {{$errors->has('name')?'has-error':''}}">
                            <label for="name"> {{{ trans('site/user.name') }}} </label> <input
                                class="form-control"
                                placeholder="{{{ trans('site/user.name') }}}" type="text"
                                name="name" id="name" value="{{{ Input::old('name') }}}"> <span
                                class="help-block">{{$errors->first('name', ':message')}}
                            </span>
                        </div>
                        <div class="form-group {{$errors->has('email')?'has-error':''}}">
                            <label for="email"> {{{ trans('site/user.e_mail') }}}
                            </label> <input class="form-control"
                                            placeholder="{{{ trans('site/user.e_mail') }}}" type="text"
                                            name="email" id="email" value="{{{ Input::old('email') }}}"> <span
                                            class="help-block">{{$errors->first('email', ':message')}}
                            </span>
                        </div>
                        <div class="form-group {{$errors->has('password')?'has-error':''}}">
                            <label for="password"> {{{ trans('site/user.password') }}} </label>
                            <input class="form-control"
                                   placeholder="{{{ trans('site/user.password') }}}"
                                   type="password" name="password" id="password"> <span
                                   class="help-block">{{$errors->first('password', ':message')}}
                            </span>
                        </div>
                        <div
                            class="form-group {{$errors->has('password_confirmation')?'has-error':''}}">
                            <label for="password_confirmation"> {{{
				trans('site/user.password_confirmation') }}} </label> <input
                                class="form-control"
                                placeholder="{{{ trans('site/user.password_confirmation') }}}"
                                type="password" name="password_confirmation"
                                id="password_confirmation"> <span class="help-block">{{$errors->first('password_confirmation',
				':message')}}
                            </span>
                        </div>
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary">{{{
				trans('site/user.submit') }}}</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
@stop

