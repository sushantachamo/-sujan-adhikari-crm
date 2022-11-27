@extends('admin.includes.layout')

@section('content')


    @include('admin.includes.breadcrumb',[
    'base_route' => $base_route,
    'page' => null,
    'panel'=> $panel,
    ])

    <section class="rounded mb-3">
        @include('admin.includes.flash-notification')
        <div class="col-xs-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="row">
                <div class="col-md-12">
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
                    <a type="button" href="{{ route($base_route.'.create') }}"
                       class="btn btn-custom btn-sm ">
                        <i class="fi fi-plus"></i> New 
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
                           class="btn btn-custom btn-sm " data-toggle="tooltip" title="Active Records">
                            <i class="fa fa-refresh"></i>Active Lists
                        </a>
                    </div>
                    @endcan
                @endif
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-sm">
                    <thead>
                    <tr>
                        @if($data['is_trash'] == false)
                            <th></th>
                        @endif
                        <th>सहकारीको नाम</th>
                        <th>सहकारीको ठेगाना</th>
                        <th>एजेन्टको नाम</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @if($data['is_trash'] == false)
                    <tr>
                        <td></td>
                        <td>{!! Form::text('filter_name', isset($data['request']['filter_name'])?$data['request']['filter_name']:null, ['placeholder' => 'Enter name', 'class' => 'form-control form-control-sm']) !!}</td>
                        <td></td>
                        <td>{!! Form::text('filter_agent_name', isset($data['request']['filter_agent_name'])?$data['request']['filter_agent_name']:null, ['placeholder' => 'Enter Agent name', 'class' => 'form-control form-control-sm']) !!}</td>
                        <td>{!! Form::select('filter_status',['' => 'All', 'active' => 'Active', 'inactive' => 'Inactive'], isset($data['request']['filter_status'])?$data['request']['filter_status']:null, ['class' => 'form-control form-control-sm']) !!}</td>
                        <td>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-warning btn-sm" id="form-filter-btn">
                                    <i class="fi fi-search"></i>
                                </button>
                                <a href="{{ route($base_route.'.index') }}" class="btn btn-dark btn-sm">
                                    <i class="fi fi-reload"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endif
                    </thead>
                    <tbody id="table-tbody">
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

                                <td>{{ $row->name_np }} ({{ $row->name_en }})</td>
                                <td>{{ ViewHelper::getFullAddress($row) }}</td>
                                <td>{{ $row->agent_name ?: 'Direct' }}</td>
                                <td>
                                    @if($row->status == 1)
                                            <span class="badge badge-sm badge-success"> Active </span>
                                    @else
                                        <span class="badge badge-sm badge-warning"> InActive </span>
                                    @endif    
                                    @if($row->deleted_at != null)
                                        <span class="badge badge-sm badge-danger"> Deleted </span>
                                    @endif

                                    @if($row->expiration_date != null)
                                        @if($row->expiration_date > Carbon\Carbon::now())
                                            <span class="badge badge-sm badge-success"> {{ $row->expiration_date->diffForHumans();}} </span>
                                        @else 
                                            <span class="badge badge-sm badge-danger">Expired: {{ $row->expiration_date->diffForHumans();}} </span>
                                        @endif
                                    @endif
                                </td>
                                @if($data['is_trash'] ==true)
                                    <td>
                                        <div class="btn-group">
                                            @can('show-'.Illuminate\Support\Str::lower($panel))
                                            <a type="button" href="{{ route($base_route.'.show', $row->id) }}"
                                               class="btn btn-icon-only btn-custom btn-sm row-show">
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
                                <span class="float-right">{!! $data['rows']->appends(request()->query())->links() !!}</span>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="8">
                               <center> No data found. </center>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>

            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div><!-- /span -->

    </section>
@endsection

@section('js_scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#form-filter-btn').click(function () {
            var url = '{{ route($base_route.'.index') }}';
            var registration_number = $('input[name="filter_registration_number"]').val();
            var name = $('input[name="filter_name"]').val();
            var agent_name = $('input[name="filter_agent_name"]').val();
            var created_at = $('input[name="filter_created_at"]').val();
            var status = $('select[name="filter_status"]').val();
            var flag = false;

            if (name) {
                url = url + '?filter_name=' + name;
                flag = true;
            }
            if (agent_name) {
                if (flag) {
                    url = url + '&filter_agent_name=' + agent_name;
                } else {
                    url = url + '?filter_agent_name=' + agent_name;
                    flag = true;
                }
            }
            if (registration_number) {
                if (flag) {
                    url = url + '&filter_registration_number=' + registration_number;
                } else {
                    url = url + '?filter_registration_number=' + registration_number;
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