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
        @if($key == 'thisweek' || $key == 'currentmonth' || $key == 'today')
            <div class="col-xl-4 col-lg-4 col-md-4 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <a href="javascript:void(0)" class="weight-700 font-24 text-dark {{$key}}">
                            @if($key == 'today' || $key == 'leadToday')
                                {{ count($data['today']) +  count($data['leadToday']) }}
                            @elseif($key == 'thisweek'  || $key == 'leadThisweek')
                                {{ count($data['thisweek']) +  count($data['leadThisweek']) }}
                            @else    
                                {{ count($data['currentmonth']) +  count($data['leadCurrentmonth']) }}
                            @endif
                            
                            </a>
                            <div class="font-14 text-secondary weight-700 text-uppercase">
                            @if($key == 'thisweek' || $key == 'leadToday')
                                this week
                            @elseif($key == 'currentmonth'  || $key == 'leadThisweek')
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
        @endif
        
    @endforeach
    </div>
    
    <div class="col-md-12 mb-20">
        <div class="card-box pd-20" style="position: relative;">
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-0 pb-md-3">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-sm" id="today" style="display:">
                        <thead>
                            <tr>
                                <th class="bb-0 font-weight-bold fs--14 "> Customer Name</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Last followup Date</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Details of Last followup</th>
                                <th class="bb-0 font-weight-bold fs--14 ">Attachment View</th>
                                <th class="bb-0 font-weight-bold fs--14 ">Assign User</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Next followup Date</th>
                                <th class="bb-0 font-weight-bold fs--14"> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Lead List -->
                            @foreach($data['leadToday'] as $value)
                                <tr class="odd gradeX">
                                    <td>{{ $value->application->borrower_name_en}}</td>
                                    <td>
                                        @php
                                            $year= $value->created_at->format('Y');
                                            $month= $value->created_at->format('m');
                                            $day= $value->created_at->format('d');
                                            $date=Bsdate::eng_to_nep($year,$month,$day);
                                            echo $date['date'].' '.$date['nmonth'].' '.$date['year']
                                        @endphp  
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $value->user->name }}</td>
                                    <td>{{ $value->follow_up_at_bs }}</td>
                                    <td>
                                        <a type="button" href="{{ route('admin.task-activity.create.by.id', $value->application_id) }}"
                                            class="btn btn-icon-only btn-info btn-sm row-create-by-id fs--13" style="padding:0.2rem 0.75rem;margin: 5px 0px">
                                            Create Task
                                        </a>
                                                 
                                    </td>
                                </tr>
                            @endforeach
                            <!-- Task list -->
                            @foreach($data['today'] as $value)
                                <tr class="odd gradeX">
                                    <td>{{ $value->application->borrower_name_en}}</td>
                                    <td>
                                        @php
                                            $year= $value->created_at->format('Y');
                                            $month= $value->created_at->format('m');
                                            $day= $value->created_at->format('d');
                                            $date=Bsdate::eng_to_nep($year,$month,$day);
                                            echo $date['date'].' '.$date['nmonth'].' '.$date['year']
                                        @endphp  
                                    </td>
                                    <td>{{ $value->description }}</td>
                                    <td>
                                    @if(!empty($value->document))
                                        <a href="{{Storage::disk('local')->url($value->document)}}" target="_blank" rel="noopener noreferrer">View Document</a>
                                    @endif
                                    </td>
                                    <td>{{ $value->user->name }}</td>
                                    <td>{{ $value->follow_up_at_bs }}</td>
                                    <td>
                                        @if ($value->order && $value->status)
                                            <a type="button" href="{{ route('admin.task-activity.create.by.id', $value->application_id) }}"
                                                class="btn btn-icon-only btn-info btn-sm row-create-by-id fs--13" style="padding:0.2rem 0.75rem;margin: 5px 0px">
                                                Create
                                            </a>
                                            <a type="button" href="{{ route('admin.task-activity.edit', $value->id) }}"
                                                class="btn btn-icon-only btn-info btn-sm row-edit fs--13" style="padding:0.2rem 0.75rem;margin: 5px 0px">
                                                Edit
                                            </a>
                                            <a type="button" href="{{ route('admin.task-activity.postpond', $value->id) }}"
                                                class="btn btn-icon-only btn-info btn-sm row-postpone fs--13" style="padding:0.2rem 0.75rem;margin: 5px 0px">
                                                Postpone
                                            </a>       
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
                                <th class="bb-0 font-weight-bold fs--14 "> Details of Last followup</th>
                                <th class="bb-0 font-weight-bold fs--14 ">Attachment View</th>
                                <th class="bb-0 font-weight-bold fs--14 ">Assign User</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Next followup Date</th>
                                <th class="bb-0 font-weight-bold fs--14"> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Lead List -->
                            @foreach($data['leadThisweek'] as $value)
                                <tr class="odd gradeX">
                                    <td>{{ $value->application->borrower_name_en}}</td>
                                    <td>
                                        @php
                                            $year= $value->created_at->format('Y');
                                            $month= $value->created_at->format('m');
                                            $day= $value->created_at->format('d');
                                            $date=Bsdate::eng_to_nep($year,$month,$day);
                                            echo $date['date'].' '.$date['nmonth'].' '.$date['year']
                                        @endphp  
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $value->user->name }}</td>
                                    <td>{{ $value->follow_up_at_bs }}</td>
                                    <td>
                                        <a type="button" href="{{ route('admin.task-activity.create.by.id', $value->application_id) }}"
                                            class="btn btn-icon-only btn-info btn-sm row-create-by-id fs--13" style="padding:0.2rem 0.75rem;margin: 5px 0px">
                                            Create Task
                                        </a>
                                                 
                                    </td>
                                </tr>
                            @endforeach
                            <!-- Task list -->
                            @foreach($data['thisweek'] as $value)
                                <tr class="odd gradeX">
                                    <td>{{ $value->application->borrower_name_en}}</td>
                                    <td>
                                        @php
                                            $year= $value->created_at->format('Y');
                                            $month= $value->created_at->format('m');
                                            $day= $value->created_at->format('d');
                                            $date=Bsdate::eng_to_nep($year,$month,$day);
                                            echo $date['date'].' '.$date['nmonth'].' '.$date['year']
                                        @endphp 
                                    </td>
                                    <td>{{ $value->description }}</td>
                                    <td>
                                    @if(!empty($value->document))
                                        <a href="{{Storage::disk('local')->url($value->document)}}" target="_blank" rel="noopener noreferrer">View Document</a>
                                    @endif
                                    </td>
                                    <td>{{ $value->user->name }}</td>
                                    <td>{{ $value->follow_up_at_bs }}</td>
                                    <td>
                                        @if ($value->order && $value->status)
                                            <a type="button" href="{{ route('admin.task-activity.create.by.id', $value->application_id) }}"
                                                class="btn btn-icon-only btn-info btn-sm row-create-by-id fs--13" style="padding:0.2rem 0.75rem;margin: 5px 0px">
                                                Create
                                            </a>
                                            <a type="button" href="{{ route('admin.task-activity.edit', $value->id) }}"
                                                class="btn btn-icon-only btn-info btn-sm row-edit fs--13" style="padding:0.2rem 0.75rem;margin: 5px 0px">
                                                Edit
                                            </a>
                                            <a type="button" href="{{ route('admin.task-activity.postpond', $value->id) }}"
                                                class="btn btn-icon-only btn-info btn-sm row-postpone fs--13" style="padding:0.2rem 0.75rem;margin: 5px 0px">
                                                Postpone
                                            </a>       
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
                                <th class="bb-0 font-weight-bold fs--14 "> Details of Last followup</th>
                                <th class="bb-0 font-weight-bold fs--14 ">Attachment View</th>
                                <th class="bb-0 font-weight-bold fs--14 ">Assign User</th>
                                <th class="bb-0 font-weight-bold fs--14 "> Next followup Date</th>
                                <th class="bb-0 font-weight-bold fs--14"> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Lead List -->
                            @foreach($data['leadCurrentmonth'] as $value)
                                <tr class="odd gradeX">
                                    <td>{{ $value->application->borrower_name_en}}</td>
                                    <td>
                                        @php
                                            $year= $value->created_at->format('Y');
                                            $month= $value->created_at->format('m');
                                            $day= $value->created_at->format('d');
                                            $date=Bsdate::eng_to_nep($year,$month,$day);
                                            echo $date['date'].' '.$date['nmonth'].' '.$date['year']
                                        @endphp  
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $value->user->name }}</td>
                                    <td>{{ $value->follow_up_at_bs }}</td>
                                    <td>
                                        <a type="button" href=""
                                            class="btn btn-icon-only btn-info btn-sm row-create-by-id fs--13" style="padding:0.2rem 0.75rem;margin: 5px 0px">
                                            Create Task
                                        </a>
                                                 
                                    </td>
                                </tr>
                            @endforeach
                            <!-- Task list -->
                            @foreach($data['currentmonth'] as $value)
                                <tr class="odd gradeX">
                                    <td>{{ $value->application->borrower_name_en}}</td>
                                    <td>
                                        @php
                                            $year= $value->created_at->format('Y');
                                            $month= $value->created_at->format('m');
                                            $day= $value->created_at->format('d');
                                            $date=Bsdate::eng_to_nep($year,$month,$day);
                                            echo $date['date'].' '.$date['nmonth'].' '.$date['year']
                                        @endphp 
                                    </td>
                                    <td>{{ $value->description }}</td>
                                    <td>
                                    @if(!empty($value->document))
                                        <a href="{{Storage::disk('local')->url($value->document)}}" target="_blank" rel="noopener noreferrer">View Document</a>
                                    @endif
                                    </td>
                                    <td>{{ $value->user->name }}</td>
                                    <td>{{ $value->follow_up_at_bs }}</td>
                                    <td>
                                        @if ($value->order)
                                            <a type="button" href="{{ route('admin.task-activity.create.by.id', $value->application_id) }}"
                                                class="btn btn-icon-only btn-info btn-sm row-create-by-id fs--13" style="padding:0.2rem 0.75rem;margin: 5px 0px">
                                                Create
                                            </a>
                                            <a type="button" href="{{ route('admin.task-activity.edit', $value->id) }}"
                                                class="btn btn-icon-only btn-info btn-sm row-edit fs--13" style="padding:0.2rem 0.75rem;margin: 5px 0px">
                                                Edit
                                            </a>
                                            <a type="button" href="{{ route('admin.task-activity.postpond', $value->id) }}"
                                                class="btn btn-icon-only btn-info btn-sm row-postpone fs--13" style="padding:0.2rem 0.75rem;margin: 5px 0px">
                                                Postpone
                                            </a>       
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

@endsection
