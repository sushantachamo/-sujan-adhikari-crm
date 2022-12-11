@extends('admin.includes.layout')

@section('content')


    @include('admin.includes.breadcrumb',[
    'base_route' => $base_route,
    'page' => null,
    'panel'=> $panel,
    ])

    <section class="rounded mb-3">
        @include('admin.includes.flash-notification')

        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-sm">
                    <thead>
                    <tr>
                        <td colspan="7" style="padding-left:5px;">
                            @can('create-'.Illuminate\Support\Str::lower($panel))
                            <a type="button" href="{{ route($base_route.'.create') }}"
                            class="btn btn-custom btn-sm ">
                                <i class="fi fi-plus"></i> New 
                            </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Filename</th>
                        <th>Type</th>
                        <th>Filesize</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody id="table-tbody">

                    @if (count($data['templates']) > 0)
                        @foreach($data['templates'] as $key=>$row)

                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $row['file_name'] }}</td>
                                <td>{{ config('custom.template_folder.'.$row['type']) }}</td>
                                <td>{{ round((int)$row['file_size']/1048576, 2).' MB' }}</td>
                                <td>
                                    <div class="btn-group">
                                        @can('download-'.Illuminate\Support\Str::lower($panel))
                                        <a type="button" href="{{ route($base_route.'.download',['disk'=> $row['disk'], 'path'=> urlencode($row['file_path']) ,  'file_name'=>$row['file_path']])}}"
                                           class="btn btn-icon-only btn-custom btn-sm row-show">
                                            <i class="fi fi-cloud-download"></i> Download
                                        </a>
                                        @endcan
                                        <span>
                                        @can('delete-'.Illuminate\Support\Str::lower($panel))
                                            <button class="btn btn-icon-only btn-danger btn-sm confirm-delete"
                                                    attr="{{ route($base_route.'.destroy',['file_name'=>$row['file_path']]) }}">
                                                <i class="fi fi-thrash"></i> Delete
                                            </button>
                                            {!! Form::open(['url' => route($base_route.'.destroy',['file_name'=>$row['file_path']]), 'method' => 'delete','style'=>'display:none' ]) !!}
                                            {!! Form::close() !!}
                                            @endcan
                                        </span>
                                    </div>



                                </td>
                            </tr>

                        @endforeach
                        <tr>
                            <td colspan="8"></td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="8"><p>No data found.</p></td>
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
        });

    </script>
@endsection