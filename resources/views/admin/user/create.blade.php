@extends('admin.includes.layout')

@section('content')
    @include('admin.includes.breadcrumb',[
    'base_route' => $base_route,
    'page'=> "नयाँ"
    ])
    <div id="content" class="padding-20">
        @include('admin.includes.flash-notification')
        <div class="col-md-12">
            {!! Form::open(['url' => route($base_route.'.store'), 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
            @include($view_path.'.includes.form', [
            'button' => 'Save'
        ])

            {!! Form::close() !!}

        </div>
    </div>

@endsection
