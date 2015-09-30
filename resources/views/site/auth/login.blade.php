@extends('site.layouts.default') {{-- Web site Title --}}
@section('title') {{{ trans('site/user.login') }}} :: @parent @stop

{{-- Content --}} @section('content')
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>{{{ trans('site/user.login_to_account') }}}</b>
            </div>
            <div class="panel-body">
                @include('notifications')
                <form method="POST"
                      action="{{URL::to('auth/login')}}" accept-charset="UTF-8">
                    <!-- CSRF Token -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <!-- ./ csrf token -->
                    <fieldset>
                        <div class="form-group {{$errors->has('email')?'has-error':''}}">
                            <label for="email"> {{trans('site/user.e_mail') }} </label>
                            <input class="form-control" tabindex="1"
                                   placeholder="{{ trans('site/user.e_mail') }}" type="text"
                                   name="email" id="email" value="{{ Input::old('email') }}">
                            <span class="help-block">{{$errors->first('email', ':message')}} </span>
                        </div>
                        <div class="form-group {{$errors->has('password')?'has-error':''}}">
                            <label for="password"> {{trans('site/user.password') }} </label>
                            <input class="form-control" tabindex="2"
                                   placeholder="{{ trans('site/user.password') }}" type="password"
                                   name="password" id="password">
                            <span class="help-block">{{$errors->first('password',':message')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="type"> {{trans('site/user.user_type') }} </label>
                            <select name="type" class="form-control">
                                <option value="ADMIN">Admin</option>
                                <option value="USER">User</option>
                            </select>
                        </div>
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary">{{{trans('site/user.submit') }}}</button>
                            <a class="btn btn-default" href="{{URL::to('auth/register')}}">{{trans('site/user.register') }}</a>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
@stop

