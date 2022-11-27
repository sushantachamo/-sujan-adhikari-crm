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

                                <a class="dropdown-item bulk_list" id="{{ $key }}">{{ $value == "Inactive" ? "Task Close" : $value }}</a>
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
                        class="btn btn-success btn-sm ">
                        <i class="fi fi-plus"></i> नयाँ {{ config('custom.record_types.darta') }}
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
                                <th class="bb-0 font-weight-bold fs--14 "> Customer Name English</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Customer Account Number</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Last followup Date</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Last followup User</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Details of Last followup</th>
                                <th class="bb-0 font-weight-bold fs--14 ">Attachment View Option</th>
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
                                    <td>{{ $row->application->borrower_name_en}}</td>
                                    <td>{{ $row->application->borrower_name}}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>{{ $row->user->name}}</td>
                                    <td>{{ $row->description }}</td>
                                    <td>
                                        @if(!empty($row->document))
                                            <a href="{{Storage::disk('public')->url($row->document)}}" target="_blank" rel="noopener noreferrer">View Document</a>
                                        @endif
                                    </td>
                                    <td>
                                    @can('update-'.Illuminate\Support\Str::lower($panel))
                                        <a type="button" href="{{ route($base_route.'.edit', $row->id) }}"
                                            class="btn btn-icon-only btn-info btn-sm row-edit">
                                            <i class="fi fi-pencil"></i>
                                        </a>
                                        <a type="button" href="{{ route($base_route.'.postpond', $row->id) }}"
                                            class="btn btn-icon-only btn-info btn-sm row-edit">
                                            <i class="fi fi-pencil"></i>
                                        </a>
                                    @endcan
                                    </td>
                                </tr>
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

@section('js_scripts')
@endsection