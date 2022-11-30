@extends('admin.includes.layout')

@section('content')
<link rel="stylesheet" href="https://dropways.github.io/deskapp/vendors/styles/style.css">
<link rel="stylesheet" href="https://dropways.github.io/deskapp/vendors/styles/icon-font.min.css">
<?php $site_info = ViewHelper::getSiteInfo();  ?>
<div class="xs-pd-20-10 pd-ltr-20">
    <div class="title pb-20">
        <h2 class="h3 mb-0 text-uppercase">Crm Dashboard</h2>
    </div>

    <div class="row pb-10">
    @foreach($data as $key => $value)
        <div class="col-xl-4 col-lg-4 col-md-4 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <a href="javascript:void(0)" class="weight-700 font-24 text-dark {{$key}}">
                        {{count($value)}}
                        </a>
                        <div class="font-14 text-secondary weight-700 text-uppercase">
                        @if($key == 'thisweek')
                            this week
                        @elseif($key == 'currentmonth')
                            current month
                        @else    
                            {{$key}}
                        @endif
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#00eccf" style="color: rgb(0, 236, 207);">
                            <i class="icon-copy dw dw-calendar1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    
    <div class="col-md-12 mb-20" id="test">
        <div class="card-box height-100-p pd-20" style="position: relative;">
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-0 pb-md-3">
                <div class="form-group mb-md-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-sm" id="today">
                            <thead>
                                <tr>
                                    <th class="bb-0 font-weight-bold fs--14 "> Customer Name</th>
                                    <th class="bb-0 font-weight-bold fs--14 "> Last followup Date</th>
                                    <th class="bb-0 font-weight-bold fs--14 "> Last followup User</th>
                                    <th class="bb-0 font-weight-bold fs--14 "> Details of Last followup</th>
                                    <th class="bb-0 font-weight-bold fs--14 ">Attachment View Option</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data['today'] as $key => $row)
                                <tr class="odd gradeX">
                                    <td>{{ $row->application->borrower_name_en}}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>
                                    @if (!$loop->last)
                                        {{ $value[$key]->user->name}}
                                    @else
                                        {{ $row->user->name }}
                                    @endif
                                    </td>
                                    <td>{{ $row->description }}</td>
                                    <td>
                                    @if(!empty($row->document))
                                        <a href="{{Storage::disk('local')->url($row->document)}}" target="_blank" rel="noopener noreferrer">View Document</a>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <table class="table table-hover table-bordered table-sm" id="thisweek" style="display:none">
                            <thead>
                                <tr>
                                    <th class="bb-0 font-weight-bold fs--14 "> Customer Name</th>
                                    <th class="bb-0 font-weight-bold fs--14 "> Last followup Date</th>
                                    <th class="bb-0 font-weight-bold fs--14 "> Last followup User</th>
                                    <th class="bb-0 font-weight-bold fs--14 "> Details of Last followup</th>
                                    <th class="bb-0 font-weight-bold fs--14 ">Attachment View Option</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data['thisweek'] as $key => $row)
                                <tr class="odd gradeX">
                                    <td>{{ $row->application->borrower_name_en}}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>
                                    @if (!$loop->last)
                                        {{ $value[$key]->user->name}}
                                    @else
                                        {{ $row->user->name }}
                                    @endif
                                    </td>
                                    <td>{{ $row->description }}</td>
                                    <td>
                                    @if(!empty($row->document))
                                        <a href="{{Storage::disk('local')->url($row->document)}}" target="_blank" rel="noopener noreferrer">View Document</a>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <table class="table table-hover table-bordered table-sm" id="currentmonth" style="display:none">
                            <thead>
                                <tr>
                                    <th class="bb-0 font-weight-bold fs--14 "> Customer Name</th>
                                    <th class="bb-0 font-weight-bold fs--14 "> Last followup Date</th>
                                    <th class="bb-0 font-weight-bold fs--14 "> Last followup User</th>
                                    <th class="bb-0 font-weight-bold fs--14 "> Details of Last followup</th>
                                    <th class="bb-0 font-weight-bold fs--14 ">Attachment View Option</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data['currentmonth'] as $key => $row)
                                <tr class="odd gradeX">
                                    <td>{{ $row->application->borrower_name_en}}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>
                                    @if (!$loop->last)
                                        {{ $value[$key]->user->name}}
                                    @else
                                        {{ $row->user->name }}
                                    @endif
                                    </td>
                                    <td>{{ $row->description }}</td>
                                    <td>
                                    @if(!empty($row->document))
                                        <a href="{{Storage::disk('local')->url($row->document)}}" target="_blank" rel="noopener noreferrer">View Document</a>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
