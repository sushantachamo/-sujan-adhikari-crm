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

                <a href="{{ url('/admin/credit_analysis') }}" title="Back" type="button" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                @if($data['row']->deleted_at != null)
                
                @else
                    @can('update-'.Illuminate\Support\Str::lower($panel))
                        <a type="button" href="#"
                                class="btn btn-info btn-sm row-edit">
                                <i class="fa fa-edit"></i> Edit
                        </a>
                    @endcan
                    @can('delete-'.Illuminate\Support\Str::lower($panel))
                        <button class="btn btn-danger btn-sm confirm-delete"
                                attr="{{ route($base_route.'.destroy', $data['row']->id) }}">
                            <i class="fa fa-trash"></i>Delete
                        </button>
                        {!! Form::open(['url' => route($base_route.'.destroy',$data['row']->id), 'method' => 'delete']) !!}
                        {!! Form::close() !!}
                    @endcan
                @endif
                <hr>
                @if($data['row']->deleted_at == null)
                @can('download-'.Illuminate\Support\Str::lower($panel))
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-center"><h3 style="color:#006AA8; font-weight:bold;">रिपोर्टहरु</h3></div>
                        <div class="accordion" id="accordionBordered">
                            <div class="row">
                            
                            @if($data['row'][config('fields.other_details.approved_by.key')] != null)
                                @foreach($data['templates'] as $key=>$templates)
                                <div class="col-md-6">
                                    <div class="card b-0 mb-1">
                                        <div class="card-header bw--3 shadow-xs mb-0 p-3 border border-info bg-custom" id="{{$key}}">
                                            <h2 class="mb-0">
                                                <button class="btn btn-custom btn-block btn-sm text-align-center text-decoration-none text-dark collapsed" style="color:#fff !important; font-size:1.2rem;" type="button" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
                                                    <div class="badge badge-danger badge-ico-sm rounded-circle float-start text-white"><i class="fi fi-arrow-download"></i></div> {{ config('custom.template_folder.'.$key) }}
                                                    <span class="group-icon float-end">
                                                        <i class="fi fi-arrow-start-slim"></i>
                                                        <i class="fi fi-arrow-down-slim"></i>
                                                    </span>
                                                </button>
                                            </h2>
                                        </div>
                                        
                                        <div id="collapse{{$key}}" class="collapse" aria-labelledby="{{$key}}" data-parent="#accordionBordered">
                                            <div class="card-body p-0 ">
                                                @foreach ($templates as $template)
                                                <div class="list-group shadow quick-link bg-ebox">
                                                    <a application_id ={{$data['row']->application_id}} template="{{$template['file_name']}}" class="list-group-item list-group-item-action list-group-item-light exportFile">
                                                        <div class="badge badge-danger badge-ico-sm rounded-circle float-start text-white"><i class="fi fi-arrow-download"></i></div> {{ $template['nick_name'] }}
                                                    </a>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                             @else
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header p-3 text-center bg-custom h6 ">
                                        यस आबेदन प्रमाणित गरिएको छैन । कागजात पिन्ट गर्नु पुर्व यहा <a href="{{ route('admin.application.edit', ['application' =>  $data['row']->application_id, 'form-name'=>'review']) }}" class="h5 btn btn-sm  btn-info">click</a> गरि प्रमाणित गर्नुहोस ।
                                    </div>
                                </div>
                            </div>

                            @endif
                        </div>

                        
                        </div>
                    </div>
                </div>
                <hr>
                @endcan
                @endif
            </div>
            <div class="col-md-4">
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
            url = '{{ route('admin.credit_analysisExport.pdf') }}';
            $("#export_form").attr("target","_blank");
            $('#export_form').attr('action', url); 
            $('#modalShowExport').modal('hide');
            $('#export_form').submit(); 

        });
        $('#wordExport').on('click', function (e){
            e.preventDefault();
            url = '{{ route('admin.credit_analysisExport.word') }}';
            $('#export_form').attr('action', url); 
            $('#modalShowExport').modal('hide');
            $('#export_form').submit(); 

        });


    });

</script>        
@endsection