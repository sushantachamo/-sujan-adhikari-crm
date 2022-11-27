@extends('admin.includes.layout')


@section('content')
    @include('admin.includes.breadcrumb',[
    'base_route' => $base_route,
    'page'=> "नयाँ"
    ])
    <section class="rounded mb-3">
			@include('admin.includes.flash-notification')
	        <div class="col-md-12">
	            <!-- <a href="{{ url('/gunaso/gunaso') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a> -->
					{!! Form::open(['url' => route($base_route.'.store'), 'method' => 'post', 'role' => 'form']) !!}
					@include($view_path.'.includes.form', [
                    'button' => 'Save'
                ])



	            {!! Form::close() !!}
	        </div>
    </section>
@endsection
@section('js_scripts')
	@yield('post_scripts')
@endsection
n