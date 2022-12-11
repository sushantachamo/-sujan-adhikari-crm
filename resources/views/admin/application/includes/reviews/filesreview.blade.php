<table class="table" style="width:100%;" border="1">
    <thead>
        <tr>
            <th>फाईलको नाम</th>
            <th>फाईल</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>आवेदकको फोटो</td>
            <td>
                @if(isset($data['row']['photo']) && $data['row']['photo'])
                    <?php $pathinfo = pathinfo($data['row']['photo']); ?>
                    @if($data['row']['photo'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                    <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['photo']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['photo'] && ($pathinfo['extension']=='pdf'))
                    <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['photo']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>आवेदकको नागरिकताको अगाडि</td>
            <td>
                @if(isset($data['row']['citizenship_front']) && $data['row']['citizenship_front'])
                    <?php $pathinfo = pathinfo($data['row']['citizenship_front']); ?>
                    @if($data['row']['citizenship_front'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['citizenship_front']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['citizenship_front'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['citizenship_front']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>आवेदकको नागरिकताको पछाडि</td>
            <td>
                @if(isset($data['row']['citizenship_back']) && $data['row']['citizenship_back'])
                    <?php $pathinfo = pathinfo($data['row']['citizenship_back']); ?>
                    @if($data['row']['citizenship_back'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['citizenship_back']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['citizenship_back'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['citizenship_back']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        @if($data['row']['loan_type']=='general')
        <tr>
            <td>व्यवसाय दर्ता प्रमाण पत्र</td>
            <td>
                @if(isset($data['row']['business_registration_card']) && $data['row']['business_registration_card'])
                    <?php $pathinfo = pathinfo($data['row']['business_registration_card']); ?>
                    @if($data['row']['business_registration_card'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['business_registration_card']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['business_registration_card'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['business_registration_card']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        
        <tr>    
            <td>सेयर प्रमाण पत्र</td>
            <td>
                @if(isset($data['row']['share_certificate']) && $data['row']['share_certificate'])
                    <?php $pathinfo = pathinfo($data['row']['share_certificate']); ?>
                    @if($data['row']['share_certificate'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['share_certificate']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['share_certificate'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['share_certificate']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>पान प्रमाण पत्र</td>
            <td>
                @if(isset($data['row']['pan_certificate']) && $data['row']['pan_certificate'])
                    <?php $pathinfo = pathinfo($data['row']['pan_certificate']); ?>
                    @if($data['row']['pan_certificate'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['pan_certificate']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['pan_certificate'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['pan_certificate']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        @endif
        @if($data['row']['loan_type']=='home')
        <tr>
            <td>लालपुर्जा</td>
            <td>
                @if(isset($data['row']['lalpurja']) && $data['row']['lalpurja'])
                    <?php $pathinfo = pathinfo($data['row']['lalpurja']); ?>
                    @if($data['row']['lalpurja'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['lalpurja']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['lalpurja'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['lalpurja']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>चारकिल्ला</td>
            <td>
                @if(isset($data['row']['charkilla']) && $data['row']['charkilla'])
                    <?php $pathinfo = pathinfo($data['row']['charkilla']); ?>
                    @if($data['row']['charkilla'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['charkilla']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['charkilla'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['charkilla']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>तिरो रसिद</td>
            <td>
                @if(isset($data['row']['tiro_rasid']) && $data['row']['tiro_rasid'])
                    <?php $pathinfo = pathinfo($data['row']['tiro_rasid']); ?>
                    @if($data['row']['tiro_rasid'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['tiro_rasid']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['tiro_rasid'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['tiro_rasid']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>रोक्का पत्र</td>
            <td>
                @if(isset($data['row']['rokka_patra']) && $data['row']['rokka_patra'])
                    <?php $pathinfo = pathinfo($data['row']['rokka_patra']); ?>
                    @if($data['row']['rokka_patra'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['rokka_patra']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['rokka_patra'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['rokka_patra']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>जग्गा धितो दिनेको नागरिकताको अगाडिको फोटो</td>
            <td>
                @if(isset($data['row']['land_lander_citizenship_front']) && $data['row']['land_lander_citizenship_front'])
                    <?php $pathinfo = pathinfo($data['row']['land_lander_citizenship_front']); ?>
                    @if($data['row']['land_lander_citizenship_front'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['land_lander_citizenship_front']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['land_lander_citizenship_front'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['land_lander_citizenship_front']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>जग्गा धितो दिनेको नागरिकताको पछाडिको फोटो</td>
            <td>
                @if(isset($data['row']['land_lander_citizenship_back']) && $data['row']['land_lander_citizenship_back'])
                    <?php $pathinfo = pathinfo($data['row']['land_lander_citizenship_back']); ?>
                    @if($data['row']['land_lander_citizenship_back'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['land_lander_citizenship_back']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['land_lander_citizenship_back'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['land_lander_citizenship_back']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        @endif
        @if($data['row']['loan_type']=='vehicle')
        <tr>
            <td>ब्लु बुक</td>
            <td>
                @if(isset($data['row']['blue_book']) && $data['row']['blue_book'])
                    <?php $pathinfo = pathinfo($data['row']['blue_book']); ?>
                    @if($data['row']['blue_book'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['blue_book']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['blue_book'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['blue_book']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>रुट पर्मिट</td>
            <td>
                @if(isset($data['row']['route_permit']) && $data['row']['route_permit'])
                    <?php $pathinfo = pathinfo($data['row']['route_permit']); ?>
                    @if($data['row']['route_permit'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['route_permit']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['route_permit'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['route_permit']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        @endif
        @if($data['row']['loan_type']=='periodic')
        <tr>
            <td>मुद्दती रसिद</td>
            <td>
                @if(isset($data['row']['muddati_rasid']) && $data['row']['muddati_rasid'])
                    <?php $pathinfo = pathinfo($data['row']['muddati_rasid']); ?>
                    @if($data['row']['muddati_rasid'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['muddati_rasid']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['muddati_rasid'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['muddati_rasid']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        @endif
        <tr>
            <td>धनजमानी (१) नागरिकताको अगाडिको फोटो</td>
            <td>
                @if(isset($data['row']['g1_citizenship_front']) && $data['row']['g1_citizenship_front'])
                    <?php $pathinfo = pathinfo($data['row']['g1_citizenship_front']); ?>
                    @if($data['row']['g1_citizenship_front'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g1_citizenship_front']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['g1_citizenship_front'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g1_citizenship_front']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>धनजमानी (१) नागरिकताको पछाडिको फोटो</td>
            <td>
                @if(isset($data['row']['g1_citizenship_back']) && $data['row']['g1_citizenship_back'])
                    <?php $pathinfo = pathinfo($data['row']['g1_citizenship_back']); ?>
                    @if($data['row']['g1_citizenship_back'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g1_citizenship_back']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['g1_citizenship_back'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g1_citizenship_back']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>धनजमानी (१) फोटो</td>
            <td>
                @if(isset($data['row']['g1_photo']) && $data['row']['g1_photo'])
                    <?php $pathinfo = pathinfo($data['row']['g1_photo']); ?>
                    @if($data['row']['g1_photo'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g1_photo']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['g1_photo'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g1_photo']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>धनजमानी (२) नागरिकताको अगाडिको फोटो</td>
            <td>
                @if(isset($data['row']['g2_citizenship_front']) && $data['row']['g2_citizenship_front'])
                    <?php $pathinfo = pathinfo($data['row']['g2_citizenship_front']); ?>
                    @if($data['row']['g2_citizenship_front'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g2_citizenship_front']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['g2_citizenship_front'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g2_citizenship_front']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>धनजमानी (२) नागरिकताको पछाडिको फोटो</td>
            <td>
                @if(isset($data['row']['g2_citizenship_back']) && $data['row']['g2_citizenship_back'])
                    <?php $pathinfo = pathinfo($data['row']['g2_citizenship_back']); ?>
                    @if($data['row']['g2_citizenship_back'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g2_citizenship_back']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['g2_citizenship_back'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g2_citizenship_back']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>धनजमानी (२) फोटो</td>
            <td>
                @if(isset($data['row']['g2_photo']) && $data['row']['g2_photo'])
                    <?php $pathinfo = pathinfo($data['row']['g2_photo']); ?>
                    @if($data['row']['g2_photo'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g2_photo']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['g2_photo'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g2_photo']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>धनजमानी (३) नागरिकताको अगाडिको फोटो</td>
            <td>
                @if(isset($data['row']['g3_citizenship_front']) && $data['row']['g3_citizenship_front'])
                    <?php $pathinfo = pathinfo($data['row']['g3_citizenship_front']); ?>
                    @if($data['row']['g3_citizenship_front'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g3_citizenship_front']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['g3_citizenship_front'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g3_citizenship_front']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>धनजमानी (३) नागरिकताको पछाडिको फोटो</td>
            <td>
                @if(isset($data['row']['g3_citizenship_back']) && $data['row']['g3_citizenship_back'])
                    <?php $pathinfo = pathinfo($data['row']['g3_citizenship_back']); ?>
                    @if($data['row']['g3_citizenship_back'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g3_citizenship_back']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['g3_citizenship_back'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g3_citizenship_back']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>धनजमानी (३) फोटो</td>
            <td>
                @if(isset($data['row']['g3_photo']) && $data['row']['g3_photo'])
                    <?php $pathinfo = pathinfo($data['row']['g3_photo']); ?>
                    @if($data['row']['g3_photo'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g3_photo']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['g3_photo'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g3_photo']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>धनजमानी (४) नागरिकताको अगाडिको फोटो</td>
            <td>
                @if(isset($data['row']['g4_citizenship_front']) && $data['row']['g4_citizenship_front'])
                    <?php $pathinfo = pathinfo($data['row']['g4_citizenship_front']); ?>
                    @if($data['row']['g4_citizenship_front'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g4_citizenship_front']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['g4_citizenship_front'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g4_citizenship_front']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>धनजमानी (४) नागरिकताको पछाडिको फोटो</td>
            <td>
                @if(isset($data['row']['g4_citizenship_back']) && $data['row']['g4_citizenship_back'])
                    <?php $pathinfo = pathinfo($data['row']['g4_citizenship_back']); ?>
                    @if($data['row']['g4_citizenship_back'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g4_citizenship_back']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['g4_citizenship_back'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g4_citizenship_back']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>धनजमानी (४) फोटो</td>
            <td>
                @if(isset($data['row']['g4_photo']) && $data['row']['g4_photo'])
                    <?php $pathinfo = pathinfo($data['row']['g4_photo']); ?>
                    @if($data['row']['g4_photo'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                        <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g4_photo']]) }}" class='img-responsive p-1' style="max-width:100%;">
                    @elseif($data['row']['g4_photo'] && ($pathinfo['extension']=='pdf'))
                        <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['g4_photo']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>आवेदकको हस्ताक्षर</td>
            <td>
                @if(isset($data['row']['signature']) && $data['row']['signature'])
                    <?php $pathinfo = pathinfo($data['row']['signature']); ?>
                    @if($data['row']['signature'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                    <img src="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['signature']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @elseif($data['row']['signature'] && ($pathinfo['extension']=='pdf'))
                    <img class="pdf-data" src="{{ asset('images/logo/file.png')}}" data="{{ route('admin.file.displayFile',['application_id'=>$data['row']->application_id, 'filename'=>$data['row']['signature']]) }}" class='img-responsive p-1' style="max-width:100%; max-height:100px;">
                    @endif
                @else
                    <span class="text-danger">X</span>
                @endif
            </td>
        </tr>
    </tbody>
</table>