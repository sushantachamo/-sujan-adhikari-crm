<?php $site_info = App\Models\Admin\SiteConfig::pluck('config_values', 'config_keys'); ?>
@extends('admin.includes.layout')

@section('content')
    @include('admin.includes.breadcrumb',[
    'base_route' => $base_route,
    'page' => 'प्रतिवेदन'
    ])
    <section class="rounded mb-3">
        <div class="col-md-12">
            <div class="exports m-3">
                @can('generate-report')
                <a class="btn btn-sm btn-warning" href="{{ route($base_route.'.advance_report',['request'=>$data['request']]) }}" data-toggle="tooltip" data-placement="bottom" data-original-title="Back"> Back</a> &nbsp; &nbsp; &nbsp;
                @endcan
                @can('pdfExport-report')
                <a class="btn btn-sm btn-primary" id="printBtnL" data-toggle="tooltip" data-placement="bottom" data-original-title="Print Report"><i class="fi fi-print"></i> PDF</a> &nbsp; &nbsp; &nbsp;
                @endcan
                @can('excelExport-report')
                <a class="btn btn-sm btn-info excelbtn" href="{{ route($base_route.'.advance_report_result_export',['request'=>$data['request']]) }}" data-toggle="tooltip" data-placement="bottom" data-original-title="Excel Export"><i class="fi fi-arrow-download"></i> Excel</a>
                @endcan
            </div>
            <div class="card">
                <div class="card-body" id="printable" style="background: #f8f8fb;">
                    <div id="report_section" style="width:100%">
                        <div class="letter-body" style="padding:25px; font-size: 12pt;">
                            
                            <hr style="background: #000; border:0.5px solid #000;">
                            <div style="width:100%">
    
                            
                            </div>
                            <div style="width:100%"> 
                                <style>
                                    .printTable{
                                        width:100%;
                                    }
    
                                    .printTable tr{
                                        margin:0;
                                        padding:0;
                                    }
    
                                    .printTable th,td{
                                        padding: 1px 8px 1px 8px;
                                    }
                                    @media print {
                                        a[href]:after {
                                            visibility: hidden !important;
                                        }
                                    }
                                </style>
                                <style type="text/css" media="print">
                                  @page { size: landscape; }
                                </style>
                                <table border="1" class="printTable table-responsive" cellspacing="0" cellpadding="0" >
                                    <thead>
                                        
                                        <tr style="background:rgba(0,0,0,0.01);">
                                            <th>क्र. सं.</th>
                                            @if(isset($data['request']['subscription_id']) && $data['request']['subscription_id'] == 'on')
                                                <th>सदस्यता नं</th>
                                            @endif
                                            @if(isset($data['request']['borrower_name']) && $data['request']['borrower_name'] == 'on')
                                                <th>पुरा नाम</th>
                                            @endif
                                            @if(isset($data['request']['borrower_name_en']) && $data['request']['borrower_name_en'] == 'on')
                                                <th>पुरा नाम अंग्रेजी</th>
                                            @endif
                                            @if(isset($data['request']['subscription_date_bs']) && $data['request']['subscription_date_bs'] == 'on')
                                                <th>सदस्य बनेको मिति</th>
                                            @endif
                                            @if(isset($data['request']['borrower_gender']) && $data['request']['borrower_gender'] == 'on')
                                                <th>लिंग</th>
                                            @endif
                                            @if(isset($data['request']['b_dob_bs']) && $data['request']['b_dob_bs'] == 'on')
                                                <th>जन्म मिति</th>
                                            @endif
                                            @if(isset($data['request']['b_grand_father_name']) && $data['request']['b_grand_father_name'] == 'on')
                                                <th>बाजे/ससुराको नाम</th>
                                            @endif
                                            @if(isset($data['request']['b_father_name']) && $data['request']['b_father_name'] == 'on')
                                                <th>बाबु/पतिको नाम</th>
                                            @endif
                                            @if(isset($data['request']['b_marital_status']) && $data['request']['b_marital_status'] == 'on')
                                                <th>वैवाहिक स्थिती</th>
                                            @endif
                                            @if(isset($data['request']['citizenship_number']) && $data['request']['citizenship_number'] == 'on')
                                                <th>नागरिकता नं</th>
                                            @endif
                                            @if(isset($data['request']['citizenship_issue_date_bs']) && $data['request']['citizenship_issue_date_bs'] == 'on')
                                            <th>नागरिकता जारी मिति</th>
                                            @endif
                                            @if(isset($data['request']['citizenship_issue_district']) && $data['request']['citizenship_issue_district'] == 'on')
                                            <th>नागरिकता जारी जिल्ला </th>
                                            @endif
                                            @if(isset($data['request']['b_caste_code']) && $data['request']['b_caste_code'] == 'on')
                                                <th>जात</th>
                                            @endif
                                            @if(isset($data['request']['address']) && $data['request']['address'] == 'on')
                                                <th>ठेगाना</th>
                                            @endif
                                            @if(isset($data['request']['share_certificate_number']) && $data['request']['share_certificate_number'] == 'on')
                                                <th>शेयर प्रमाणपत्र नं</th>
                                            @endif
                                            @if(isset($data['request']['share_amount']) && $data['request']['share_amount'] == 'on')
                                                <th>शेयर रकम </th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
    
                                        <?php $bg_color = '#fff'; ?>
                                        @foreach($data['rows'] as $key=>$d)
                                        <tr style="background:rgba(0,0,0,0.01);">
                                            <td>{{ $key + 1 }}</td>
                                            @if(isset($data['request']['subscription_id']) && $data['request']['subscription_id'] == 'on')
                                                <td><a href="{{ route('admin.application.show', $d->id) }}" style="color:#000; text-decoration:none;"> {{$d->subscription_id}}</a></td>
                                            @endif
                                            @if(isset($data['request']['borrower_name']) && $data['request']['borrower_name'] == 'on')
                                                <td>{{ $d->borrower_name }}</td>
                                            @endif
                                            @if(isset($data['request']['borrower_name_en']) && $data['request']['borrower_name_en'] == 'on')
                                                <td>{{ $d->borrower_name_en }}</td>
                                            @endif
                                            @if(isset($data['request']['subscription_date_bs']) && $data['request']['subscription_date_bs'] == 'on')
                                                <td>
                                                    {{ $d->subscription_date_bs }}
                                                </td>
                                            @endif
                                            @if(isset($data['request']['borrower_gender']) && $data['request']['borrower_gender'] == 'on')
                                                <td>{{config('custom.gender.'.$d->borrower_gender) }}</td>
                                            @endif
                                            @if(isset($data['request']['b_dob_bs']) && $data['request']['b_dob_bs'] == 'on')
                                            <td>
                                                {{ $d->b_dob_bs }}
                                            </td>
                                            @endif
                                            @if(isset($data['request']['b_grand_father_name']) && $data['request']['b_grand_father_name'] == 'on')
                                                <td>{{ $d->b_grand_father_name }}</td>
                                            @endif
                                            @if(isset($data['request']['b_father_name']) && $data['request']['b_father_name'] == 'on')
                                                <td>{{ $d->b_father_name }}</td>
                                            @endif
                                            @if(isset($data['request']['b_marital_status']) && $data['request']['b_marital_status'] == 'on')
                                                <td>{{ config('custom.marital_status.'.$d->b_marital_status) }}</td>
                                            @endif
                                            @if(isset($data['request']['citizenship_number']) && $data['request']['citizenship_number'] == 'on')
                                                <td>{{ $d->citizenship_number }}</td>
                                            @endif
                                           
                                            @if(isset($data['request']['citizenship_issue_date_bs']) && $data['request']['citizenship_issue_date_bs'] == 'on')
                                                <td>{{ $d->citizenship_issue_date_bs }}</td>
                                            @endif
                                            @if(isset($data['request']['citizenship_issue_district']) && $data['request']['citizenship_issue_district'] == 'on')
                                                <td>{{ $d->citizenship_issue_district }}</td>
                                            @endif
                                            @if(isset($data['request']['b_caste_code']) && $data['request']['b_caste_code'] == 'on')
                                                <td>{{config('custom.caste_code.'.$d->b_caste_code) }}</td>
                                            @endif
                                            @if(isset($data['request']['address']) && $data['request']['address'] == 'on')
                                                <td>{!! ViewHelper::getAddressString($d->b_p_province, $d->b_p_district, $d->b_p_localgovt, $d->b_p_ward, $d->b_p_tole) !!}</td>
                                            @endif
                                            @if(isset($data['request']['share_certificate_number']) && $data['request']['share_certificate_number'] == 'on')
                                                <td> -- </td>
                                            @endif
                                            @if(isset($data['request']['share_amount']) && $data['request']['share_amount'] == 'on')
                                                <td>{{ $d->share_amount }}</td>
                                            @endif
                                        </tr>
            
                                        @endforeach
    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.main-content -->

 @endsection
@section('js_scripts')

<script type="text/javascript" src="{{ ViewHelper::getAssetPath('print_any_part/dist/jQuery.print.min.js','plugins') }}"></script>
<script type="text/javascript">
    $(function() {
        $("#printBtnL").on('click', function() {
            $.print("#printable");
        });
    });
</script>
    @yield('post_scripts')

@endsection
        