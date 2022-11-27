@extends('admin.includes.layout')

@section('content')


    @include('admin.includes.breadcrumb',[
    'base_route' => $base_route,
    'page'=> 'सम्पादन',
    'panel'=> $panel,
    ])

    <section class="rounded mb-3">
        @include('admin.includes.flash-notification')
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            @if($data['requests']['form-name']!='review')
            {!! Form::model($data['row'], [
                        'method' => 'PUT',
                        'url' => route($base_route.'.'.$data['requests']['form-name'] .'.submit'),
                        'role' => 'form', 'enctype' => 'multipart/form-data'])
            !!}

                {!! Form::hidden('id', $data['row']->application_id) !!}
                {!! Form::hidden('loan_type', $data['row']['loan_type']) !!}

                @include($view_path.'.includes.form', [
                    'button' => 'Save','loan_type'=>$data['row']['loan_type']
                ])

            {!! Form::close() !!}
            @else
                @include($view_path.'.includes.form', [
                    'button' => 'Save','loan_type'=>$data['row']['loan_type']
                ])
            @endif

        </div>
    </section>

@endsection
@section('js_scripts')
<script type="text/javascript">

    
</script>
@yield('post_scripts')
@endsection