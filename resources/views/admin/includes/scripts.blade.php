<script src="{{ asset('admin/assets/js/core.min.js') }} "></script>


<!--

	[SOW Ajax Navigation Plugin] [AJAX ONLY, IF USED]
	If you have specific page js files, wrap them inside #page_js_files 
	Ajax Navigation will use them for this page! 
	This way you can load this page in a normal way and/or via ajax.
	(you can change/add more containers in sow.config.js)

	+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	NOTE: This is mostly for frontend, full ajax navigation!
	Admin Panels use a backend, so the content should be served without
	menu, header, etc! Else, the ajax has no reason to be used because will
	not minimize server load!

	/documentation/plugins-sow-ajax-navigation.html
	+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

-->
<div id="page_js_files"><!-- specific page javascript files here --></div>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script type="text/javascript">var plugin_path = "{{ asset('admin/assets/plugins') }}/";</script>

<script type="text/javascript" src="{{ ViewHelper::getAssetPath('bootstrap.daterangepicker/moment.js','plugins') }}"></script>
<script type="text/javascript" src="{{ ViewHelper::getAssetPath('bootstrap.daterangepicker/daterangepicker.js','plugins') }}"></script>
{{-- <script type="text/javascript" src="{{ ViewHelper::getAssetPath('nepali-datepicker/js/nepali.datepicker.v3.7.min.js','plugins') }}"></script> --}}
<script type="text/javascript" src="{{ ViewHelper::getAssetPath('ckeditor/ckeditor.js','plugins') }}"></script>
<script type="text/javascript" src="{{ ViewHelper::getAssetPath('unicode_converter/unicode.js','plugins') }}"></script>

