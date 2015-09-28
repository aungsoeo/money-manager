@extends('site.layouts.default') {{-- Web site Title --}}
@section('title') {{{ trans('site/user.dashboard') }}} :: @parent @stop

{{-- Content --}} @section('content')
<div class="page-header">
	<h1>{{{ trans('site/user.dashboard') }}}</h1>
</div>
<div class="row">
</div>
@stop
