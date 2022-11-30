@extends('admin.includes.layout')

@section('content')
@include('admin.includes.breadcrumb',[
    'base_route' => $base_route,
    'page'=> "Report Generate",
    ])
    <style>
        fieldset.scheduler-border {
         border: 1px groove #ddd !important;
         padding: 0 1.4em 0 1.4em !important;
         margin: 0 0 1.5em 0 !important;
         -webkit-box-shadow: 0px 0px 0px 0px #000;
         box-shadow: 0px 0px 0px 0px #000;
         margin-top: 15px !important;
         background:#d6dfe799;
         }
         fieldset fieldset.scheduler-border {
         padding: 0.4rem 1.4em 1.4em 1.4em !important;
         }
         legend.scheduler-border {
         font-size: 1.2em !important;
         font-weight: bold !important;
         text-align: left !important;
         width: auto;
         padding: 0 10px;
         border-bottom: none;
         background-color: #006AA8;
         color: #eff8fe;
         border-radius:3px;
        
         }
         .form_row_margin_bottom{
         margin-bottom: -20px;
         margin-top: -10px;
         }
         label{
             font-weight: 800;
         }
        .form-control-sm {
            font-size: 0.8rem;
            line-height: 1.5;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered
        {
            line-height: 36px;
        }
        .select2-container .select2-selection--single, .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 35px;
        }
        .select2-container {
            width: 100% !important;
        }

        .btn-sm {
            line-height: 1.2rem;
        }
        .form-control {
            border: 1px solid #aaaaaa;
        }
        ::-webkit-scrollbar {
        width: 5px;
        }
        .nepali-date-picker {
            font-size: 1rem;
        }
        .nepali-date-picker .drop-down-content {
            padding: 5px 0px 5px 5px;

        }
        .drop-down-content li {
            text-align: center;
        }
        .nav-tabs .nav-link{
            background:#006AA8;
            color: aliceblue;
            font-size: 17px !important;
            font-weight: 800 !important;
            border-color: aliceblue !important;
        }
        .nav-tabs .nav-link.active {
            background:#006AA8;
            color: aliceblue;
            
            border-color: aliceblue !important;
        }

        .inactive{
            color: #214c73 !important;
            background-color: #fc905bad !important;
            border-color: aliceblue !important;
            font-size: 17px !important;
            font-weight: 800 !important;
        }
        legend a{ color:white;}
        
        .select2-selection--multiple{
            overflow: hidden !important;
            height: auto !important;
        }
    </style>
    <section class="rounded mb-3">
        @include('admin.includes.flash-notification')
        <div class="row">            
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <form action="{{route('admin.crm.report-generate')}}" method="get" accept-charset="UTF-8" role="form" enctype="multipart/form-data">

                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Search Filter</legend>
                        <div class="form-row form-gorup">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="suggestion_type"> FollowUp Start Date	</label>
                                    <div class="input-group">
                                        {!! Form::text('searchStartDate_bs', isset($data['row']['registered_at_bs'])?$data['row']['registered_at_bs']:(isset($rawApplicant)? $rawApplicant['registered_at_bs'] : null), ['placeholder' => config('fields.loan_details.registered_at.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'searchStartDate_bs']) !!}
                                        
                                        {!! Form::text('searchStartDate', isset($data['row']['registered_at']) ? $data['row']['registered_at']->format('Y-m-d') : (isset($rawApplicant['registered_at'])? $rawApplicant['registered_at']->format('Y-m-d'):null), ['class' => 'hidden', 'style'=>'display:none', 'id' => 'searchStartDate']) !!}
                                        <span class="input-group-btn">
                                            <button class="btn  btn-sm btn-danger" type="button" id="registered_at_clear"><i class="fi fi-close"></i></button>
                                        </span>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="suggestion_type"> FollowUp End Date	</label>
                                    <div class="input-group">
                                        {!! Form::text('searchEndDate', isset($data['row']['registered_at_bs'])?$data['row']['registered_at_bs']:(isset($rawApplicant)? $rawApplicant['registered_at_bs'] : null), ['placeholder' => config('fields.loan_details.registered_at.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'searchEndDate_bs']) !!}
                                        
                                        {!! Form::text('searchEndDate', isset($data['row']['registered_at']) ? $data['row']['registered_at']->format('Y-m-d') : (isset($rawApplicant['registered_at'])? $rawApplicant['registered_at']->format('Y-m-d'):null), ['class' => 'hidden', 'style'=>'display:none', 'id' => 'searchEndDate']) !!}
                                        <span class="input-group-btn">
                                            <button class="btn  btn-sm btn-danger" type="button" id="registered_at_clear"><i class="fi fi-close"></i></button>
                                        </span>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="customer_name"> Customer Name	</label>
                                    {!! Form::select('application_id[]', isset($data['applications'])?$data['applications']:[], (isset($data['applications'])? $data['applications'] : null),
                                        ['class' => 'form-control select_to customer_details', 'id' => 'selectCustomer', 'multiple' => 'multiple']) !!}
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="customer_name"> User	</label>
                                    {!! Form::select('user_id[]', isset($data['users'])?$data['users']:[], (isset($data['users'])? $data['users'] : null),
                                        ['class' => 'form-control select_to user_details', 'id' => 'selectUser', 'multiple']) !!}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <br>
                                <button type="submit" class="btn btn-sm btn-success"> Search </button>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="bb-0 font-weight-bold fs--14 "> Date</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Customer Name</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Branch Name</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Contacted to</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Contacted value</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Details</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Next Follow Up Date</th>
                            </tr>
                        </thead>
                        <tbody id="item_list">
                            @if ($data['rows']->count() > 0)
                                @foreach($data['rows'] as $key => $value)
                                    @foreach($value as $key => $row)
                                        @if($key==0)
                                        <tr>
                                            <td colspan="7"><strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$row->userAssign->name}}</strong></td>
                                        </tr>
                                        @endif
                                        <tr class="odd gradeX">
                                            <td>{{ $row->created_at }}</td>
                                            <td>{{ $row->application->borrower_name_en }}</td>
                                            <td></td>
                                            <td>
                                                @if(!empty($row->details))
                                                    {{ $row->application->borrower_name_en }}<br>
                                                @endif
                                                @if(!empty($row->details1))
                                                    {{ $row->guarantor1_name }}<br>
                                                @endif
                                                @if(!empty($row->details2))
                                                    {{ $row->guarantor2_name }}<br>
                                                @endif
                                                @if(!empty($row->details3))
                                                    {{ $row->guarantor13 }}<br>
                                                @endif
                                                @if(!empty($row->details4))
                                                    {{ $row->guarantor4_name }}<br>
                                                @endif
                                                
                                            </td>
                                            <td>
                                                @if(!empty($row->details))
                                                    {{ $row->details }}<br>
                                                @endif
                                                @if(!empty($row->details1))
                                                    {{ $row->details1 }}<br>
                                                @endif
                                                @if(!empty($row->details2))
                                                    {{ $row->details2 }}<br>
                                                @endif
                                                @if(!empty($row->details3))
                                                    {{ $row->details3 }}<br>
                                                @endif
                                                @if(!empty($row->details4))
                                                    {{ $row->details4 }}<br>
                                                @endif
                                            </td>
                                            <td>{{ $row->description }}</td>
                                            <td>{{ $row->follow_up_at }} ({{ $row->follow_up_at_bs }}) </td>
                                        </tr>
                                    @endforeach
                                    
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9">
                                        <center>No data found.</center>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.select2').select2();
            $('.select_to').select2();
            customDatePicker('searchStartDate');
            customDatePicker('searchEndDate');
        });
    </script>
@endsection




    
