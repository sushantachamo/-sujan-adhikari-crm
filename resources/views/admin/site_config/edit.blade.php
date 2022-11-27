@extends('admin.includes.layout')

@section('content')
    @include('admin.includes.breadcrumb',[
    'base_route' => $base_route,
    'from' =>'site_config',
    'page'=> "Edit"
    ])
    <section class="rounded mb-3">
        @include('admin.includes.flash-notification')
        {!! Form::open(['url' => route($base_route.'.update'), 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        <!-- <a href="{{ url('/gunaso/gunaso') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a> -->
            @include($view_path.'.includes.form')
        {!! Form::close() !!}
    </section>

@endsection
