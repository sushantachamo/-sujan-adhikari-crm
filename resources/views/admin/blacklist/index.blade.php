@extends('admin.includes.layout')

@section('content')


    @include('admin.includes.breadcrumb',[
    'base_route' => $base_route,
    'page' => null,
    'panel'=> $panel,
    ])
<link href="{{ asset('/packages/DataTables/datatables.min.css') }}" rel="stylesheet">
    <section class="rounded mb-3">
        @include('admin.includes.flash-notification')
        @if (session()->has('error_bag'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fi fi-close" aria-hidden="true"></span>
                </button>
                @foreach(session()->get('error_bag') as $message)
                    <p>{!! $message[0] !!}</p>
                @endforeach
            </div>
        @endif
        @can('import-'.Illuminate\Support\Str::lower($panel))
            <a type="button" href="{{ route($base_route.'.import') }}"
                class="btn btn-success btn-sm ">
                <i class="fi fi-plus"></i> Import 
            </a>
        @endcan
        <hr>

        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-bordered yajra-datatable table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Blacklist No</th>
                            <th>Blacklist Date</th>
                            <th>Borrower name</th>
                            <th>Associated Person and Firm/Companies</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div><!-- /span -->
    </section>

@endsection

@section('js_scripts')
<script src="{{ asset('/packages/DataTables/datatables.min.js') }}"></script>

<script type="text/javascript">
  $(function () {
    var $table = $('.yajra-datatable').DataTable({
        destroy: true,
        lengthMenu: [[50, 75, 100, -1], [50, 75, 100, "All"]],
        processing: true,
        deferRender: true,
        serverSide: true,
        bDestroy  : true,
        ajax: { url: "{{ route('admin.blacklist.list') }}"},
        oLanguage: {
            sSearch: "<strong>कालोसुचिमा परेका मानिसको नाम </strong>"
            },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'BlacklistNo', name: 'BlacklistNo'},
            {data: 'BlacklistDate', name: 'BlacklistDate'},
            {data: 'BorrowerName', name: 'BorrowerName'},
            {data: 'AssociatedWith', name: 'AssociatedWith'},
        ]
    });
    
  });
</script>
@endsection