<div>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">
            <span>आवेदक डकुमेन्ट्स</span>
        </legend>
        <div class="form-row form-group">
            <div class="form-group col-md-6">
                <label>आवेदकको फोटो </label>
                @if(isset($data['row']['photo']) && $data['row']['photo'])
                <?php $pathinfo = pathinfo($data['row']['photo']); ?>
                <a fileType="photo" fileName="{{ $data['row']['photo']}}"  data-id ="{{$data['row']->application_id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>
                    @if($data['row']['photo'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['photo']]) }}" class='img-responsive' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['photo'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['photo']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                <input type="file" name="photo" id="photo_image" >
                @endif
            </div>
            <div class="form-group col-md-6">
                <label> आवेदकको हस्ताक्षर </label>
                @if(isset($data['row']['signature']) && $data['row']['signature'])
                <a fileType="signature" fileName="{{ $data['row']['signature']}}"  data-id ="{{$data['row']->application_id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>
                <?php $pathinfo = pathinfo($data['row']['signature']); ?>
                    @if($data['row']['signature'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['signature']]) }}" class='img-responsive' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['signature'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['signature']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                <input type="file" name="signature" id="signature_image">
                @endif
            </div>  
        </div>
    </fieldset>
</div>