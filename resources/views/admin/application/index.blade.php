@extends('admin.includes.layout')

@section('content')
    @include('admin.includes.breadcrumb',[
    'base_route' => $base_route,
    'page' => null,
    'panel'=> $panel,
    ])

    <section class="rounded mb-3">
        @include('admin.includes.flash-notification')
        <div class="row">
            <div class="col-md-12">
                @if($data['is_trash'] == false)
                <div class="card">
                    <div class="card-body row">
                        <div class="col-md-2 p-1">
                            <label>Search By</label>
                            {!! Form::select('filter_search_by', $data['filter_search_by'], isset($data['request']['filter_search_by'])? $data['request']['filter_search_by']:null, ['class' => 'form-control form-control-sm']) !!}
                        </div>
                        <div class="col-md-3 p-1">
                            <label>Search Value</label>

                            <input type="text" class="form-control form-control-sm" name="filter_search" placeholder="Search..." value="{{ isset($data['request']['filter_search'])? $data['request']['filter_search']:null}}">
                        </div>
                        <div class="col-md-2 p-1">
                            <label>धितो किसिम</label>
                            {!! Form::select('filter_loan_type',$data['loan_types'], isset($data['request']['filter_loan_type'])?$data['request']['filter_loan_type']:null, ['class' => 'form-control form-control-sm']) !!}
                        </div>
                        <div class="col-md-2 p-1">
                            <div class="form-group">
                                <label for="Date">ऋण स्वीकृत मिति देखि:</label>
                                <div class="input-group">
                                    {!! Form::text('filter_date_from_bs', isset($data['request']['filter_date_from_bs'])?$data['request']['filter_date_from_bs']:null, ['placeholder' => 'मिति देखि', 'class' => 'form-control form-control-sm  nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'filter_date_from_bs']) !!}
                                    {!! Form::text('filter_date_from', isset($data['request']['filter_date_from'])?$data['request']['filter_date_from']:null, ['class' => 'hidden', 'id' => 'filter_date_from']) !!}
                                    <span class="input-group-append">
                                        <button class="btn btn-danger btn-sm" type="button" id="filter_date_from_clear"><i class="fi fi-close"></i></button>
                                    </span>
                                </div>
                            </div> 
                        </div> 
                        <div class="col-md-2 p-1">
                             <div class="form-group">
                                <label for="Date">ऋण स्वीकृत मिति सम्म:</label>
                                <div class="input-group">
                                    {!! Form::text('filter_date_to_bs', isset($data['request']['filter_date_to_bs'])?$data['request']['filter_date_to_bs']:null, ['placeholder' => 'मिति सम्म', 'class' => 'form-control form-control-sm  nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'filter_date_to_bs']) !!}
                                    {!! Form::text('filter_date_to', isset($data['request']['filter_date_to'])?$data['request']['filter_date_to']:null, ['class' => 'hidden', 'id' => 'filter_date_to']) !!}
                                    <span class="input-group-append">
                                        <button class="btn btn-danger btn-sm" type="button" id="filter_date_to_clear"><i class="fi fi-close"></i></button>
                                    </span>
                                </div>
                            </div> 
                        </div>

                        
                        <div class="col-md-1">
                            <label for="Date">&nbsp;</label>
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning btn-sm text-bold" id="form-filter-btn">
                                    <i class="fi fi-search"></i>
                                </button>
                                <a href="{{ route($base_route.'.index') }}" class="btn btn-dark btn-sm">
                                    <i class="fi fi-reload"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="row">            
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->                
                <div class="table-responsive" id="printable" >
                    <table class="table table-hover table-bordered table-sm">
                        <thead>
                        <tr class="no_print">
                            <td colspan="10">
                                @if($data['is_trash'] == false)
                                    @can('create-'.Illuminate\Support\Str::lower($panel))
                                    <div class="btn-group">
                                        <a type="button" href="{{ route($base_route.'.create') }}"
                                            class="btn btn-sm btn-custom ">
                                            <i class="fa fa-plus"></i> नयाँ आवेदन 
                                        </a>
                                    </div>
                                    @endcan
                                    
                                    @canany(['restore-'.Illuminate\Support\Str::lower($panel), 'forceDelete-'.Illuminate\Support\Str::lower($panel)])
                                    <a type="button"
                                    href="{{ route($base_route.'.index', ['data-show'=>'trashed']) }}"
                                    class="btn btn-danger btn-sm float-right" data-toggle="tooltip" title="Deleted Records">
                                        <i class="fa fa-trash"></i>Trash List
                                    </a>
                                    @endcanany  
                                    <a type="button" id="printBtn" class="btn btn-sm btn-custom text-white  float-right"> <i class="fi fi-print"></i></a>
                                @else 
                                    @can('show-'.Illuminate\Support\Str::lower($panel))
                                    <div class="btn-group float-right">
                                        <a type="button" href="{{ route($base_route.'.index') }}"
                                        class="btn btn-custom btn-sm " data-toggle="tooltip" title="Active Records">
                                            <i class="fa fa-refresh"></i>Active Lists
                                        </a>
                                    </div>
                                    @endcan
                                @endif


                                @if($data['rows']->total() > $data['per_page'])
                                    <div class="float-right">

                                        <div class="dropdown"
                                             style="border: #ddd 2px solid; padding: 9px 10px; width: auto; height: auto; margin: 0px 0px 3px 0px; border-radius: 5px; color:#000; text-decoration: none;">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"
                                               aria-expanded="false">
                                                {{ $data['per_page'] }} <span class="float-right"
                                                                              style="padding-left:10px;"><i
                                                            class="fa fa-caret-down"></i></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                @for ($i=10; $i<=50; $i+=10)
                                                    <li>
                                                        <a href="{{ route($base_route.'.index',['per_page'=>$i]) }}">{{ $i }}</a>
                                                    </li>
                                                @endfor
                                                <li><a href="{{ route($base_route.'.index',['per_page'=>$i]) }}">100</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="bb-0 font-weight-bold "> आईडी</th>
                            @hasrole('super-admin')
                                <th class="bb-0 font-weight-bold "> सहकारीको नाम</th>
                            @else
                                @if(Auth::user()->office()->whereNull('head_office')->first())
                                    <th class="bb-0 font-weight-bold "> कार्यालय, स्थान</th>
                                @endif
                            @endhasrole
                            
                            <th class="bb-0 font-weight-bold "> ऋण लिनेको पुरा नाम</th>
                            <th class="bb-0 font-weight-bold "> सम्पर्क नं</th>
                            <th class="bb-0 font-weight-bold "> धितो किसिम </th>
                            {{-- <th class="bb-0 font-weight-bold fs--14 min-w-150"> ऋण शिर्षक</th>--}}
                            <th class="bb-0 font-weight-bold">स्वीकृत ऋण रकम</th>
                            {{-- <th class="bb-0 font-weight-bold fs--14 min-w-100"> ऋण अवधि</th> --}}
                            <th class="bb-0 font-weight-bold fs--14 min-w-100"> अवस्था</th>
                            <th class="bb-0 font-weight-bold no_print" > Action</th>
                        </tr>
                        </thead>
                        <tbody id="item_list">
                        @if ($data['rows']->count() > 0)
                            @foreach($data['rows'] as $row)

                                <tr class="odd gradeX">
                                    <td>{{ $row->id }}</td>
                                    @hasrole('super-admin')
                                        <td>{{ $row->office_name? $row->office_name : '--' }}</td>
                                    @else
                                        @if(Auth::user()->office()->whereNull('head_office')->first())
                                            <td>{{ $row->head_office?'सेवा केन्द्र': 'मुख्य कार्यालय' }}, {{ $row->office_tole }}</td>
                                        @endif
                                    @endhasrole

                                    
                                    
                                    <td>{{ $row->borrower_name }}</td>
                                    <td>{{ $row->contact_number }}</td>
                                    <td>{{ config('custom.loan_types.'.$row->loan_type) }}</td>
                                    {{-- <td>{{ $row->loan_title == null?'N/A':$row->loan_title }} </td> --}}
                                    <td>{{ $row->total_loan_amount == null?'N/A':$row->total_loan_amount  }}</td>
                                    {{-- <td> {!! $row->loan_period == null?'N/A':$row->loan_period  !!} </td>
                                    <td>
                                        @if($row->loan_pass_date)
                                        <span class="nepaliDate" englishDate="{{ $row->loan_pass_date->format('Y-m-d') }}"></span>
                                        @else
                                        N/A
                                        @endif
                                    </td> --}}
                                    <td>
                                        <span class="badge badge-sm badge-{{config('custom.application_status_details.'.$row->latest_status_code.'.color' )}}">{{ config('custom.application_status_details.'.$row->latest_status_code.'.name_np') }}</span>
                                        <br>                                    
                                        @if($row->credit_analysis_id == NULL)
                                            <a href="{{ route('admin.credit_analysis.create', ['applicant_id'=>$row->application_id]) }}"><span class="badge badge-sm badge-warning"> अनुसन्धान नगरिएको </span> </a>
                                        @elseif($row->grand_total < 70)
                                        <a href="{{ route('admin.credit_analysis.edit', ['credit_analysi'=>$row->credit_analysis_id]) }}"><span class="badge badge-sm badge-danger"> अनुसन्धान प्राप्ताङक: {{ $row->grand_total }}</span></a>
                                        @elseif($row->grand_total >= 70)
                                        <a href="{{ route('admin.credit_analysis.edit', ['credit_analysi'=>$row->credit_analysis_id]) }}"><span class="badge badge-sm badge-success"> अनुसन्धान प्राप्ताङक: {{ $row->grand_total }} </span></a>
                                        @else
                                        <a href="{{ route('admin.credit_analysis.create', ['applicant_id'=>$row->application_id]) }}"> <span class="badge badge-sm badge-warning"> अनुसन्धान नगरिएको </span></a>
                                        @endif
                                    </td>
                                
                                    @if($data['is_trash'] ==true)
                                    <td class="no_print">
                                        <div class="btn-group">
                                            @can('restore-'.Illuminate\Support\Str::lower($panel))
                                            <span>
                                                <button class="btn btn-sm btn-warning  confirm-restore"
                                                        attr="#" data-toggle="tooltip" title="Restore">
                                                    <i class="fa fa-refresh"></i>Restore
                                                </button>
                                                {!! Form::open(['url' => route($base_route.'.restore',$row->application_id), 'method' => 'post','style'=>'display:none']) !!}
                                                {!! Form::close() !!}
                                            </span>
                                            @endcan
                                            @can('forceDelete-'.Illuminate\Support\Str::lower($panel))
                                            <span>
                                            <button class="btn btn-sm btn-danger  confirm-force-delete"
                                                    attr="{{ route($base_route.'.forcedelete', $row->application_id) }}"
                                                    data-toggle="tooltip" title="Delete Permanently">
                                                <i class="fa fa-times"></i>Delete 
                                            </button>
                                            {!! Form::open(['url' => route($base_route.'.forcedelete',$row->application_id), 'method' => 'post','style'=>'display:none']) !!}
                                            {!! Form::close() !!}
                                            </span>
                                            @endcan
                                        </div>
                                    </td>
                                    @else
                                    <td class="no_print">
                                        <div class="btn-group">
                                            @can('show-'.Illuminate\Support\Str::lower($panel))
                                            <a type="button" href="{{ route($base_route.'.show', $row->application_id) }}"
                                               class="btn btn-icon-only btn-custom btn-sm row-show">
                                                <i class="fi fi-eye"></i> Show
                                            </a>
                                            @endcan
                                            @can('update-'.Illuminate\Support\Str::lower($panel))
                                            <a type="button" href="{{ route($base_route.'.edit', ['application'=>$row->application_id, 'form-name'=>'applicant_details']) }}"
                                               class="btn btn-icon-only btn-info btn-sm row-edit">
                                                <i class="fi fi-pencil"></i> Edit
                                            </a>
                                            @endcan
                                            @can('delete-'.Illuminate\Support\Str::lower($panel))
                                                <button class="btn btn-icon-only btn-danger btn-sm confirm-delete"
                                                        attr="{{ route($base_route.'.destroy', $row->application_id) }}">
                                                    <i class="fi fi-thrash"></i> Delete
                                                </button>
                                            {!! Form::open(['url' => route($base_route.'.destroy',$row->application_id), 'method' => 'delete','style'=>'display:none' ]) !!}
                                            {!! Form::close() !!}
                                            @endcan

                                        </div>
                                    </td>
                                    @endif
                                </tr>

                            @endforeach
                            <tr class="no_print">
                                <td colspan="7">
                                    <span style="margin: 10px 0px; display: block; text-align: left; float: left; line-height: 35px;"> Showing {{ $data['rows']->perPage() * ($data['rows']->currentPage()-1)+1 }}
                                        to {{ $data['rows']->perPage() * ($data['rows']->currentPage()-1)+$data['rows']->count() }}
                                        of {{ $data['rows']->total() }} entries</span>
                                    <span class="float-right">{!! $data['rows']->appends(request()->query())->links() !!}</span>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="6">
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

@section('js_scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            customDatePicker('filter_date_to');
            customDatePicker('filter_date_from');

            if($('#filter_date_to').val() !== '')
            {
                $to_date = $('#filter_date_to').val();
                $bs_date = NepaliFunctions.AD2BS(NepaliFunctions.ParseDate($to_date).parsedDate);
                $('#filter_date_to_bs').val(NepaliFunctions.ConvertDateFormat($bs_date), "YYYY-MM-DD");
            }
            else
            {
                $('#filter_date_to').val('');
            }

            if($('#filter_date_from').val() !== '')
            {
                $from_date = $('#filter_date_from').val();
                $bs_date = NepaliFunctions.AD2BS(NepaliFunctions.ParseDate($from_date).parsedDate);
                $('#filter_date_from_bs').val(NepaliFunctions.ConvertDateFormat($bs_date), "YYYY-MM-DD");
            }
            else
                $('#filter_date_from').val('');

            $('#form-filter-btn').click(function () {
                var url = '{{ route($base_route.'.index') }}';
                var search = $('input[name="filter_search"]').val();
                var search_by = $('select[name="filter_search_by"]').val();
                var loan_type = $('select[name="filter_loan_type"]').val();
                var date_from = $('input[name="filter_date_from"]').val();
                var date_to = $('input[name="filter_date_to"]').val();
                var status = $('select[name="filter_status"]').val();
                var flag = false;

                if (search) {
                    url = url + '?filter_search=' + search;
                    flag = true;
                }
                if (search && search_by) {
                    if (flag) {
                        url = url + '&filter_search_by=' + search_by;
                    } else {
                        url = url + '?filter_search_by=' + search_by;
                        flag = true;
                    }
                }
                
                if (loan_type) {
                    if (flag) {
                        url = url + '&filter_loan_type=' + loan_type;
                    } else {
                        url = url + '?filter_loan_type=' + loan_type;
                        flag = true;
                    }
                }
                
                if (date_from && date_to) {
                    if (flag) {
                        url = url + '&filter_date_from=' + date_from + '&filter_date_to=' + date_to;
                    } else {
                        url = url + '?filter_date_from=' + date_from + '&filter_date_to=' + date_to;
                        flag = true;
                    }
                }


                if (status) {
                    if (flag) {
                        url = url + '&filter_status=' + status;
                    } else {
                        url = url + '?filter_status=' + status;
                        flag = true;
                    }
                }

                location.href = url;

            });

        });

    </script>
@endsection