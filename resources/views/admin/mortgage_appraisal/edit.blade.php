@extends('admin.includes.layout')

@section('content')
    @include('admin.includes.breadcrumb', [
       'base_route' => $base_route,
       'page'=> 'सम्पादन'
   ])

    <div id="content" class="padding-20">
        <div class="row">
            @include('admin.includes.flash-notification')
            <div class="col-md-12">

                <!-- PAGE CONTENT BEGINS -->
                {!! Form::model($data['row'], ['url' => route($base_route.'.update',$data['row']->id),
                 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
                {!! Form::hidden('id', $data['row']->id) !!}


                @include($view_path.'.includes.form', [
                'button' => 'Update'
            ])


                {!! Form::close() !!}


            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection
@section('js_scripts')
@yield('post_scripts')
@endsection