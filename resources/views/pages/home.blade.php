@extends('app')
@section('title') Home :: @parent @stop
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="page-header">
            <h2>Home Page</h2>
        </div>
    </div>
    <div class="col-xs-6" style="text-align: inherit; text-justify: inter-word;">
        {{$content}}
    </div>
</div>
@endsection
@stop
