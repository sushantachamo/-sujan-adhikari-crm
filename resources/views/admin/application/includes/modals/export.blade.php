<div class="modal fade" tabindex="-1" role="dialog" id="modalShowExport">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Export
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="" id="export_form" type="POST">
                    {!! Form::open(['url' => '', 'method' => 'post','id' => 'export_form']) !!}
                    <input type="hidden" id="export_id" name="id" >
                    <input type="hidden" id="export_template" name="template" >
                    <div class="form-group">
                        <label>Export Date:</label><span class="text-danger">*</span>
                        <div class="input-group">
                            {!! Form::text('today_bs', null, ['class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'today_bs']) !!}
                            {!! Form::text('today', null, ['class' => 'hidden', 'style'=>'display:none', 'id' => 'today']) !!}
                            <span class="input-group-btn">
                                <button class="btn  btn-sm btn-danger" type="button" id="today_clear"><i class="fi fi-close"></i></button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <a id="pdfExport" class="btn btn-sm btn-info"><i class="fi fi-arrow-download"></i> PDF </a>
                        <a id="wordExport" class="btn btn-sm btn-warning"><i class="fi fi-arrow-download"></i> Words </a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div><!-- end of modal-delete-staff-image -->