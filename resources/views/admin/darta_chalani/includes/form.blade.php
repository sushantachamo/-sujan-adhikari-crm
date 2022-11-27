<div class="panel panel-default">
    <div class="panel-body">
        <h4 class="text-center">{{ $title }}</h4>
        <div class="row">
            <div class="form-group col-md-4 col-sm-4">
                {!! Form::hidden('record_type', $record_type) !!}

                <label for="register_number">{{ $record_type=='darta' ? 'दर्ता नं:': 'चलानी नं:' }} <span class="text-danger">*</span></label>
                {!! Form::text('register_number', isset($data['row']->register_number) ? $data['row']->register_number : null, ('' == 'required') ?
                ['class' => 'form-control form-control-sm register_number ', 'required' => 'required'] :
                ['class' => 'form-control form-control-sm register_number']) !!}
            </div> 
            <div class="form-group col-md-4 col-sm-4">
                <label for="fiscal_year">आर्थिक बर्ष: <span class="text-danger">*</span></label>
                {!! Form::select('fiscal_year', $data['fiscal_years'], isset($data['row']->fiscal_year) ? $data['row']->fiscal_year : null, ('' == 'required') ? ['class' => 'form-control form-control-sm', 'required' => 'required'] : ['class' => 'form-control form-control-sm']) !!}

            </div>
            <div class="form-group col-md-4 col-sm-4">
                <label for="{{ config('fields.loan_details.registered_at.key') }}"> {{ config('fields.loan_details.registered_at.name_np') }}	</label> {!! config('fields.loan_details.registered_at.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                <div class="input-group">
                    {!! Form::text('registered_at_bs', isset($data['row']['registered_at_bs'])?$data['row']['registered_at_bs']:(isset($rawApplicant)? $rawApplicant['registered_at_bs'] : null), ['placeholder' => config('fields.loan_details.registered_at.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'registered_at_bs']) !!}
                    {!! Form::text('registered_at', isset($data['row']['registered_at']) ? $data['row']['registered_at']->format('Y-m-d') : (isset($rawApplicant['registered_at'])? $rawApplicant['registered_at']->format('Y-m-d'):null), ['class' => 'hidden', 'style'=>'display:none', 'id' => 'registered_at']) !!}
                    <span class="input-group-btn">
                        <button class="btn  btn-sm btn-danger" type="button" id="registered_at_clear"><i class="fi fi-close"></i></button>
                    </span>
                </div>
            </div>

            <div class="form-group col-md-12 col-sm-12">
                <label for="office_or_person">कार्यालय/व्यक्तिको नाम, ठेगाना<span class="text-danger">*</span></label>
                {!! Form::text('office_or_person', null, ('' == 'required') ?
                ['class' => 'form-control form-control-sm office_or_person ', 'required' => 'required'] :
                 ['class' => 'form-control form-control-sm office_or_person']) !!}
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for="subject">बिषय: <span class="text-danger">*</span></label>
                {!! Form::text('subject', null, ('' == 'required') ?
                ['class' => 'form-control form-control-sm subject ', 'required' => 'required'] :
                 ['class' => 'form-control form-control-sm subject']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3 col-sm-3">
                <label for="tag">फाइल :<span class="text-danger">*</span></label>
                <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                @if(isset($data['row']) && $data['row']->filename != null)
                <br>
                <div class="btn-group" style="width:100%">
                    <a href="{{ route('admin.file_link', ['record_id'=> $data['row']->record_id, 'filename'=>$data['row']->filename ]) }}" target="_blank" class="btn btn-sm btn-success">
                        Preview
                    </a>
                    <a class="btn btn-sm btn-danger text-white deletebtn" filename="{{ $data['row']->filename}}" record_id="{{ $data['row']->record_id }}">
                        Delete
                    </a>
                    
                </div>
                <a href="{{ route('admin.file_link', ['record_id'=> $data['row']->record_id, 'filename'=>$data['row']->filename ]) }}" target="_blank">
                    <img src="{{ asset('images/logo/file.png') }}" width="100%">
                </a>
                @else
                    <div class="input-group mb-3">
                        <div class="custom-file custom-file-sm custom-file-primary">
                            {!! Form::file('filename', ['class' => 'custom-file-input', 'id'=>'inputGroupFile01']) !!}
                            {!! Form::label('filename', 'Choose file', ['class' => 'custom-file-label']) !!}
                            
                        </div>
                    </div>
                @endif

            </div>
            <div class="col-md-9 col-sm-9">
                <div class="form-group">
                    <label for="remarks">कैफियत:</label>
                    {!! Form::textarea('remarks', null, ['class' => 'form-control ckeditor', 'id' => 'letter_details']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <div class="form-group">
                    <label for="identity_person">जिम्मेवार व्यक्ति:</label>
                    {!! Form::text('identity_person', null, ('' == 'required') ?
                    ['class' => 'form-control form-control-sm identity_person '] :
                    ['class' => 'form-control form-control-sm identity_person']) !!}        
                </div>
            </div>
            
            <div class="form-group col-md-3 col-sm-3">
                {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
                <label class="radio">
                    {!! Form::radio('status', 1 , true); !!}
                    <i></i>Active

                </label>
                <label class="radio">
                    {!! Form::radio('status', 0 , false); !!}
                    <i></i>Inactive
                </label>
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <button type="submit" name="submit" class="btn btn-sm btn-success"> {{ $button }} </button>
        <a type="button" href="{{ route($base_route.'.index') }}"
           class="btn btn-sm btn-danger row-edit">
            Cancel
        </a>
    </div>
</div>
</div>
<div class="models">
    @include('admin.darta_chalani.includes.modal_delete_file')
</div>

@section('post_scripts')

    <script type="text/javascript">

        $(document).ready(function () {
            customDatePicker('registered_at');
            $(".deletebtn").click(function(e){
                e.preventDefault();
                $filename = $(this).attr('filename');
                $record_id = $(this).attr('record_id');

                var url = '{{ route("admin.darta_chalani.deleteFile",["record_id"=>":record_id", "filename"=>":filename"]) }}';


                url = url.replace(':filename', $filename);

                url = url.replace(':record_id', $record_id);

                $("#filename").text($filename);
                $("#record_id").text($record_id);

                $('#submit_file_delete').attr('href', url);
                $("#modal-delete-file").modal('show');
            });

    });

    </script>
@endsection


