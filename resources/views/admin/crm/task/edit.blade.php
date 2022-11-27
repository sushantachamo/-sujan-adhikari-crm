@extends('admin.includes.layout')

@section('content')
    @include('admin.includes.breadcrumb',[
    'base_route' => $base_route,
    'page'=> 'सम्पादन'
    ])
    <section class="rounded mb-3">
        @include('admin.includes.flash-notification')
        <div class="col-md-12">
            <!-- PAGE CONTENT BEGINS -->
            {!! Form::model($data['row'], [
                            'method' => 'PUT',
                            'url' => route($base_route.'.update', $data['row']->id),
                            'role' => 'form', 'enctype' => 'multipart/form-data'])
            !!}

                {!! Form::hidden('id', $data['row']->id) !!}
                @include($view_path.'.includes.form', [
                    'button' => 'Update',
                    'title' => 'Lead परिवर्तन',
                ])


            {!! Form::close() !!}


        </div><!-- /.page-content -->
    </section><!-- /.main-content -->

 @endsection
@section('js_scripts')
    @yield('post_scripts')
@endsection
