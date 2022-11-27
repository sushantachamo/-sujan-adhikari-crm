<div>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">
            <span>डकुमेन्ट्स</span>
        </legend>
        <div class="form-row form-group">
            <div class="form-group col-md-6">
                <label> मुद्दती रसिद </label>
                @if(isset($data['row']['muddati_rasid']) && $data['row']['muddati_rasid'])
                <?php $pathinfo = pathinfo($data['row']['muddati_rasid']); ?>
                <a fileType="muddati_rasid" fileName="{{ $data['row']['muddati_rasid']}}"  data-id ="{{$data['row']->application_id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>
                    @if($data['row']['muddati_rasid'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['muddati_rasid']]) }}" class='img-responsive' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['muddati_rasid'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['muddati_rasid']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                <input type="file" name="muddati_rasid" id="muddati_rasid_image" >
                @endif
            </div>   
        </div>
    </fieldset>
</div>