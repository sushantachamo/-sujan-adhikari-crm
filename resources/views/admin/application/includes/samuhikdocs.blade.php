<div>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">
            <span>डकुमेन्ट्स</span>
        </legend>
        <div class="form-row form-group">
            <div class="form-group col-md-4">
                <label> दर्ता प्रमाण पत्र </label>
                @if(isset($data['row']['business_registration_card']) && $data['row']['business_registration_card'])
                <?php $pathinfo = pathinfo($data['row']['business_registration_card']); ?>
                <a fileType="business_registration_card" fileName="{{ $data['row']['business_registration_card']}}"  data-id ="{{$data['row']->application_id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>
                    @if($data['row']['business_registration_card'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['business_registration_card']]) }}" class='img-responsive' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['business_registration_card'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['business_registration_card']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                <input type="file" name="business_registration_card" id="business_registration_card_image" >
                @endif
            </div>   
            <div class="form-group col-md-4">
                <label> सेयर प्रमाण पत्र </label>
                @if(isset($data['row']['share_certificate']) && $data['row']['share_certificate'])
                <?php $pathinfo = pathinfo($data['row']['share_certificate']); ?>
                <a fileType="share_certificate" fileName="{{ $data['row']['share_certificate']}}"  data-id ="{{$data['row']->application_id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>
                    @if($data['row']['share_certificate'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['share_certificate']]) }}" class='img-responsive' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['share_certificate'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['share_certificate']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                <input type="file" name="share_certificate" id="share_certificate_image" >
                @endif
            </div>  
            <div class="form-group col-md-4">
                <label> PAN प्रमाण पत्र </label>
                @if(isset($data['row']['pan_certificate']) && $data['row']['pan_certificate'])
                <?php $pathinfo = pathinfo($data['row']['pan_certificate']); ?>
                <a fileType="pan_certificate" fileName="{{ $data['row']['pan_certificate']}}"  data-id ="{{$data['row']->application_id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>
                    @if($data['row']['pan_certificate'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['pan_certificate']]) }}" class='img-responsive' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['pan_certificate'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['pan_certificate']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                <input type="file" name="pan_certificate" id="pan_certificate_image" >
                @endif
            </div>  
        </div>
    </fieldset>
</div>