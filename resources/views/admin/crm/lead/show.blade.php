@extends('admin.includes.layout')

@section('content')

        @include('admin.includes.breadcrumb', [
           'base_route' => $base_route,
           'page' => 'रिपोर्ट'
       ])

    <section class="rounded mb-3">
        <div class="row">
            <div class="col-md-8">
                <!-- PAGE CONTENT BEGINS -->
                <a href="{{ url('/admin/darta_chalani') }}" title="Back" type="button" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>

                @if($data['row']->deleted_at != null)
                    @can('restore-'.Illuminate\Support\Str::lower($panel))
                    <span>
                        <button class="btn btn-sm btn-success confirm-restore"
                                attr="#">
                            <i class="fa fa-refresh"></i>Restore
                        </button>
                        {!! Form::open(['url' => route($base_route.'.restore',$data['row']->id), 'method' => 'post', 'style'=>'display:none']) !!}
                        {!! Form::close() !!}
                    </span>

                    @endcan
                    @can('forceDelete-'.Illuminate\Support\Str::lower($panel))
                    <span>
                        <button class="btn btn-sm btn-danger  confirm-force-delete"
                                attr="{{ route($base_route.'.forcedelete', $data['row']->id) }}">
                            <i class="fa fa-trash"></i>Delete Permanently
                        </button>
                        {!! Form::open(['url' => route($base_route.'.forcedelete',$data['row']->id), 'method' => 'post', 'style'=>'display:none']) !!}
                        {!! Form::close() !!}
                    </span>
                    @endcan
                @else
                    @can('update-'.Illuminate\Support\Str::lower($panel))
                    <a type="button" href="{{ route($base_route.'.edit', $data['row']->id) }}"
                           class="btn btn-info btn-sm row-edit">
                            <i class="fa fa-edit"></i> Edit
                    </a>
                    @endcan
                    @can('delete-'.Illuminate\Support\Str::lower($panel))
                        <button class="btn btn-danger btn-sm confirm-delete"
                                attr="{{ route($base_route.'.destroy', $data['row']->id) }}">
                            <i class="fa fa-trash"></i>Delete
                        </button>
                        {!! Form::open(['url' => route($base_route.'.destroy',$data['row']->id), 'method' => 'delete', 'style'=>'display:none']) !!}
                        {!! Form::close() !!}
                    @endcan
                @endif      
                <hr>
                <div class="card card-default"> 
                    <div class="card-body">

                        <center><h3>रेकड नं‌. : {{ $data['row']->record_id }}</h3></center>
                        <small>
                            <strong> {{ $data['row']=='darta' ? 'दर्ता नं‌.:': 'चलानी नं‌.:' }} :</strong> {{ ViewHelper::convertNumberEnToNp($data['row']->register_number) }}  &nbsp; &nbsp; &nbsp;
                            <strong> आर्थिक वर्ष :</strong> {{ $data['row']->fiscal_year }}  &nbsp; &nbsp; &nbsp;
                            <strong> मिति:</strong>  <span class="nepaliDate" englishDate="{{ $data['row']->registered_at->format('Y-m-d') }}"></span> &nbsp; &nbsp; &nbsp;
                            <strong>अपडेट मिति:</strong>  <span class="nepaliDate" englishDate="{{ $data['row']->updated_at->format('Y-m-d') }}"> </span>&nbsp; &nbsp; &nbsp;
                            <strong>अवस्था:</strong>  
                            @if($data['row']->status == 1)
                            <span class="label label-sm label-success"> Active </span>
                            @else
                                <span class="label label-sm label-warning"> InActive </span>
                            @endif
                            @if($data['row']->deleted_at != null)
                                <span class="label label-sm label-danger"> Deleted </span>
                            @endif
                            &nbsp; &nbsp; &nbsp;
                            </small>
                        <hr>
                        <table class='table'>
                            
                            <tr>
                                <td>{{ $data['row']=='darta' ? 'दर्ता नं‌.:': 'चलानी नं‌.:' }}</td>
                                <td>{{ ViewHelper::convertNumberEnToNp($data['row']->register_number) }}</td>
                            </tr>
                            <tr>
                                <td>आर्थिक वर्ष</td>
                                <td>{{ config('custom.fiscal_year.'.$data['row']->fiscal_year) }}</td>
                            </tr>
                            <tr>
                                <td>मिति:</td>
                                <td><span class="nepaliDate" englishDate="{{ $data['row']->registered_at->format('Y-m-d') }}"></span> </td>
                            </tr>
                            <tr>
                                <td>कार्यालय/व्यक्तिको नाम, ठेगाना</td>
                                <td>{{ $data['row']->office_or_person }}</td>
                            </tr>
                            <tr>
                                <td>बिषय</td>
                                <td>{{ $data['row']->subject }}</td>
                            </tr>
                            <tr>
                                <td>फाईल</td>
                                <td>
                                    @if($data['row']->filename)
                                    <a href="{{ route('admin.file_link', ['record_id'=> $data['row']->record_id, 'filename'=>$data['row']->filename ]) }}" target="_blank">
                                        <img src="{{ asset('images/logo/file_logo.png') }}" width="100px">
                                    </a>
                                    @else
                                    'No File'
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>जिम्मेवार व्यक्ति</td>
                                <td>{!! $data['row']->identity_person !!}</td>
                            </tr>
                            <tr>
                                <td>कैफियत</td>
                                <td>{!! $data['row']->remarks !!}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @if(isset($data['activitylogs']))
                    @include('admin.includes.activity_lists')
                @endif
            </div>
                    
        </div><!-- /.page-content -->
    </section><!-- /.main-content -->

@endsection
@section('js_scripts')
@endsection