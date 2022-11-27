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
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                @if($data['is_trash'] == false)
                    @if (Auth::user()->can('update-'.Illuminate\Support\Str::lower($panel)) && $data['rows']->count() > 0)
                        <label class="mt-checkbox mt-checkbox-outline btn btn-sm  float-left ">
                            <input type="checkbox" id="checkAll">
                        </label>
                        <div class="dropdown show float-left">
                            <a class="btn border-info btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Bulk Action <i class="fi fi-arrow-down-full "></i>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach($bulk_action as $key => $value)
                                    <a class="dropdown-item bulk_list" id="{{ $key }}">{{ $value }}</a>
                                @endforeach
                            </div>
                            {!! Form::open(['url' => route($base_route.'.bulk-action'), 'method' => 'POST', 'id' => 'bulk-action-form', 'class' =>"display:none"]) !!}
                            {!! Form::hidden('row_ids', null, ['class' => 'row_ids']) !!}
                            {!! Form::hidden('bulk_action', null, ['class' => 'bulk_action']) !!}
                            {!! Form::close() !!}
                        </div>
                        
                    @endif
                    @can('create-'.Illuminate\Support\Str::lower($panel))
                    <a type="button" href="{{ route($base_route.'.create',['record_type'=>'darta']) }}"
                       class="btn btn-success btn-sm ">
                        <i class="fi fi-plus"></i> नयाँ {{ config('custom.record_types.darta') }}
                    </a>

                    <a type="button" href="{{ route($base_route.'.create',['record_type'=>'chalani']) }}"
                        class="btn btn-info btn-sm ">
                         <i class="fi fi-plus"></i> नयाँ {{ config('custom.record_types.chalani') }} 
                    </a>
                    @endcan
                    @canany(['restore-'.Illuminate\Support\Str::lower($panel), 'forceDelete-'.Illuminate\Support\Str::lower($panel)])
                    <a type="button"
                       href="{{ route($base_route.'.index', ['data-show'=>'trashed']) }}"
                       class="btn btn-danger btn-sm float-right" data-toggle="tooltip" title="Deleted Records">
                        <i class="fa fa-trash"></i>Trash List
                    </a>
                    @endcanany
        
                    @if($data['rows']->total() > $data['per_page'])
                        <div class="dropdown show float-right">
                            <a class="btn border-info btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $data['per_page'] }} <i class="fi fi-arrow-down-full"></i>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @for ($i=10; $i<=50; $i+=10)
                                    <a class="dropdown-item" href="{{ route($base_route.'.index',['per_page'=>$i]) }}">{{ $i }}</a>
                                @endfor
                            </div>
                        </div>
                    @endif  
                @else
                    @can('show-'.Illuminate\Support\Str::lower($panel))
                    <div class="btn-group float-right">
                        <a type="button" href="{{ route($base_route.'.index') }}"
                           class="btn btn-success btn-sm " data-toggle="tooltip" title="Active Records">
                            <i class="fa fa-refresh"></i>Active Lists
                        </a>
                    </div>
                    @endcan
                @endif
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-sm">
                        <thead>
                        <tr>
                            @if($data['is_trash'] == false)
                            <th></th>
                            @endif
                            @hasrole('super-admin')
                                <th class="bb-0 font-weight-bold "> सहकारीको नाम</th>
                            @endhasrole
                            <th class="bb-0 font-weight-bold fs--14 "> कागजात नं</th>
                            <th class="bb-0 font-weight-bold fs--14 "> कागजातको प्रकार</th>
                            <th class="bb-0 font-weight-bold fs--14 "> आर्थिक वर्ष </th>
                            <th class="bb-0 font-weight-bold fs--14 "> बिषय</th>
                            <th class="bb-0 font-weight-bold fs--14 "> मिति</th>
                            <th class="bb-0 font-weight-bold fs--14 "> अबस्था</th>
                            <th class="bb-0 font-weight-bold fs--14 "> Action</th>
                        </tr>
                        @if($data['is_trash'] == false)
                        <tr>
                            <td></td>
                            <td></td>
                            <td>{!! Form::number('filter_register_number', isset($data['request']['filter_register_number'])?$data['request']['filter_register_number']:null, ['placeholder' => 'कागजात नं', 'class' => 'form-control form-control-sm']) !!}</td>
                            <td>{!! Form::select('filter_record_type', $data['record_types'], isset($data['request']['filter_record_type'])?$data['request']['filter_record_type']:null, ['class' => 'form-control form-control-sm']) !!}</td>
                            <td>
                                {!! Form::select('filter_fiscal_year', $data['fiscal_years'], isset($data['request']['filter_fiscal_year'])?$data['request']['filter_fiscal_year']:null, ['class' => 'form-control form-control-sm']) !!}
                            </td>
                            <td>{!! Form::text('filter_subject', isset($data['request']['filter_subject'])?$data['request']['filter_subject']:null, ['placeholder' => 'बिषय', 'class' => 'form-control form-control-sm']) !!}</td>
                            <td>
                                <div class="input-group mb-3">
                                    {!! Form::text('filter_registered_at_bs', isset($data['request']['filter_registered_at_bs'])?$data['request']['filter_registered_at_bs']:null, ['placeholder' => 'मिति', 'class' => 'form-control form-control-sm nepalidate-picker', 'id' => 'filter_registered_at_bs']) !!}
                                    <div class="input-group-append">
                                        <button class="btn btn-danger btn-sm" type="button" id="filter_registered_at_clear"><i class="fi fi-close"></i></button>
                                    </div>
                                    
                                    {!! Form::text('filter_registered_at', isset($data['request']['filter_registered_at'])?$data['request']['filter_registered_at']:null, ['class' => 'hidden', 'style'=>'display:none', 'id' => 'filter_registered_at']) !!}
                                </div>
                            </td>
                            <td>{!! Form::select('filter_status',['' => 'All', 'active' => 'Active', 'inactive' => 'Inactive'], isset($data['request']['filter_status'])?$data['request']['filter_status']:null, ['class' => 'form-control form-control-sm']) !!}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-warning btn-sm" id="form-filter-btn">
                                        <i class="fi fi-play"></i>
                                    </button>
                                    <a href="{{ route($base_route.'.index') }}" class="btn btn-dark btn-sm">
                                        <i class="fi fi-reload"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endif
                        </thead>


                        <tbody id="item_list">
                        @if ($data['rows']->count() > 0)

                            @foreach($data['rows'] as $row)

                                <tr class="odd gradeX">
                                    @if($data['is_trash'] == false)
                                    <td class="center">
                                        @can('update-'.Illuminate\Support\Str::lower($panel))
                                        <label>
                                            <input type="checkbox" class="checkboxes" value="{{ $row->id }}"/>
                                        </label>
                                        @endcan
                                    </td>
                                    @endif
                                    @hasrole('super-admin')
                                        <td>{{ $row->office_name ? $row->office_name : '--' }}</td>
                                    @endhasrole
                                    <td>{{ config('custom.record_types.'.$row->record_type) }} नं. : {{ ViewHelper::convertNumberEnToNp($row->register_number) }}</td>
                                    <td>{{ config('custom.record_types.'.$row->record_type) }}</td>
                                    <td>{{ config('custom.fiscal_year.'.$row->fiscal_year) }}</td>
                                    <td>{{ $row->subject }}</td>
                                    <td> <span class="nepaliDate" englishDate="{{ $row->registered_at->format('Y-m-d') }}"></span></td>
                                    <td>
                                        @if($row->status == 1)
                                            <span class="badge badge-sm badge-success"> Active </span>
                                        @else
                                            <span class="badge badge-sm badge-warning"> InActive </span>
                                        @endif
                                        @if($row->deleted_at != null)
                                            <span class="badge badge-sm badge-danger"> Deleted </span>
                                        @endif
                                    </td>
                                    @if($data['is_trash'] ==true)
                                    <td>
                                        <div class="btn-group">
                                            @can('show-'.Illuminate\Support\Str::lower($panel))
                                            <a type="button" href="{{ route($base_route.'.show', $row->record_id) }}"
                                               class="btn btn-icon-only btn-success btn-sm row-show">
                                                <i class="fa fa-eye"></i>Show
                                            </a>
                                            @endcan
                                            @can('restore-'.Illuminate\Support\Str::lower($panel))
                                            <span>
                                                <button class="btn btn-sm btn-warning  confirm-restore"
                                                        attr="#" data-toggle="tooltip" title="Restore">
                                                    <i class="fa fa-refresh"></i>Restore
                                                </button>
                                                {!! Form::open(['url' => route($base_route.'.restore',$row->id), 'method' => 'post','style'=>'display:none']) !!}
                                                {!! Form::close() !!}
                                            </span>
                                            @endcan
                                            @can('forceDelete-'.Illuminate\Support\Str::lower($panel))
                                            <span>
                                            <button class="btn btn-sm btn-danger  confirm-force-delete"
                                                    attr="{{ route($base_route.'.forcedelete', $row->id) }}"
                                                    data-toggle="tooltip" title="Delete Permanently">
                                                <i class="fa fa-times"></i>Delete 
                                            </button>
                                            {!! Form::open(['url' => route($base_route.'.forcedelete',$row->id), 'method' => 'post','style'=>'display:none']) !!}
                                            {!! Form::close() !!}
                                            </span>
                                            @endcan
                                        </div>
                                    </td>
                                    @else
                                    <td>
                                        <div class="btn-group">
                                            @can('show-'.Illuminate\Support\Str::lower($panel))
                                            <a type="button" href="{{ route($base_route.'.show', $row->record_id) }}"
                                               class="btn btn-icon-only btn-success btn-sm row-show">
                                                <i class="fi fi-eye"></i>
                                            </a>
                                            @endcan
                                            @can('update-'.Illuminate\Support\Str::lower($panel))
                                            <a type="button" href="{{ route($base_route.'.edit', $row->id) }}"
                                               class="btn btn-icon-only btn-info btn-sm row-edit">
                                                <i class="fi fi-pencil"></i>
                                            </a>
                                            @endcan
                                            @can('delete-'.Illuminate\Support\Str::lower($panel))
                                                <button class="btn btn-icon-only btn-danger btn-sm confirm-delete"
                                                        attr="{{ route($base_route.'.destroy', $row->id) }}">
                                                    <i class="fi fi-thrash"></i>
                                                </button>
                                            {!! Form::open(['url' => route($base_route.'.destroy',$row->id), 'method' => 'delete','style'=>'display:none' ]) !!}
                                            {!! Form::close() !!}
                                            @endcan

                                        </div>
                                    </td>
                                    @endif
                                </tr>

                            @endforeach
                            <tr>
                                <td colspan="8">
                                    <span style="margin: 10px 0px; display: block; text-align: left; float: left; line-height: 35px;"> Showing {{ $data['rows']->perPage() * ($data['rows']->currentPage()-1)+1 }}
                                        to {{ $data['rows']->perPage() * ($data['rows']->currentPage()-1)+$data['rows']->count() }}
                                        of {{ $data['rows']->total() }} entries</span>
                                    <span class="float-right">{!! $data['rows']->links() !!}</span>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="8">
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
            $('#form-filter-btn').click(function () {
                var url = '{{ route($base_route.'.index') }}';
                var register_number = $('input[name="filter_register_number"]').val();
                var record_type = $('select[name="filter_record_type"]').val();
                var fiscal_year = $('select[name="filter_fiscal_year"]').val();
                var subject = $('input[name="filter_subject"]').val();
                var registered_at = $('input[name="filter_registered_at"]').val();
                var registered_at_bs = $('input[name="filter_registered_at_bs"]').val();
                var status = $('select[name="filter_status"]').val();
                var flag = false;

                console.log(register_number);
                if (register_number) {
                    url = url + '?filter_register_number=' + register_number;
                    flag = true;
                }

                if (fiscal_year) {
                    if (flag) {
                        url = url + '&filter_fiscal_year=' + fiscal_year;
                    } else {
                        url = url + '?filter_fiscal_year=' + fiscal_year;
                        flag = true;
                    }
                }

                if (subject) {
                    if (flag) {
                        url = url + '&filter_subject=' + subject;
                    } else {
                        url = url + '?filter_subject=' + subject;
                        flag = true;
                    }
                }

                if (record_type) {
                    if (flag) {
                        url = url + '&filter_record_type=' + record_type;
                    } else {
                        url = url + '?filter_record_type=' + record_type;
                        flag = true;
                    }
                }
                if (registered_at) {
                    if (flag) {
                        url = url + '&filter_registered_at=' + registered_at;
                    } else {
                        url = url + '?filter_registered_at=' + registered_at;
                        flag = true;
                    }
                }

                if (registered_at_bs) {
                    if (flag) {
                        url = url + '&filter_registered_at_bs=' + registered_at_bs;
                    } else {
                        url = url + '?filter_registered_at_bs=' + registered_at_bs;
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


        $(".nepalidate-picker").nepaliDatePicker({
            dateFormat: "%D, %M %d, %y",
            closeOnDateSelect: true
        });
        
        $("#filter_registered_at_bs").on("yearChange monthChange dateSelect", function (event) {
            var datePickerData = event.datePickerData;
            if(typeof datePickerData !== "undefined"){
                $('#filter_registered_at').val(moment(datePickerData.adDate).format("YYYY-MM-DD"));   
            }
        });

        $("#filter_registered_at_clear").on('click', function(){
            $('#filter_registered_at_bs').val('');
            $('#filter_registered_at').val('');
        });


    </script>
@endsection