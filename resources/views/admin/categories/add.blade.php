@extends('site.layouts.default') {{-- Web site Title --}}
@section('title') {{{ trans('site/user.dashboard') }}} :: @parent @stop

{{-- Content --}} @section('content')
<div class="page-header">
	<h4>Add Category</h4>
</div>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="panel panel-default">
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
@stop
