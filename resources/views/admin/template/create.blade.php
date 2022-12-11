@extends('admin.includes.layout')

@section('content')
<style>
    .table-bordered, .table-bordered td, .table-bordered th {
    padding:1px;
}
</style>
    @include('admin.includes.breadcrumb',[
    'base_route' => $base_route,
    'page'=> "Import"
    ])
    <div id="content" class="padding-10">
			@include('admin.includes.flash-notification')
            <div class="row">
                <div class="col-md-5">
                    {!! Form::open(['url' => route($base_route.'.store'), 'method' => 'post', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend>Import Template</legend>
                                    <div class="form-group">
                                        <label for="import_template_type">Type <span class="text-danger">*</span></label>
                                        <div style="width:100%">
                                            {!! Form::select('import_template_type',config('custom.template_folder'), null, ['class'=>'form-control form-control-sm']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="import_template">File <span class="text-danger">*</span></label>
                                        <div style="width:100%">
                                            {!! Form::file('import_template') !!}
                                        </div>
                                    </div>
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn btn-primary">Import</button>
                                       
                                        <a type="button" href="{{ route($base_route.'.index') }}"
                                           class="btn btn-danger row-edit">
                                            Cancel
                                        </a>
                                    </div>
                                </div>
                    
                            </fieldset>
                        </div>
                    </div>

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
                                        File Extension : <code>docx</code>
                                    </li>
                                    <li>
                                        Available Variables
                                        <table class="table table-striped table-bordered" style="padding:1px;">
                                            <tr>
                                                <td>S.N</td>
                                                <td>Name</td>
                                                <td>Variable</td>
                                            </tr>
                                            @php
                                                $i =1;
                                            @endphp
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td> आजको बर्ष</td>
                                                <td> ${TodayYear} </td>
                                            </tr>
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td> आजको महिना</td>
                                                <td> ${TodayMonth} </td>
                                            </tr>
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td> आजको गते</td>
                                                <td> ${TodayDate} </td>
                                            </tr>
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td> आजको वार</td>
                                                <td> ${TodayDayName} </td>
                                            </tr>
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td> आजको वार नं</td>
                                                <td> ${TodayDayNum} </td>
                                            </tr>
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td> आजको मिति</td>
                                                <td> ${TodayFullDate} </td>
                                            </tr>

                                            @foreach(config('custom.office_fields') as $key => $field )
                                                <tr class="text-primary">
                                                    <td>{{ $i++ }}</td>
                                                    <td> {{ $field['name_np']}}</td>
                                                    <td>{{ '${'.$field['template_name'].'}'}}</td>
                                                </tr>
                                            @endforeach
                                            <tr class="text-primary">
                                                <td>{{ $i++ }}</td>
                                                <td> लोगो </td>
                                                <td>${OfficeLogo}</td>
                                            </tr>
                                            <tr class="text-success">
                                                <td>{{ $i++ }}</td>
                                                <td> आवेदकको फोटो </td>
                                                <td>${Photo}</td>
                                            </tr>
                                            <tr class="text-success">
                                                <td>{{ $i++ }}</td>
                                                <td> आवेदकको हस्ताक्षर </td>
                                                <td>${Signature}</td>
                                            </tr>
                                            @foreach(config('fields') as  $fields )
                                            @foreach($fields as $key => $field )
                                                <tr class="text-success">
                                                    <td>{{ $i++ }}</td>
                                                    <td> {{ $field['name_np']}}</td>
                                                    <td> {{ '${'.$field['template_name'].'}'}} </td>
                                                </tr>
                                            @endforeach
                                            @endforeach
                                            @foreach(config('taketa_patra_fields') as  $fields )
                                            @foreach($fields as $key => $field )
                                                <tr class="text-info">
                                                    <td>{{ $i++ }}</td>
                                                    <td> {{ $field['name_np']}}</td>
                                                    <td> {{ '${'.$field['template_name'].'}'}} </td>
                                                </tr>
                                            @endforeach
                                            @endforeach
                                            @foreach(config('credit_analysis') as  $fields )
                                            @if($fields['fields'])
                                            @foreach($fields['fields'] as $key => $field )
                                                <tr class="text-danger">
                                                    <td>{{ $i++ }}</td>
                                                    <td> {{ $field['name_np']}}</td>
                                                    <td> {{ '${'.$field['template_name'].'}'}} </td>
                                                </tr>
                                            @endforeach
                                            @endif
                                            @endforeach
                                            <tr class="text-danger">
                                                <td>{{ $i++ }}</td>
                                                <td>ऋण अनुसन्धान प्राप्ताङक</td>
                                                <td> {{ '${AnalysisObtainMarks}'}} </td>
                                            </tr>
                                            <tr class="text-danger">
                                                <td>{{ $i++ }}</td>
                                                <td>ऋण अनुसन्धान नतिजा</td>
                                                <td> {{ '${AnalysisResult}'}} </td>
                                            </tr>
                                            @foreach(config('credit_renew_fields') as  $fields )
                                            @foreach($fields as $key => $field )
                                                <tr class="text-info">
                                                    <td>{{ $i++ }}</td>
                                                    <td> {{ $field['name_np']}}</td>
                                                    <td> {{ '${'.$field['template_name'].'}'}} </td>
                                                </tr>
                                            @endforeach
                                            @endforeach
                                            @foreach(config('mortgage_appraisals') as  $fields )
                                            @foreach($fields as $key => $field )
                                                <tr class="text-warning">
                                                    <td>{{ $i++ }}</td>
                                                    <td> {{ $field['name_np']}}</td>
                                                    <td> {{ '${'.$field['template_name'].'}'}} </td>
                                                </tr>
                                            @endforeach
                                            @endforeach
                                           
                                        </table>
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