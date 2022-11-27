<div>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">
            <span>डकुमेन्ट्स</span>
        </legend>
        <div class="form-row form-group">
            <div class="form-group col-md-6">
                <label> ब्लु बुक </label>
                @if(isset($data['row']['blue_book']) && $data['row']['blue_book'])
                <?php $pathinfo = pathinfo($data['row']['blue_book']); ?>
                <a fileType="blue_book" fileName="{{ $data['row']['blue_book']}}"  data-id ="{{$data['row']->application_id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>
                    @if($data['row']['blue_book'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['blue_book']]) }}" class='img-responsive' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['blue_book'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['blue_book']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;"> 
                    @endif
                @else
                <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                <input type="file" name="blue_book" id="blue_book_image" >
                @endif
            </div>
            <div class="form-group col-md-6">
                <label> रुट पर्मिट </label>
                @if(isset($data['row']['route_permit']) && $data['row']['route_permit'])
                <a fileType="route_permit" fileName="{{ $data['row']['route_permit']}}"  data-id ="{{$data['row']->application_id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>
                <?php $pathinfo = pathinfo($data['row']['route_permit']); ?>
                    @if($data['row']['route_permit'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['route_permit']]) }}" class='img-responsive' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['route_permit'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['route_permit']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                <input type="file" name="route_permit" id="route_permit_image">
                @endif
            </div>   
        </div>
    </fieldset>
</div>