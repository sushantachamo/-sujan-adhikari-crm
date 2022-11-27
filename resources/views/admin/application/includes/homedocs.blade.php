<div>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">
            
                <span>डकुमेन्ट्स</span>
               
        </legend>
        <div class="form-row form-group">
            <div class="form-group col-md-3">
                <label> लालपुर्जा </label>
                @if(isset($data['row']['lalpurja']) && $data['row']['lalpurja'])
                <?php $pathinfo = pathinfo($data['row']['lalpurja']); ?>
                <a fileType="lalpurja" fileName="{{ $data['row']['lalpurja']}}"  data-id ="{{$data['row']->application_id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>
                    @if($data['row']['lalpurja'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['lalpurja']]) }}" class='img-responsive' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['lalpurja'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['lalpurja']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                <input type="file" name="lalpurja" id="lalpurja_image" >
                @endif
            </div>
            <div class="form-group col-md-3">
                <label> चार किल्ला </label>
                @if(isset($data['row']['charkilla']) && $data['row']['charkilla'])
                <a fileType="charkilla" fileName="{{ $data['row']['charkilla']}}"  data-id ="{{$data['row']->application_id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>
                <?php $pathinfo = pathinfo($data['row']['charkilla']); ?>
                    @if($data['row']['charkilla'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['charkilla']]) }}" class='img-responsive' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['charkilla'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['charkilla']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                <input type="file" name="charkilla" id="charkilla_image">
                @endif
            </div>  
            <div class="form-group col-md-3">
                <label> तिरो  रसिद </label>
                @if(isset($data['row']['tiro_rasid']) && $data['row']['tiro_rasid'])
                <a fileType="tiro_rasid" fileName="{{ $data['row']['tiro_rasid']}}"  data-id ="{{$data['row']->application_id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>

                <?php $pathinfo = pathinfo($data['row']['tiro_rasid']); ?>
                    @if($data['row']['tiro_rasid'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['tiro_rasid']]) }}" class='img-responsive' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['tiro_rasid'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['tiro_rasid']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                <input type="file" name="tiro_rasid" id="tiro_rasid_image">
                @endif
            </div>  
            <div class="form-group col-md-3">
                <label> रोक्का पत्र </label>
                
                @if(isset($data['row']['rokka_patra']) && $data['row']['rokka_patra'])
                <a fileType="rokka_patra" fileName="{{ $data['row']['rokka_patra']}}"  data-id ="{{$data['row']->application_id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>

                <?php $pathinfo = pathinfo($data['row']['rokka_patra']); ?>
                    @if($data['row']['rokka_patra'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['rokka_patra']]) }}" class='img-responsive' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['rokka_patra'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['rokka_patra']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                <input type="file" name="rokka_patra" id="rokka_patra_image">
                @endif
            </div>  
        </div>
    </fieldset>
</div>