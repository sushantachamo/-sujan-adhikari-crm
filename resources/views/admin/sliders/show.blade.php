@extends('admin.includes.layout')

@section('content')

    @include('admin.includes.breadcrumb', [
       'base_route' => $base_route,
       'page' => 'रिपोर्ट'
   ])

    <section class="rounded mb-3">
        <div class="row">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="10%">Column</th>
                            <th width="40%">Value</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <th>Id</th>
                            <td>{{ $data['row']->id }}</td>
                        </tr>
                        <tr>
                            <th>Caption Title English</th>
                            <td>{{$data['row']->caption_title}}</td>
                        </tr>
                        <tr>
                            <th>Caption Body English</th>
                            <td>{{$data['row']->caption_body}}</td>
                        </tr>
                        <tr>
                            <th>Alt Text</th>
                            <td>{{$data['row']->alt_text}}</td>
                        </tr>
                        <tr>
                            <th>Rank</th>
                            <td>{{$data['row']->rank}}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td>
                                @if($data['row']->image)
                                    <img src="{{ ViewHelper::getImagePath($folder, $data['row']->image) }}" width="600">
                                    @else
                                    <img src="{{ ViewHelper::getImagePath($folder, 'no_image.gif') }}" width="200" class="img-responsive">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                               @if($data['row']->status == 1)
                                    <span class="label label-sm label-success">Active</span>
                                   @else
                                    <span class="label label-sm label-warning">Inctive</span>
                                   @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Created Date</th>
                            <td>{{$data['row']->created_at}}</td>
                        </tr>
                        <tr>
                            <th>Last Update Date</th>
                            <td>{{$data['row']->updated_at}}</td>
                        </tr>
                        </tbody>
                    </table>
                    </table>
                </div><!-- /.table-responsive -->
            </div>
            <div class="col-md-4">
                @if(isset($data['activitylogs']))
                    @include('admin.includes.activity_lists')
                @endif
            </div>
        </div>
    </section>

@endsection
