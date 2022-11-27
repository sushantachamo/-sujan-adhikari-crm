@extends('admin.includes.layout')

@section('content')

        @include('admin.includes.breadcrumb', [
           'base_route' => $base_route,
           'page' => 'रिपोर्ट'
       ])
    <style>
        p{color:black;}
        .quick-link .list-group-item {
            /* background-color:#6dbb30; */
            background-image:linear-gradient(to right top, #007dc6, #007dc6, #007dc6, #007dc6, #007dc6);
            position: relative;
            display: block;
            padding: 1rem;
            border: none;
            font-size: 16px;
            font-weight: bold;
            color: white;
            transition: all 0.3s ease;
            margin: 2px;
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        }
        .quick-link .list-group-item:hover{
            color: white;
            background: #006AA8;
        }
        .quick-link .list-group-item i {
            color: #white;
        }
    </style>
    <section class="rounded mb-3">
        @include('admin.includes.flash-notification')
        
        <div class="row">
            <div class="col-md-8">
                <!-- PAGE CONTENT BEGINS -->

                <a href="{{ url('/admin/application') }}" title="Back" type="button" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                @if($data['row']->deleted_at != null)
                
                @else
                    @can('update-'.Illuminate\Support\Str::lower($panel))
                        <a type="button" href="{{ route($base_route.'.edit', ['application'=>$data['row']->application_id, 'form-name'=>'applicant_details']) }}"
                                class="btn btn-info btn-sm row-edit">
                                <i class="fa fa-edit"></i> Edit
                        </a>
                    @endcan
                    @can('delete-'.Illuminate\Support\Str::lower($panel))
                        <button class="btn btn-danger btn-sm confirm-delete"
                                attr="{{ route($base_route.'.destroy', $data['row']->application_id) }}">
                            <i class="fa fa-trash"></i>Delete
                        </button>
                        {!! Form::open(['url' => route($base_route.'.destroy',$data['row']->application_id), 'method' => 'delete']) !!}
                        {!! Form::close() !!}
                    @endcan
                @endif
                <hr>
                @if($data['row']->deleted_at == null)
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-center"><h5 style="color:#006AA8; font-weight:bold;">विवरण</h5></div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="{{ config('fields.applicant_details.borrower_name.key') }}"> {{ config('fields.applicant_details.borrower_name.name_np') }}	</label> 
                                    <h6>
                                        @if(isset($data['row']))
                                        <a target="_blank" href="{{ route('admin.application.edit', ['application' =>  $data['row']->application_id , 'form-name'=>'review']) }}">{{ isset($data['row'][config('fields.applicant_details.borrower_name.key')])?$data['row'][config('fields.applicant_details.borrower_name.key')] : null }}</a>
                                        @elseif(isset($data['applicant_id']))
                                        <a target="_blank" href="{{ route('admin.application.edit', ['application' =>  $data['applicant_id'] , 'form-name'=>'review']) }}">{{ isset($data['row'][config('fields.applicant_details.borrower_name.key')])?$data['row'][config('fields.applicant_details.borrower_name.key')]: null }}</a>
                                        @endif
                                    </h6>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="{{ config('fields.loan_details.loan_title.key') }}"> {{ config('fields.loan_details.loan_title.name_np') }}	</label>
                                    <h6>
                                        {{ isset($data['row'][config('fields.loan_details.loan_title.key')])?$data['row'][config('fields.loan_details.loan_title.key')] : 'N/A' }}
                                    </h6>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="{{ config('fields.loan_details.subscription_id.key') }}"> {{ config('fields.loan_details.subscription_id.name_np') }}	</label>
                                    <h6>
                                        {{ isset($data['row'][config('fields.loan_details.subscription_id.key')])?$data['row'][config('fields.loan_details.subscription_id.key')]: 'N/A' }}
                                    </h6>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="{{ config('fields.applicant_details.loan_type.key') }}"> {{ config('fields.applicant_details.loan_type.name_np') }}	</label>
                                    <h6>
                                        {{ isset($data['row'][config('fields.applicant_details.loan_type.key')])? config('custom.loan_types.'.$data['row'][config('fields.applicant_details.loan_type.key')]) : null }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                            
                    </div>
                </div>
                @can('download-'.Illuminate\Support\Str::lower($panel))
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-center"><h3 style="color:#006AA8; font-weight:bold;">रिपोर्टहरु</h3></div>
                        <div class="accordion" id="accordionBordered">
                            <div class="row">
                            
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                @endcan
                @endif
            </div>
            <div class="col-md-4">
                @include('admin.application.includes.status_form')
                @if(isset($data['activitylogs']))
                    @include('admin.includes.activity_lists')
                @endif
            </div>       
        </div><!-- /.page-content -->
    </section><!-- /.main-content -->
    @include('admin.application.includes.modals.export')
@endsection
@section('js_scripts')
<script>
     $(document).ready(function () {

        $('#today_bs').nepaliDatePicker({
                container: '#modalShowExport',
                ndpEnglishInput: 'today',
                ndpYear:true,
                ndpMonth:true,
                closeOnDateSelect: true,     
            });
        $("#today_bs").keyup(function (event) {
            event.preventDefault();
            $(this).removeClass('text-danger')
            $(this).removeClass('text-success')
            inputvalue = $(this).val();
            if(countNumberOnString(inputvalue) == '8')
            {
                dateObject = NepaliFunctions.ConvertToDateObject(inputvalue, "YYYY-MM-DD");
                if(NepaliFunctions.ValidateBsDate(dateObject))
                {
                    $(this).addClass('text-success')
                    $('#today').val(NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD(dateObject)));
                }
                else
                {
                    $(this).addClass('text-danger')
                }

            }
            
        }); 

        $("#today_clear").on('click', function(){
            $('#today_bs').val('');
            $('#today').val('');
        });
    

        $('a.exportFile').on('click', function (e){
            e.preventDefault();
            application_id = $(this).attr('application_id');
            template = $(this).attr('template');

            $('#export_template').val(template); 
            $('#export_id').val(application_id); 
            $('#modalShowExport').modal('show'); 
        });


        $('#pdfExport').on('click', function (e){
            e.preventDefault();
            url = '{{ route('admin.applicationExport.pdf') }}';
            $("#export_form").attr("target","_blank");
            $('#export_form').attr('action', url); 
            $('#modalShowExport').modal('hide');
            $('#export_form').submit(); 

        });
        $('#wordExport').on('click', function (e){
            e.preventDefault();
            url = '{{ route('admin.applicationExport.word') }}';
            $('#export_form').attr('action', url); 
            $('#modalShowExport').modal('hide');
            $('#export_form').submit(); 

        });


    });

</script>        
@endsection