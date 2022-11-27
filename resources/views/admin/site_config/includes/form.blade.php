<div class="row">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    {!! Form::label('office_name_en', 'Office Name', ['class' => 'control-label']) !!}
                    {!! Form::text('office_name_en', $data['rows']['office_name_en'][0]->config_values, ['placeholder' => 'Office Name', 'class' => 'form-control form-control-sm']) !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-3">
                    {!! Form::label('office_address_en', 'Office Address', ['class' => 'control-label']) !!}
                    {!! Form::text('office_address_en', $data['rows']['office_address_en'][0]->config_values, ['placeholder' => 'Office Address', 'class' => 'form-control form-control-sm']) !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-3">
                    {!! Form::label('domain', 'Domain Name', ['class' => 'control-label']) !!}
                    {!! Form::text('domain', $data['rows']['domain'][0]->config_values, ['placeholder' => 'Domain Name', 'class' => 'form-control form-control-sm']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                    {!! Form::text('email', $data['rows']['email'][0]->config_values, ['placeholder' => 'Enter Email', 'class' => 'form-control form-control-sm']) !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-3">
                    {!! Form::label('phone_en', 'Phone Number', ['class' => 'control-label']) !!}
                    {!! Form::text('phone_en', $data['rows']['phone_en'][0]->config_values, ['placeholder' => 'Phone Number', 'class' => 'form-control form-control-sm']) !!}
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group mb-3">
                    {!! Form::label('fax_en', 'Fax', ['class' => 'control-label']) !!}
                    {!! Form::text('fax_en', $data['rows']['fax_en'][0]->config_values, ['placeholder' => 'Fax', 'class' => 'form-control form-control-sm']) !!}
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-3">
                    @if($data['rows']['logo'][0]->config_values)
                    {!! Form::label('image', 'Selected Logo', ['class' => 'control-label']) !!}
                    <img src="{{ ViewHelper::getImagePath($folder, $data['rows']['logo'][0]->config_values) }}"
                         width="200"/>
                    <label class="control-label">Logo</label>
                    @endif
                    {!! Form::file('image') !!}

                </div>
            </div>
            <div class="form-group mb-3">
                <span class="label label-success">NOTE!</span> <span
                        style="color: #B20000">Image dimension must be 50*50</span>
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    {!! Form::label('meta_title', 'Meta Title', ['class' => 'control-label']) !!}
                    {!! Form::text('meta_title', $data['rows']['meta_title'][0]->config_values, ['placeholder' => 'Enter Meta Title', 'class' => 'form-control form-control-sm']) !!}
                </div>            
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    {!! Form::label('meta_discription', 'Meta Discription', ['class' => 'control-label']) !!}
                    {!! Form::text('meta_discription', $data['rows']['meta_discription'][0]->config_values, ['placeholder' => 'Enter Meta Discription', 'class' => 'form-control form-control-sm']) !!}
                </div>            
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    {!! Form::label('meta_keywords', 'Meta Keywords', ['class' => 'control-label']) !!}
                    {!! Form::text('meta_keywords', $data['rows']['meta_keywords'][0]->config_values, ['placeholder' => 'Enter Meta Keywords', 'class' => 'form-control form-control-sm']) !!}
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                    <div class="form-group">
                        <label for="change_log">Change Log:</label>
                        {!! Form::textarea('change_log', $data['rows']['change_log'][0]->config_values, ['class' => 'form-control ckeditor', 'id' => 'change_log']) !!}
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group mb-3">
                    <div class="col-md-12">
                        <button type="submit" name="submit"  class="btn btn-success">Update </button>
                    </div>
            </div>
        </div>
    </div>
</div>