<script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v3.7.min.js" type="text/javascript"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

        $('.unicode').blur(function(){
            $(this).val(convert_to_unicode($(this).val()));
        });
        $('.unicode').keyup(function(){
            $(this).val(convert_to_unicode($(this).val()));
        });
        $('.rangepicker').daterangepicker();
	    $('.nepaliDate').text(function(){
            $date = $(this).attr('englishDate');
            $bs_date = NepaliFunctions.AD2BS(NepaliFunctions.ParseDate($date).parsedDate);
	        return (convertNumberEnToNp(NepaliFunctions.ConvertDateFormat($bs_date, "YYYY-MM-DD")));

	    })
        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

        });

        // $(".nepalidate-picker").nepaliDatePicker({
        //     dateFormat: "%y-%m-%d",
        //     closeOnDateSelect: true
        // });

	});

	function convertNumberEnToNp($english_number)
	{
	    var str = $english_number;
	    var $english_number_array = str.split('');

	    var $nepali_number = '';
	    $.each($english_number_array, function(index, value){
	        switch (value) {
	            case "0": $nepali_number += "०"; break;
	            case "1": $nepali_number += "१"; break;
	            case "2": $nepali_number += "२"; break;
	            case "3": $nepali_number += "३"; break;
	            case "4": $nepali_number += "४"; break;
	            case "5": $nepali_number += "५"; break;
	            case "6": $nepali_number += "६"; break;
	            case "7": $nepali_number += "७"; break;
	            case "8": $nepali_number += "८"; break;
	            case "9": $nepali_number += "९"; break;
	            default : $nepali_number += value; break;
	        }
	    });
	    return $nepali_number;
	}
	jQuery(document).ready(function($) {
        
        $('.select2').select2();

        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
        
        $(".masked").inputmask({
            mask: '9999-99-99',
            placeholder: 'YYYY-MM-DD',
            showMaskOnHover: false,
            showMaskOnFocus: false,
            onBeforePaste: function (pastedValue, opts) {
                var processedValue = pastedValue;
                return processedValue;
            }
        });
    });



    $(document).ready(function () {
        $('.confirm-delete').on('click', function (e) {
            var $this = $(this);
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
                    $this.closest('td').find('form').submit();
                }
            })
        })

        $('.confirm-restore').on('click', function (e) {
            var $this = $(this);
            Swal.fire({
                title: 'Do you want to restore?',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, restore it!',
                html: false
            }).then((result) => {
                if (result.value) {
                    $this.closest('span').find('form').submit();
                }
            })
        })

        $('.confirm-force-delete').on('click', function (e) {
            var $this = $(this);
            Swal.fire({
                title: 'Do you want to delete permanently?',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it permanently!',
                html: false
            }).then((result) => {
                if (result.value) {
                    $this.closest('span').find('form').submit();
                }
            })
        })

    })


    $(document).ready( function () {
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    });
    $('.bulk_list').click(function (e) {

        var list_id = this.id;

        Swal.fire({
            title: "Are you sure to "+ list_id +" selected rows?",
            showCancelButton: true,
            confirmButtonText: "Yes "+ list_id + " selected rows",
            html: false,
        }).then((result) => {
            if (result.value) {
                var ids = '';
                $('#item_list').find('input:checkbox').each(function (i, v) {
                    if ($(v).is(':checked')) {
                        ids = ids + $(v).val() + ',';
                    }
                });
                $('.row_ids').val(ids);
                $('.bulk_action').val(list_id);
                $('#bulk-action-form').submit();
            }
        })
    });

    function countNumberOnString($string)
    {
        totalNumbers = 0;
        for (let i = 0; i < $string.length; i++) {
                const element = $string[i];        
                if (isFinite(element)) {
                    totalNumbers++;
                }
            }
            return totalNumbers;
    }

    function customDatePicker($id)
    {
        var mainInput = document.getElementById($id+"_bs");
        if(mainInput)
        {
            mainInput.nepaliDatePicker({
                ndpEnglishInput: $id,
                ndpYear:true,
                ndpMonth:true,
                closeOnDateSelect: true,     
            });
    
            $("#"+$id+"_bs").keyup(function (event) {
                event.preventDefault();
                $(this).removeClass('text-danger')
                $(this).removeClass('text-success')
                inputvalue = $(this).val();
                if(countNumberOnString(inputvalue) == '8')
                {
                    dateObject = NepaliFunctions.ConvertToDateObject(inputvalue, "YYYY-MM-DD");
                    if(NepaliFunctions.ValidateBsDate(dateObject))
                    {
                        $(this).addClass('text-success')
                        $('#'+$id+'').val(NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD(dateObject)));
                    }
                    else
                    {
                        $(this).addClass('text-danger')
                    }
    
                }
                
            }); 
    
            $("#"+$id+"_clear").on('click', function(){
                $('#'+$id+'_bs').val('');
                $('#'+$id+'').val('');
            });
        }
    }

    function amoutToWord($amout_id, $amount_in_word_id){
        var mainInput = document.getElementById($amout_id);
        if(mainInput)
        {
            dateObject = NepaliFunctions.NumberToWordsUnicode(mainInput.value, true);
            $("#"+$amount_in_word_id).val(dateObject);
        }
    }
    function getDistricts(province_id, $d_field, $l_field, fill_data = false)
    {
        $.ajax({
            type: 'get',
            url: '{{ route('admin.address.load-district-row') }}',
            data: {
                _token: '{{ csrf_token() }}',
                province_id: province_id,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
            },
            success: function (response) {
                $('body').find('.'+$d_field).html(response.html);
                if(!fill_data)
                {
                    $('.'+$d_field).select2('open');
                    $('body').find('.'+$l_field).html([]);
                }
                else{
                    $('.'+$d_field).val(fill_data).trigger('change', true);
                }
            }
        });
    }

    function getLocaGovt (disctict_id, $l_field, fill_data = false)
    {
        $.ajax({
            url: '{{ route('admin.address.load-local-gov-row') }}',
            method: 'get',
            data: {
                _token: '{{ csrf_token() }}',
                district_id: disctict_id,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
            },
            success: function (response) {
                $('body').find('.'+$l_field).html(response.html);
                if(!fill_data)
                {
                    $('.'+$l_field).select2('open');
                }
                else{
                    $('.'+$l_field).val(fill_data).trigger('change', true);
                }
            }
        });
    }
    
</script>
@yield('js_scripts')
@yield('js_libraries')