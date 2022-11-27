<div>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">
            <span>डकुमेन्ट्स</span>
        </legend>
        <div class="form-row form-group">
            <div class="form-group col-md-4">
                <label> नागरिकता अगाडिको फोटो </label>
                @if(isset($data['row'][$var.'_citizenship_front']) && $data['row'][$var.'_citizenship_front'])
                <?php $pathinfo = pathinfo($data['row'][$var.'_citizenship_front']); ?>
                <a fileType="{{ $var.'_citizenship_front' }}" fileName="{{ $data['row'][$var.'_citizenship_front']}}"  data-id ="{{$data['row']->application_id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>
                    @if($data['row'][$var.'_citizenship_front'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row'][$var.'_citizenship_front']]) }}" class='img-responsive' style="max-width:100%; max-height:100px;">
                    @elseif($data['row'][$var.'_citizenship_front'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row'][$var.'_citizenship_front']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                <input type="file" name="{{ $var.'_citizenship_front' }}" id="{{ $var.'_citizenship_front' }}_image" >
                @endif
            </div>
            <div class="form-group col-md-4">
                <label>नागरिकता पछाडिको फोटो </label>
                @if(isset($data['row'][$var.'_citizenship_back']) && $data['row'][$var.'_citizenship_back'])
                <?php $pathinfo = pathinfo($data['row'][$var.'_citizenship_back']); ?>
                <a fileType="{{ $var.'_citizenship_back' }}" fileName="{{ $data['row'][$var.'_citizenship_back']}}"  data-id ="{{$data['row']->application_id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>
                    @if($data['row'][$var.'_citizenship_back'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row'][$var.'_citizenship_back']]) }}" class='img-responsive' style="max-width:100%; max-height:100px;">
                    @elseif($data['row'][$var.'_citizenship_back'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row'][$var.'_citizenship_back']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                <input type="file" name="{{ $var.'_citizenship_back' }}" id="{{ $var.'_citizenship_back' }}_image" >
                @endif
            </div>

            <div class="form-group col-md-4">
                <label>फोटो </label>
                @if(isset($data['row'][$var.'_photo']) && $data['row'][$var.'_photo'])
                <?php $pathinfo = pathinfo($data['row'][$var.'_photo']); ?>
                <a fileType="{{ $var.'_photo' }}" fileName="{{ $data['row'][$var.'_photo']}}"  data-id ="{{$data['row']->application_id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>
                    @if($data['row'][$var.'_photo'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row'][$var.'_photo']]) }}" class='img-responsive' style="max-width:100%; max-height:100px;">
                    @elseif($data['row'][$var.'_photo'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row'][$var.'_photo']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                <input type="file" name="{{ $var.'_photo' }}" id="{{ $var.'_photo' }}_image" >
                @endif
            </div>
        </div>
    </fieldset>
</div>