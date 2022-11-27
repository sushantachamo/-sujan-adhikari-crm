<style>
    .form-control-sm {
        font-size: 0.8rem;
        line-height: 1.5;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered
    {
        line-height: 36px;
    }
    .select2-container .select2-selection--single, .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 35px;
    }

    .btn-sm {
        line-height: 1.2rem;
    }
    .form-control {
        border: 1px solid #aaaaaa;
    }
</style>
<div class="card card-default">
    <div class="card-body">
        <fieldset>
            <div class="row">
                <div class="form-group col-md-2 col-sm-2">
                    <label for="registration_number">सहकारीको दर्ता नं: <span class="text-danger">*</span></label>
                    {!! Form::text('registration_number', null, ['class' => 'form-control form-control-sm', 'required' => 'required']) !!}

                </div>
                <div class="form-group col-md-2 col-sm-2">
                    <div class="form-group">
                        <label for="">{{ config('custom.office_fields.registration_date.name_np') }}</label>{!! config('custom.office_fields.registration_date.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        <div class="input-group">
                            {!! Form::text('registration_date_bs', isset($data['row']['registration_date_bs'])?$data['row']['registration_date_bs']:(isset($rawApplicant)? $rawApplicant['registration_date_bs'] : null), ['placeholder' => config('custom.office_fields.registration_date.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'registration_date_bs']) !!}
                            {!! Form::text('registration_date', isset($data['row']['registration_date']) ? $data['row']['registration_date']->format('Y-m-d') : (isset($rawApplicant['registration_date'])? $rawApplicant['registration_date']->format('Y-m-d'):null), ['class' => 'hidden', 'style'=>'display:none', 'id' => 'registration_date']) !!}
                            <span class="input-group-btn">
                                <button class="btn  btn-sm btn-danger" type="button" id="registration_date_clear"><i class="fi fi-close"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-2 col-sm-2">
                    <label for="register_nikaye">सहकारीको दर्ता निकाए : <span class="text-danger">*</span></label>
                    {!! Form::text('register_nikaye', null, ['class' => 'form-control unicode form-control-sm', 'required' => 'required', 'id'=>'register_nikaye', 'field'=>'register_nikaye']) !!}
                    <div id="registerNikayeLists"></div>
                </div>
                <div class="form-group col-md-3 col-sm-3">
                    <label for="name_en">सहकारीको नाम ( In English ) : <span class="text-danger">*</span></label>
                    {!! Form::text('name_en', null, ['class' => 'form-control form-control-sm', 'required' => 'required', 'id'=>'name_en', 'field'=>'name_en']) !!}
                    <div id="nameEnLists"></div>
                </div>
                <div class="form-group col-md-3 col-sm-3">
                    <label for="name_np">सहकारीको नाम ( In Nepali) : <span class="text-danger">*</span></label>
                    {!! Form::text('name_np', null, ['class' => 'form-control unicode form-control-sm', 'required' => 'required', 'id'=>'name_np', 'field'=>'name_np']) !!}
                    <div id="nameNpLists"></div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                    <label for="province">प्रदेश</label> <span class="text-danger">*</span>
                    {!! Form::select('province', isset($data['provinces'])?$data['provinces']:[], null,
                    ['class' => 'form-control form-control-sm select_to  province']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    <label for="district">जिल्ला</label> <span class="text-danger">*</span>
                    {!! Form::select('district',isset($data['districts'])?$data['districts']:[], null,
                    ['class' => 'form-control form-control-sm select_to district']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    <label for="localgovt">स्थानिय तह</label> <span class="text-danger">*</span>
                    {!!Form::select('localgovt',isset($data['localgovts'])?$data['localgovts']:[],  null,
                    ['class' => 'form-control form-control-sm  select_to local_govt']) !!}
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                    <label for="ward">वडा</label> <span class="text-danger">*</span>
                    {!! Form::text('ward', isset($data['row']['ward'])?$data['row']['ward']: null, ['placeholder' => config('fields.ward.name_np'), 'class' => 'form-control form-control-sm ']) !!}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                    <label for="tole">टोल</label> <span class="text-danger">*</span>
                    {!! Form::text('tole', isset($data['row']['tole'])?$data['row']['tole']: null, ['placeholder' => config('fields.tole.name_np'), 'class' => 'form-control unicode form-control-sm ']) !!}
                    </div>
                </div>
                <div class="form-group col-md-3 col-sm-3">
                    <label for="former_address">साबिक ठेगाना: </label>
                    {!! Form::text('former_address', null, ['class' => 'form-control unicode form-control-sm']) !!}
                </div>
                <div class="form-group col-md-3 col-sm-3">
                    <label for="phone">फाेन नं: </label><span class="text-danger">*</span>
                    {!! Form::text('phone', null, ['class' => 'form-control form-control-sm', 'required' => 'required']) !!}
                </div>

                <div class="form-group col-md-3 col-sm-3">
                    <label for="email">सहकारीको ईमेल </label><span class="text-danger">*</span>
                    {!! Form::email('email', null, ['class' => 'form-control form-control-sm', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-md-3 col-sm-3">
                    <label for="head_office">प्रधान कार्यालय: </label>
                    {!!Form::select('head_office',isset($data['head_offices'])?$data['head_offices']:[],  null,
                    ['class' => 'form-control form-control-sm  select_to head_office']) !!}
                </div>

                <div class="form-group col-md-3 col-sm-3">
                    <label for="president_name">अध्यक्षको नाम : <span class="text-danger">*</span></label>
                    {!! Form::text('president_name', null, ['class' => 'form-control unicode form-control-sm', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-md-3 col-sm-3">
                    <label for="manager_name">व्यवस्थापक / CEO: <span class="text-danger">*</span></label>
                    {!! Form::text('manager_name', null, ['class' => 'form-control unicode form-control-sm', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-md-3 col-sm-3">
                    <label for="vice_president_name">उपाध्यक्ष: <span class="text-danger">*</span></label>
                    {!! Form::text('vice_president_name', null, ['class' => 'form-control unicode form-control-sm', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-md-3 col-sm-3">
                    <label for="secretary">सचिब: <span class="text-danger">*</span></label>
                    {!! Form::text('secretary', null, ['class' => 'form-control unicode form-control-sm', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-md-3 col-sm-3">
                    <label for="treasurer">कोषाध्यक्ष: <span class="text-danger">*</span></label>
                    {!! Form::text('treasurer', null, ['class' => 'form-control unicode form-control-sm', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-md-3 col-sm-3">
                    <label for="loan_coordinator">ऋण संयोजक: <span class="text-danger">*</span></label>
                    {!! Form::text('loan_coordinator', null, ['class' => 'form-control unicode form-control-sm', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-md-3 col-sm-3">
                    <label for="loan_member_1">ऋण सदस्य (१): <span class="text-danger">*</span></label>
                    {!! Form::text('loan_member_1', null, ['class' => 'form-control unicode form-control-sm', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-md-3 col-sm-3">
                    <label for="loan_member_2">ऋण सदस्य (२): <span class="text-danger">*</span></label>
                    {!! Form::text('loan_member_2', null, ['class' => 'form-control unicode form-control-sm', 'required' => 'required']) !!}
                </div>
                <div class="form-group col-md-4 col-sm-4">
                    <label for="slogan">नारा:</label>
                    {!! Form::text('slogan', null, ['class' => 'form-control unicode form-control-sm', 'id' => 'slogan']) !!}
                </div>
                
                <div class="form-group col-md-4 col-sm-4">
                    <label for="remarks">कैफियत:</label>
                    {!! Form::textarea('remarks', null, ['class' => 'form-control form-control-sm', 'id' => 'remarks']) !!}
                </div>
                <div class="form-group col-md-4">
                    <label> लोगो </label>
                    
                    @if(isset($data['row']['image']) && $data['row']['image'])
                    <a fileType="image" fileName="{{ $data['row']['image']}}"  data-id ="{{$data['row']->id}}" class="btn btn-danger text-white btn-sm p-1 confirm-file-button">Delete</a>
                    <?php $pathinfo = pathinfo($data['row']['image']); ?>
                    @if($data['row']['image'] && ($pathinfo['extension']=='jpg' || $pathinfo['extension']=='jpeg' || $pathinfo['extension']=='png' || $pathinfo['extension']=='gif' ||$pathinfo['extension']=='JPG' || $pathinfo['extension']=='JPEG' || $pathinfo['extension']=='PNG' || $pathinfo['extension']=='GIF'))
                    <img src="{{ ViewHelper::getImagePath($folder, $data['row']->image) }}" class='img-responsive' style="max-height:100px">
                    @endif
                    @else
                    <small>(File format should be: <code>{{ implode(",", config('custom.allowedDocExtension')) }}</code> and file size limit upto: <code>{{ App\Helpers\Helper::parse_size(config('custom.filesize')) }} KB</code>)</small>
                    <input type="file" name="image" id="image">
                    @endif
    
                </div>  

            </div>
            <div class="row">
                <div class="form-group col-md-2 col-sm-2">
                    <div class="form-group">
                        <label for="">{{ config('custom.office_fields.expiration_date.name_np') }}</label>{!! config('custom.office_fields.expiration_date.required') == true ? '<span class="text-danger">*</span>' : '' !!}
                        <div class="input-group">
                            {!! Form::text('expiration_date_bs', isset($data['row']['expiration_date_bs'])?$data['row']['expiration_date_bs']:(isset($rawApplicant)? $rawApplicant['expiration_date_bs'] : null), ['placeholder' => config('custom.office_fields.expiration_date.name_np'), 'class' => 'form-control form-control-sm nepalidate-picker masked', 'data-format' => '9999-99-99', 'data-placeholder' => '_', 'placeholder'=>'YYYY-MM-DD','id' => 'expiration_date_bs']) !!}
                            {!! Form::text('expiration_date', isset($data['row']['expiration_date']) ? $data['row']['expiration_date']->format('Y-m-d') : (isset($rawApplicant['expiration_date'])? $rawApplicant['expiration_date']->format('Y-m-d'):null), ['class' => 'hidden', 'style'=>'display:none', 'id' => 'expiration_date']) !!}
                            <span class="input-group-btn">
                                <button class="btn  btn-sm btn-danger" type="button" id="expiration_date_clear"><i class="fi fi-close"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3 col-sm-3">
                    <label for="agent_name">एजेन्टको नाम: </label>
                    {!!Form::text('agent_name', null, ['class' => 'form-control form-control-sm agent_name','id'=>'agent_name', 'field'=>'agent_name']) !!}
                    <div id="agentLists"></div>
                </div>
                 <div class="form-group col-md-4 col-sm-4">
                    {!! Form::label('status', 'Status', ['class' => 'col-md-6 control-label']) !!}
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
    </div>
</div>
@section('post_scripts')
<script type="text/javascript">
$(document).ready(function () {
    $('.select2').select2();
    $('.select_to').select2();

    function fetchSuggestion (field_id, lists_id)
    {
        var field = $('#'+field_id).attr('field');
        $('#'+field_id).keyup(function(){
            var query = $(this).val();
            if(query != '' && field != '')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{route('admin.office.fetchSuggestionData') }}",
                    method:"POST",
                    data:{field:field,query:query, _token:_token},
                    success:function(data)
                    {
                        $('#'+lists_id).fadeIn();
                        $('#'+lists_id).html(data);
                    }
                })
            }
            else
            {
                $('#'+lists_id).fadeOut();
            }
        });
        $(document).on('click', 'li.'+field+'_suggestions', function(){
            $('#'+field_id).val($(this).text());
            $('#'+lists_id).fadeOut()
        });
    }
    fetchSuggestion('agent_name', 'agentLists')
    fetchSuggestion('name_en', 'nameEnLists')
    fetchSuggestion('name_np', 'nameNpLists')
    fetchSuggestion('register_nikaye', 'registerNikayeLists')
    

        customDatePicker('registration_date')
        if($('#registration_date').val() !== '')
        {
            $to_date = $('#registration_date').val();
            $bs_date = NepaliFunctions.AD2BS(NepaliFunctions.ParseDate($to_date).parsedDate);
            $('#registration_date_bs').val(NepaliFunctions.ConvertDateFormat($bs_date), "YYYY-MM-DD");
        }
        else
        {
            $('#registration_date').val('');
        }

        customDatePicker('expiration_date')
        if($('#expiration_date').val() !== '')
        {
            $to_date = $('#expiration_date').val();
            $bs_date = NepaliFunctions.AD2BS(NepaliFunctions.ParseDate($to_date).parsedDate);
            $('#expiration_date_bs').val(NepaliFunctions.ConvertDateFormat($bs_date), "YYYY-MM-DD");
        }
        else
        {
            $('#expiration_date').val('');
        }

        $('body').on('change', '.province', function () {
            getDistricts($(this).val(), 'district', 'local_govt')
        });

        $('body').on('change', '.district', function () {
            getLocaGovt($(this).val(), 'local_govt')                
        });


        $('.confirm-file-button').on('click', function (event) {
            event.preventDefault();
            var id = $(this).attr('data-id');
            var filetype = $(this).attr('fileType');
            var filename = $(this).attr('fileName');
            console.log(filetype)
            Swal.fire({
                title: 'Do you want to delete?',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                html: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '{{ route("admin.officefile.fileDelete") }}',
                        method: 'post',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                            filename: filename,
                        },
                        success: function (response) {
                            location.reload();
                        }
                    });
                }
            })
        });

        $('img').on('click', function (e){
            e.preventDefault();
            classname = $(this).attr('class');
            if(classname == 'pdf-data')
            {
                src_data = $(this).attr('data');
                console.log(src_data)
                $('#modal-show-pdf iframe').attr('src', src_data); 
                $('#modal-show-pdf').modal('show'); 
            }
            else
            {
                src = $(this).attr('src');
                $('#modal_image').attr('src', src); 
                $('#modal-show-image').modal('show'); 
            }

        });
});

</script>
@endsection