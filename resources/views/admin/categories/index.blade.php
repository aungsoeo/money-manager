@extends('site.layouts.default') {{-- Web site Title --}}
@section('title') Category :: @parent @stop

{{-- Content --}} @section('content')
<div class="page-header">
    <div class="row">
        <div class="col-lg-11">
            <h4>Category</h4>
        </div>
        <div class="col-lg-1">
            <a href="{{ URL::to('/admin/add/category') }}" class="btn btn-success"> <span class="glyphicon glyphicon-plus-sign"></span> Add</a>
        </div>
    </div>
</div>
<div class="row">
   
</div>
@stop
