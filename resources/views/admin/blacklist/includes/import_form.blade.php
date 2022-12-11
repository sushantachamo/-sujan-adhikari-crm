<div class="row">
    <div class="col-md-12">
        <label for="blacklist_published_at_bs">Updated Date: <span class="text-danger">*</span></label>
        <div class="input-group">
            {!! Form::text('blacklist_published_at_bs', isset($data['rows']['blacklist_published_at_bs'])?$data['rows']['blacklist_published_at_bs']:null, ['placeholder' => 'Updated Date', 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'blacklist_published_at_bs']) !!}
            {!! Form::text('blacklist_published_at', isset($data['rows']['blacklist_published_at']) ? $data['rows']['blacklist_published_at'] : (isset($data['rows']['blacklist_published_at'])? $data['rows']['blacklist_published_at']->format('Y-m-d'):null), ['class' => 'hidden', 'style'=>'display:none', 'id' => 'blacklist_published_at']) !!}
            <span class="input-group-btn">
                <button class="btn  btn-sm btn-danger" type="button" id="blacklist_published_at_clear"><i class="fi fi-close"></i></button>
            </span>
        </div>
        
        <fieldset>
            <legend>Import File</legend>
                <div class="form-group">
                    <label for="import_file">File <span class="text-danger">*</span></label>
                    <div style="width:100%">
                        {!! Form::file('import_file') !!}
                    </div>
                </div>
        </fieldset>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <hr>
        <fieldset>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" name="submit" class="btn btn-primary"
                             name="{{ strtolower($button)}}"
                             value="{{strtolower($button)}}"> {{ $button }}
                     </button>
                   
                    <a type="button" href="{{ route($base_route.'.index') }}"
                       class="btn btn-danger row-edit">
                        Cancel
                    </a>
                </div>
            </div>

        </fieldset>
    </div>
</div>
@section('post_scripts')

    <script type="text/javascript">
        $(document).ready(function () {

            customDatePicker('blacklist_published_at')
            if($('#blacklist_published_at').val() !== '')
            {
                $to_date = $('#blacklist_published_at').val();
                $bs_date = NepaliFunctions.AD2BS(NepaliFunctions.ParseDate($to_date).parsedDate);
                $('#blacklist_published_at_bs').val(NepaliFunctions.ConvertDateFormat($bs_date), "YYYY-MM-DD");
            }
            else
            {
                $('#blacklist_published_at').val('');
            }

    });

    </script>
@endsection

