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

            <div class="row">
                <div class="col-md-12">
                    @can('create-'.Illuminate\Support\Str::lower($panel))
                        <a type="button" href="{{ route($base_route.'.create') }}"
                           class="btn btn-custom btn-sm ">
                            <i class="fi fi-plus"></i> New 
                        </a>

                        <hr>
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
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            @can('update-'.Illuminate\Support\Str::lower($panel))
            {!! Form::open(['url' => route($base_route.'.update-rank'), 'method' => 'post', 'id' => 'sorting-update-form', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            @endcan
           <div class="table-responsive">
                <table class="table table-hover table-bordered table-sm">
                    <thead>
                    <tr>
                        <th>Caption Title</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th> Action</th>
                    </tr>
                    </thead>
                    @can('update-'.Illuminate\Support\Str::lower($panel))
                        <tbody id="table-tbody">
                    @else
                        <tbody id="item_list">
                    @endcan

                        @if ($data['rows']->count() > 0)
                            @foreach($data['rows'] as $key => $row)
                            <tr class="odd gradeX">
                                <input type="hidden" id="hidden_id" name="hidden_id[]" value="{{ $row->id }}">
                                <td>{{ $row->caption_title }}</td>
                                <td> 
                                    <img class="img-responsive thumbnail" style="width:80px" src="{{ViewHelper::getImagePath('sliders', $row->image)}}" alt="{{ $row->alt_text }}"/> 
                                </td>
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
                                            <button class="btn btn-icon-only btn-danger
                                            btn-sm confirm-delete-button" value = "{{$row->id}}">
                                                <i class="fi fi-thrash"></i>
                                            </button>
                                        @endcan
                                    </div>
                                </td>
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
                                <td colspan="7">
                                    <center>No data found.</center>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            @can('update-'.Illuminate\Support\Str::lower($panel))
            {!! Form::close() !!}
            @endcan

            <!-- END SAMPLE TABLE PORTLET-->
        </div><!-- /span -->
    </section>

@endsection

@section('js_scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            $('.confirm-delete-button').on('click', function (event) {
                event.preventDefault();
                var id = $(this).val();
                Swal.fire({
                    title: 'Do you want to delete?',
                    text: "You won't be able to revert this!",
                    type: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    html: false
                }).then((result) => {
                    if (result.value) {
                        var url = '{{ route($base_route.'.index') }}';
                        $.ajax({
                            url: '{{ route($base_route.'.destroy') }}',
                            method: 'delete',
                            data: {
                                _token: '{{ csrf_token() }}',
                                key: id,
                                action: 'edit',
                            },
                            success: function (response) {
                                location.reload();

                            }
                        });
                    }
                })
            })

        });


    </script>

    @include('admin.includes.jquery_sortable')
    
@endsection