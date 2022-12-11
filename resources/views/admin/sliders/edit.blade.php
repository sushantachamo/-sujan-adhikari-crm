@extends('admin.includes.layout')

@section('content')

    @include('admin.includes.breadcrumb', [
       'base_route' => $base_route,
       'page'=> 'सम्पादन'
   ])

    <section class="rounded mb-3">
        @include('admin.includes.flash-notification')
        <div class="col-md-12">
            <!-- PAGE CONTENT BEGINS -->

                    {!! Form::model($data['row'], ['url' => route($base_route.'.update', $data['row']->id), 'method' => 'put',
                    'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
                    {!! Form::hidden('id', $data['row']->id) !!}

                    @include($view_path.'.includes.form', [
                    'button' => 'Update'
                ])

            {!! Form::close() !!}


        </div><!-- /.page-content -->
    </section><!-- /.main-content -->

 @endsection
