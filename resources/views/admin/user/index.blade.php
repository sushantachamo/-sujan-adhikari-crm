@extends('admin.includes.layout')

@section('content')


    @include('admin.includes.breadcrumb',[
    'base_route' => $base_route,
    'page' => null,
    'panel'=> $panel,
    ])

    <section class="rounded mb-3">
        @include('admin.includes.flash-notification')
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="row">
                <div class="col-md-12">
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
                            <a type="button" href="{{ route($base_route.'.create') }}"
                               class="btn btn-custom btn-sm ">
                                <i class="fi fi-plus"></i> New 
                            </a>
                        @endcan
        
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
                         
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-sm">
                        <thead>
                        <tr>
                            <th class="center">
                            </th>
                            <th>पुरा नाम</th>
                            <th>ईमेल</th>
                            <th>सहकारी</th>
                            <th>भूमिकाहरु</th>
                            <th>Created at</th>
                            <th>अवस्ता</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td> {!! Form::text('filter_name', isset($data['request']['filter_name'])?$data['request']['filter_name']:null, ['placeholder' => 'पुरा नाम', 'class' => 'form-control form-control-sm']) !!}</td>
                            <td>  {!! Form::text('filter_email', isset($data['request']['filter_email'])?$data['request']['filter_email']:null, ['placeholder' => 'इमेल', 'class' => 'form-control form-control-sm']) !!}</td>
                            <td>  {!! Form::text('filter_office_name', isset($data['request']['filter_office_name'])?$data['request']['filter_office_name']:null, ['placeholder' => 'सहकारी ', 'class' => 'form-control form-control-sm']) !!}</td>
                            <td></td>
                            <td> 

                                <div class="input-group mb-3">
                                    {!! Form::text('filter_created_at_bs', isset($data['request']['filter_created_at_bs'])?$data['request']['filter_created_at_bs']:null, ['placeholder' => 'Published Date', 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD', 'id' => 'filter_created_at_bs']) !!}
                                    {!! Form::text('filter_created_at', isset($data['request']['filter_created_at'])?$data['request']['filter_created_at']:null, ['class' => 'hidden', 'style'=>'display:none', 'id' => 'filter_created_at']) !!}
                                    <div class="input-group-append">
                                        <button class="btn btn-danger btn-sm" type="button" id="filter_created_at_clear"><i class="fi fi-close"></i></button>
                                    </div>

                                </div>
                            </td>
                            <td>  {!! Form::select('filter_status',['all' => 'All', 'active' => 'Active', 'inactive' => 'Inactive'], isset($data['request']['filter_status'])?$data['request']['filter_status']:null, ['class' => 'form-control form-control-sm']) !!}</td>
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
                        </thead>

                        <tbody id="table-tbody">

                        @if ($data['rows']->count() > 0)
                            @foreach($data['rows'] as $row)

                                <tr>

                                    <td class="center">
                                        <label>
                                            <input type="checkbox" class="ace row_id" value="{{ $row->id }}"/>
                                            <span class="lbl"></span>
                                        </label>
                                    </td>
                                    <td class="hidden-480">{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->office()->first() ? $row->office()->first()->name_np : '--' }}</td>
                                    <td>
                                        @foreach($row->roles()->get() as $role)

                                            <span class="badge badge-primary"> {{ Illuminate\Support\Str::ucfirst($role->name) }}</span>

                                        @endforeach
                                    </td>
                                    <td><span class="nepaliDate" englishDate="{{ $row->created_at->format('Y-m-d') }}"></span></td>
                                    <td class="hidden-480">
                                        @if($row->status == 1)
                                            <span class="badge badge-sm badge-success"> Active </span>
                                        @else
                                            <span class="badge badge-sm badge-warning"> InActive </span>
                                        @endif                                                                              
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            @can('show-'.Illuminate\Support\Str::lower($panel))
                                            <a type="button" href="{{ route($base_route.'.show', $row->id) }}"
                                               class="btn btn-icon-only btn-custom btn-sm row-show">
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
                                            @if ($row->isDeletable())
                                                <button class="btn btn-icon-only btn-danger btn-sm confirm-delete"
                                                        attr="{{ route($base_route.'.destroy', $row->id) }}">
                                                    <i class="fi fi-thrash"></i>
                                                </button>
                                                {!! Form::open(['url' => route($base_route.'.destroy',$row->id), 'method' => 'delete','style'=>'display:none' ]) !!}
                                                {!! Form::close() !!}
                                            @endif
                                            @endcan

                                        </div>

                                    </td>
                                </tr>

                            @endforeach
                            <tr>
                                <td colspan="7">
                                    <span style="margin: 10px 0px; display: block; text-align: left; float: left; line-height: 35px;"> Showing {{ $data['rows']->perPage() * ($data['rows']->currentPage()-1)+1 }}
                                        to {{ $data['rows']->perPage() * ($data['rows']->currentPage()-1)+$data['rows']->count() }}
                                        of {{ $data['rows']->total() }} entries</span>
                                    <span class="float-right">{!! $data['rows']->appends(request()->query())->links() !!}</span>
                                </td>
                            </tr>
                        @else
                            <tr>
                                
                                <td colspan="7"><p>No data found.</p></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
            </div>
        </div>
    </section>

@endsection

@section('js_scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#form-filter-btn').click(function () {
                var url = '{{ route($base_route.'.index') }}';
                var name = $('input[name="filter_name"]').val();
                var office_name = $('input[name="filter_office_name"]').val();
                var email = $('input[name="filter_email"]').val();
                var created_at = $('input[name="filter_created_at"]').val();
                var created_at_bs = $('input[name="filter_created_at_bs"]').val();
                var status = $('select[name="filter_status"]').val();
                var flag = false;

                if (name) {
                    url = url + '?filter_name=' + name;
                    flag = true;
                }

                if (email) {
                    if (flag) {
                        url = url + '&filter_email=' + email;
                    } else {
                        url = url + '?filter_email=' + email;
                        flag = true;
                    }
                }
                if (office_name) {
                    if (flag) {
                        url = url + '&filter_office_name=' + office_name;
                    } else {
                        url = url + '?filter_office_name=' + office_name;
                        flag = true;
                    }
                }

                if (created_at) {
                    if (flag) {
                        url = url + '&filter_created_at=' + created_at;
                    } else {
                        url = url + '?filter_created_at=' + created_at;
                        flag = true;
                    }
                }

                if (created_at_bs) {
                    if (flag) {
                        url = url + '&filter_created_at_bs=' + created_at_bs;
                    } else {
                        url = url + '?filter_created_at_bs=' + created_at_bs;
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


        customDatePicker('filter_created_at')
        if($('#filter_created_at').val() !== '')
        {
            $to_date = $('#filter_created_at').val();
            $bs_date = NepaliFunctions.AD2BS(NepaliFunctions.ParseDate($to_date).parsedDate);
            $('#filter_created_at_bs').val(NepaliFunctions.ConvertDateFormat($bs_date), "YYYY-MM-DD");
        }
        else
        {
            $('#filter_created_at').val('');
        }

    </script>
@endsection