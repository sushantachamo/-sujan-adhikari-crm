<fieldset>
    <legend>Add Slider</legend>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="Caption">Caption Title:<span class="required">*</span></label>
                {!! Form::text('caption_title', null, ['class' => 'form-control caption_title']) !!}
            </div>
            <div class="form-group">
                <label for="Caption">Caption Discription:</label>
                {!! Form::text('caption_body', null, ['class' => 'form-control caption_body']) !!}
            </div>
            <div class="form-group">
                <label for="alt">Alt:</label>
                {!! Form::text('alt_text', null, ['class' => 'form-control alt_text']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="image">Image: <span class="required">*</span></label>
                {!! Form::file('image', ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}

            </div>
            @if (isset($data['row']))
            <div class="form-group">
                <label for="image">Image:</label>

                 @if ($data['row']->image)
                    <img src="{{ ViewHelper::getImagePath($folder, $data['row']->image) }}" width="500">
                @else
                    <img src="{{ ViewHelper::getImagePath($folder, 'no_image.gif') }}" width="200">
                @endif

            </div>
            @endif

            <div class="form-group">
                {!! Form::label('status', 'Status :', ['class' => 'col-md-3 control-label']) !!}
                <div class="radio">
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
            <button type="submit" name="submit"  class="btn btn-success"> {{ $button }} </button>
            <a type="button" href="{{ route($base_route.'.index') }}"
               class="btn btn-danger row-edit">
                 Cancel
            </a>
        </div>
    </div>
</fieldset>
