@extends('admin.includes.layout')

@section('content')
    @include('admin.includes.breadcrumb',[
    'base_route' => $base_route,
    'page'=> "नयाँ",
    ])
    <section class="rounded mb-3">
			@include('admin.includes.flash-notification')
	        <div class="col-md-12">
					{!! Form::open(['url' => route($base_route.'.store'), 'method' => 'post', 'role' => 'form',
					 'enctype' => 'multipart/form-data']) !!}

						@include($view_path.'.includes.form', [
	                    'button' => 'Save',
						'title' => "नयाँ Task-activity ",
	                	])

		            {!! Form::close() !!}
	        </div>
    </section>
@endsection
@section('js_scripts')
	@yield('post_scripts')
@endsection
