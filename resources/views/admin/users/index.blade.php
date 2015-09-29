@extends('site.layouts.default') {{-- Web site Title --}}
@section('title') {{{ trans('site/user.dashboard') }}} :: @parent @stop

{{-- Content --}} @section('content')
<div class="page-header">
	<h1>{{{ trans('admin/user.users') }}}</h1>
</div>
<div class="row">
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Deleted</th>
                    <th>Blocked</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
            <tr>
                <td> {{ $user->id }}</td>
                <td> {{ $user->name }}</td>
                <td> {{ $user->email}} </td>
                <td> {{ ($user->is_deleted) ? "Yes" : "No" }}</td>
                <td> {{ ($user->is_blocked) ? "Yes" : "No" }}</td>
                <td></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
