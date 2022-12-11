@extends('admin.includes.layout')

@section('content')
    @include('admin.includes.breadcrumb',[
    'base_route' => $base_route,
    'page'=> "Import"
    ])
    <div id="content" class="padding-10">
			@include('admin.includes.flash-notification')
            <div class="row">
                <div class="col-md-5">
                    {!! Form::open(['url' => route($base_route.'.importstore'), 'method' => 'post', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
                        @include($view_path.'.includes.import_form', [
                        'button' => 'Import'
                    ])

                    {!! Form::close() !!}
                    <hr>
                    @if (session()->has('error_bag'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="fi fi-close" aria-hidden="true"></span>
                            </button>
                            @foreach(session()->get('error_bag') as $message)
                                <p>{!! $message[0] !!}</p>
                            @endforeach
                        </div>
                    @endif
                        
                </div>
                <div class="col-md-7">
                    <div class="card shadow-md shadow-lg-hover transition-all-ease-250 transition-hover-top h-100 border-primary bl-0 br-0 bb-0 bw--2">
                        <div class="card-body">
                            <h5 class="card-title">
                                <span class="btn row-pill btn-sm bg-gradient-warning b-0 py-1 mb-0 float-start">
                                    <i class="fi fi-round-info-full"></i>
                                    Note
                                </span>
                            </h5><br>
                            <p class="card-text">
                                The Imported File should have:
                                <ul>
                                    <li>
                                        File Size : {{App\Helpers\Helper::parse_size(ini_get('upload_max_filesize'))/1024}} MB
                                    </li>
                                    <li>
                                        File Extension : <code>xlsx, xls</code>
                                    </li>
                                    <li>
                                        Must have exact 4 heading titles (Column) in same as mentioned 
                                        <ul>
                                            <li>First Heading Name must be one of them: <code>
                                                {{ implode(",", config('custom.blacklist_import_head.black_list_no')) }}</code>
                                            </li>
                                            <li>Second Heading Name must be one of them: <code>
                                                {{ implode(",", config('custom.blacklist_import_head.black_list_date')) }}</code>
                                            </li>
                                            <li>Third Heading Name must be one of them: <code>
                                                {{ implode(",", config('custom.blacklist_import_head.borrower_name')) }}</code>
                                            </li>
                                            <li>Fourth Heading Name must be one of them: <code>
                                                {{ implode(",", config('custom.blacklist_import_head.associated_person_or_firm')) }}</code>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        Fields cannot be left empty.
                                    </li>
                                    <li>
                                        Fields should not be repeted either on file or in any of the previous records.
                                    </li>
                                    <li>
                                        If no error is found in any field then the file would be imported.
                                    </li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="col-md-6">
                
            </div>
    </div>

@endsection
@section('js_scripts')
    @yield('post_scripts')
@endsection