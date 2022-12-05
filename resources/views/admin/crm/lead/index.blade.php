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
                                @if($key == "inactive")
                                    <a class="dropdown-item bulk_list" id="{{ $key }}">{{ $value == "Inactive" ? "Lead Close" : $value }}</a>
                                @endif
                            @endforeach
                        </div>
                        {!! Form::open(['url' => route($base_route.'.bulk-action'), 'method' => 'POST', 'id' => 'bulk-action-form', 'class' =>"display:none"]) !!}
                            {!! Form::hidden('row_ids', null, ['class' => 'row_ids']) !!}
                            {!! Form::hidden('bulk_action', null, ['class' => 'bulk_action']) !!}
                            {!! Form::close() !!}
                    </div>
                @endif

                <div class="dropdown show float-left">
                    <a class="btn border-info btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action <i class="fi fi-arrow-down-full "></i>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a href="{{ route($base_route.'.index') }}?status=true" class="dropdown-item" name="true">Active</a>
                        <a href="{{ route($base_route.'.index') }}?status=false" class="dropdown-item" id="false">InActive</a>
                    </div>
                    
                </div>

                <div class="dropdown show float-right">
                    <label>Search:<input type="search" class="form-control form-control-sm" placeholder="Search Customer" id="leadCustomerSearch"></label>
                </div>

                @can('create-'.Illuminate\Support\Str::lower($panel))
                    <a type="button" href="{{ route($base_route.'.create') }}"
                        class="btn btn-success btn-sm ">
                        <i class="fi fi-plus"></i> Create Lead
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
                
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-sm">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="bb-0 font-weight-bold fs--14 "> Customer Name</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Customer Name English</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Phone Number</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Address(Tole)</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Follow Up Date</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Assign User</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Actions</th>
                            </tr>
                        </thead>
                        <tbody id="item_list">
                        @if ($data['rows']->count() > 0)
                            @foreach($data['rows'] as $row)
                                <tr class="odd gradeX">
                                    <td class="center">
                                        @can('update-'.Illuminate\Support\Str::lower($panel))
                                        <label>
                                            <input type="checkbox" class="checkboxes" value="{{ $row->id }}"/>
                                        </label>
                                        @endcan
                                    </td>
                                    <td>{{$row->application->borrower_name}}</td>
                                    <td>{{$row->application->borrower_name_en}}</td>
                                    <td>{{$row->application->contact_number}}</td>
                                    <td>{{$row->application->b_t_tole}}</td>
                                    <td>{{$row->follow_up_at_bs}}</td>
                                    <td>{{$row->user->name}} </td>
                                    <td>
                                        @if($row->status)
                                            @can('update-'.Illuminate\Support\Str::lower($panel))
                                            <a type="button" href="{{ route($base_route.'.edit', ['lead'=>$row->id, 'form-name'=>'lead_details']) }}"
                                                class="btn btn-icon-only btn-info btn-sm row-edit fs--13" style="padding:0.2rem 0.75rem">
                                                Edit
                                            </a>
                                            <a type="button" href="{{ route($base_route.'.status', ['id'=>$row->id, 'form-name'=>'lead_details']) }}"
                                                class="btn btn-icon-only btn-info btn-sm row-edit fs--13 " style="padding:0.2rem 0.75rem">
                                                Lead Close
                                            </a>
                                            <a type="button" href="{{ route($base_route.'.delete', ['id'=>$row->id, 'form-name'=>'lead_details']) }}"
                                                class="btn btn-icon-only btn-info btn-sm row-edit fs--13 " style="padding:0.2rem 0.75rem">
                                                Delete
                                            </a>
                                            @endcan
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
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
            $("#leadCustomerSearch").on('keyup', function (e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                   let url = window.location.origin + "/admin/crm/lead?search=" + this.value ;
                    location.replace(url);
                }
            });
        });
    </script>
@endsection