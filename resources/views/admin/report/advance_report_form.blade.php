@extends('admin.includes.layout')

@section('content')
    @include('admin.includes.breadcrumb',[
    'base_route' => $base_route,
    'page' => 'प्रतिवेदन'
    ])
    <section class="rounded mb-3">
        @include('admin.includes.flash-notification')
        <div class="col-md-12">
            <div class="card">
                <div class="card-body row">
                    @include('admin.includes.flash-notification')
                    <div class="col-md-12">
                        {!! Form::open(['url' => route('admin.report.advance_report_result'), 'method' => 'get', 'role' => 'form']) !!}
                            @include($view_path.'.includes.advance_form', ['route'=> route('admin.report.advance_report')])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div> 
        </div><!-- /.page-content -->
    </section><!-- /.main-content -->

 @endsection
@section('js_scripts')

    @yield('post_scripts')
<script>
    $(document).ready(function () {            
            customDatePicker('registered_at_from');
            customDatePicker('registered_at_to');
    });
</script>
@endsection
        