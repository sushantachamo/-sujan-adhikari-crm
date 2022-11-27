<div class="col-md-12 p-2">
    <span style="font-weight:bold; text-decoration:underline; font-size:16px; color:brown;"><center>धितोको विवरण ({!! ViewHelper::docsValueGenerator($data['row']['loan_type'], 'string', false, 'np', 'custom.loan_types') !!})</center></span>
    </div>
    <div class="col-md-12">
        @if($data['row']['loan_type']=='home')
            <div class="row mt-3">
                <div class="col-md-12 p-2">
                    <span style="font-weight:bold; text-decoration:underline; font-size:16px; color:brown;"><center> घर जग्गाको विवरण </center></span>
                </div>
                <div class="col-md-6 t_border p-1">
                    <strong>घर जग्गाको ठेगाना : </strong>{!! ViewHelper::getAddressString($data['row']['home_province'], $data['row']['home_district'], $data['row']['home_local_govt'], $data['row']['home_ward'], $data['row']['home_tole']) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>कित्ता नं: </strong>{!! ViewHelper::docsValueGenerator($data['row']['home_kitta_number'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>सि.नं: </strong>{!! ViewHelper::docsValueGenerator($data['row']['home_sn_number'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>क्षेत्रफल: </strong>{!! ViewHelper::docsValueGenerator($data['row']['home_area'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>चारकिल्ला: </strong>{!! ViewHelper::docsValueGenerator($data['row']['home_charkilla'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>रोक्का मिति: </strong>{!! ViewHelper::docsValueGenerator($data['row']['home_blocked_date_bs'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>पत्र च.नं: </strong>{!! ViewHelper::docsValueGenerator($data['row']['home_invoice_number'], 'string', false, 'np', false) !!} {!! ViewHelper::docsValueGenerator($data['row']['loan_period_type'], 'string', false, 'np', 'custom.loan_period_types') !!}
                </div>
                <div class="col-md-2 t_border p-1">
                    <strong>मालपोत प्रतिनिधि: </strong>{!! ViewHelper::docsValueGenerator($data['row']['malpot_representative'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-4 t_border p-1">
                    <strong>प्रतिनिधिको ना.प.विवरण: </strong>{!! ViewHelper::docsValueGenerator($data['row']['malpot_representative_c_info'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-2 t_border p-1">
                    <strong>मालपोत नाम/ठेगाना: </strong>{!! ViewHelper::docsValueGenerator($data['row']['malpot_name'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-2 t_border p-1">
                    <strong>मूल्याङ्कनकर्ता: </strong>{!! ViewHelper::docsValueGenerator($data['row']['h_collateral_valuator'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-2 t_border p-1">
                    <strong>मूल्याङ्कन रकम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['h_collateral_amount'], 'string', false, 'np', false) !!} 
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12 p-2">
                    <span style="font-weight:bold; text-decoration:underline; font-size:16px; color:brown;"><center>जग्गा धितो दिनेको विवरण </center></span>
                </div>
                <div class="col-md-6 t_border p-1">
                    <strong>नाम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['land_lander_name'], 'string', false, 'np', false) !!} ({!! ViewHelper::docsValueGenerator($data['row']['land_lander_name_en'], 'string', false, 'np', false) !!})
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>जन्म मिति: </strong>{!! ViewHelper::docsValueGenerator($data['row']['land_lander_dob_bs'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>सम्पर्क नं: </strong>{!! ViewHelper::docsValueGenerator($data['row']['land_lander_contact_number'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>ऋण लिनेसँगको नाता: </strong>{!! ViewHelper::docsValueGenerator($data['row']['land_lander_relation'], 'string', false, 'np', 'custom.relations') !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>बाबु/पतिको नाम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['land_lander_father_name'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>बाजे/ससुराको नाम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['land_lander_grand_father_name'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>श्रीमान / श्रीमतीको नाम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['land_lander_spouse_name'], 'string', false, 'np', false) !!} {!! ViewHelper::docsValueGenerator($data['row']['loan_period_type'], 'string', false, 'np', 'custom.loan_period_types') !!}
                </div>
                <div class="col-md-4 t_border p-1"><strong>स्थायी ठेगाना: </strong>{!! ViewHelper::getAddressString($data['row']['land_lander_p_province'], $data['row']['land_lander_p_district'], $data['row']['land_lander_p_localgovt'], $data['row']['land_lander_p_ward'], $data['row']['land_lander_p_tole']) !!}</div>
                <div class="col-md-4 t_border p-1"><strong>अस्थायी ठेगाना: </strong>{!! ViewHelper::getAddressString($data['row']['land_lander_t_province'], $data['row']['land_lander_t_district'], $data['row']['land_lander_t_localgovt'], $data['row']['land_lander_t_ward'], $data['row']['land_lander_t_tole']) !!}</div>
                <div class="col-md-4 t_border p-1"><strong>साबिक ठेगाना :</strong>{!! ViewHelper::docsValueGenerator($data['row']['land_lander_former_address'], 'string', false, 'np', false) !!}</div>
                <div class="col-md-4 t_border p-1"><strong>नागरिकता नं: </strong>{!! ViewHelper::docsValueGenerator($data['row']['land_lander_citizenship_number'], 'string', false, 'np', false) !!}</div>
                <div class="col-md-4 t_border p-1"><strong>नागरिकता जारी मिति: </strong>{!! ViewHelper::docsValueGenerator($data['row']['land_lander_citizenship_issue_date_bs'], 'string', false, 'np', false) !!}</div>
                <div class="col-md-4 t_border p-1"><strong>नागरिकता जारी जिल्ला: </strong>{!! ViewHelper::docsValueGenerator($data['row']['land_lander_citizenship_issue_district'], 'number', 'district', 'np', false) !!}</div>
                @if(isset($data['row']['anshiyar1_name']) && $data['row']['anshiyar1_name']!=null)
                @include('admin.application.includes.reviews.anshiyarreview', ['var'=>1])
                @endif
                @if(isset($data['row']['anshiyar2_name']) && $data['row']['anshiyar2_name']!=null)
                @include('admin.application.includes.reviews.anshiyarreview', ['var'=>2])
                @endif
            </div>
        @endif

        @if($data['row']['loan_type']=='general')
            <div class="row mt-3">
                <div class="col-md-6 t_border p-1">
                    <strong>व्यवसाय दर्ता गरेको निकाए : </strong>{!! ViewHelper::docsValueGenerator($data['row']['business_register_office'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>दर्ता नं: </strong>{!! ViewHelper::docsValueGenerator($data['row']['business_register_number'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>दर्ता मिति: </strong>{!! ViewHelper::docsValueGenerator($data['row']['business_register_date_bs'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>पान नं: </strong>{!! ViewHelper::docsValueGenerator($data['row']['business_pan_number'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>अनुमानित लागत: </strong>{!! ViewHelper::docsValueGenerator($data['row']['business_estimated_cost'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>प्रोपाइटर: </strong>{!! ViewHelper::docsValueGenerator($data['row']['business_proprietor'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>प्रोपाइटरसँगको नाता: </strong>{!! ViewHelper::docsValueGenerator($data['row']['business_proprietor_relation'], 'string', false, 'np', false) !!} {!! ViewHelper::docsValueGenerator($data['row']['loan_period_type'], 'string', false, 'np', 'custom.loan_period_types') !!}
                </div>
                @if($data['row']['general_loan_bank_name'])
                <div class="col-md-4 t_border p-1">
                    <strong>बैंकको नाम/शाखा: </strong>{!! ViewHelper::docsValueGenerator($data['row']['general_loan_bank_name'], 'string', false, 'np', false) !!} 
                </div>
                <div class="col-md-4 t_border p-1">
                    <strong>चेक नं: </strong>{!! ViewHelper::docsValueGenerator($data['row']['general_loan_cheque_number'], 'string', false, 'np', false) !!} 
                </div>
                <div class="col-md-4 t_border p-1">
                    <strong>चेक रकम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['general_loan_cheque_amount'], 'string', false, 'np', false) !!} 
                </div>
                @endif
            </div>
        @endif

        @if($data['row']['loan_type']=='vehicle')
            <div class="row mt-3">
                <div class="col-md-12 p-2">
                    <span style="font-weight:bold; text-decoration:underline; font-size:16px; color:brown;"><center>सबारी साधनको विवरण </center></span>
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>सवारी नाम : </strong>{!! ViewHelper::docsValueGenerator($data['row']['vehicle_name'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>सवारी कलर: </strong>{!! ViewHelper::docsValueGenerator($data['row']['vehicle_color'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-4 t_border p-1">
                    <strong>सवारी मोडल: </strong>{!! ViewHelper::docsValueGenerator($data['row']['vehicle_model'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-2 t_border p-1">
                    <strong>सि सि: </strong>{!! ViewHelper::docsValueGenerator($data['row']['vehicle_cc'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-2 t_border p-1">
                    <strong>सवारी नं: </strong>{!! ViewHelper::docsValueGenerator($data['row']['vehicle_number'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>सवारी इन्जिन नं: </strong>{!! ViewHelper::docsValueGenerator($data['row']['vehicle_engine_number'], 'string', false, 'en', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>सवारी च्यासिस नं: </strong>{!! ViewHelper::docsValueGenerator($data['row']['vehicle_chassis_number'], 'string', false, 'en', false) !!} {!! ViewHelper::docsValueGenerator($data['row']['loan_period_type'], 'string', false, 'np', 'custom.loan_period_types') !!}
                </div>
                <div class="col-md-4 t_border p-1">
                    <strong>कम्पनिको नाम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['vehicle_company_name'], 'string', false, 'np', false) !!} {!! ViewHelper::docsValueGenerator($data['row']['loan_period_type'], 'string', false, 'np', 'custom.loan_period_types') !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>खरिद / मूल्याङ्कन रकम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['vehicle_price'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-6 t_border p-1">
                    <strong>खरिद सँस्था (नाम/ठेगाना): </strong>{!! ViewHelper::docsValueGenerator($data['row']['vehicle_purchasing_org'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>यातायात प्रतिनिधि: </strong>{!! ViewHelper::docsValueGenerator($data['row']['yatayat_representative'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-6 t_border p-1">
                    <strong>यातायात कार्यालय: </strong>{!! ViewHelper::docsValueGenerator($data['row']['yatayat_office_name'], 'string', false, 'np', false) !!} {!! ViewHelper::docsValueGenerator($data['row']['loan_period_type'], 'string', false, 'np', 'custom.loan_period_types') !!}
                </div>
                <div class="col-md-6 t_border p-1">
                    <strong>धितो मूल्याङ्कनकर्ता(सवारी): </strong>{!! ViewHelper::docsValueGenerator($data['row']['v_collateral_valuator'], 'string', false, 'np', false) !!} {!! ViewHelper::docsValueGenerator($data['row']['loan_period_type'], 'string', false, 'np', 'custom.loan_period_types') !!}
                </div>
            </div>
        @endif
        @if($data['row']['loan_type']=='periodic')
            <div class="row mt-3">
                <div class="col-md-12 p-2">
                    <span style="font-weight:bold; text-decoration:underline; font-size:16px; color:brown;"><center>आवधिक ऋण विवरण </center></span>
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>आवधिक राखेको रकम : </strong>{!! ViewHelper::docsValueGenerator($data['row']['periodic_amount'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-1 t_border p-1">
                    <strong>बर्ष समय: </strong>{!! ViewHelper::docsValueGenerator($data['row']['periodic_time'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>खोलेको मिति : </strong>{!! ViewHelper::docsValueGenerator($data['row']['periodic_start_date_bs'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>समाप्त मिति: </strong>{!! ViewHelper::docsValueGenerator($data['row']['periodic_end_date_bs'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-2 t_border p-1">
                    <strong>ऋण रकम: </strong>{!! ViewHelper::docsValueGenerator($data['row']['periodic_loan_amount'], 'string', false, 'np', false) !!}
                </div>
            </div>
        @endif
        @if($data['row']['loan_type']=='microfinance')
            <div class="row mt-3">
                <div class="col-md-12 p-2">
                    <span style="font-weight:bold; text-decoration:underline; font-size:16px; color:brown;"><center>लघुबित्त ऋण विवरण </center></span>
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>कार्यक्रमकाे नाम : </strong>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_programe_name'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-1 t_border p-1">
                    <strong>केन्द्र नं: </strong>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_center_number'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>केन्द्र नाम : </strong>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_center_name'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-2 t_border p-1">
                    <strong>समुह नं: </strong>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_group_number'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-3 t_border p-1">
                    <strong>समुह: </strong>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_group'], 'string', false, 'np', false) !!}
                </div>
                <div class="col-md-12">
                    <table style="width:100%;" border="1" cellpadding="3">
                        <thead>
                            <tr>
                                <th>किसिम</th>
                                <th>नाम</th>
                                <th>बुबाको नाम</th>
                                <th>वाजेको नाम</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>अध्यक्ष</th>
                                <td>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_chairman_name'], 'string', false, 'np', false) !!}</td>
                                <td>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_chairman_father_name'], 'string', false, 'np', false) !!}</td>
                                <td>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_chairman_grand_father_name'], 'string', false, 'np', false) !!}</td>
                            </tr>
                            <tr>
                                <th>सदस्यको १</th>
                                <td>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_member_name_one'], 'string', false, 'np', false) !!}</td>
                                <td>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_member_father_name_one'], 'string', false, 'np', false) !!}</td>
                                <td>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_member_grand_father_name_one'], 'string', false, 'np', false) !!}</td>
                            </tr>
                            <tr>
                                <th>सदस्यको २</th>
                                <td>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_member_name_two'], 'string', false, 'np', false) !!}</td>
                                <td>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_member_father_name_two'], 'string', false, 'np', false) !!}</td>
                                <td>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_member_grand_father_name_two'], 'string', false, 'np', false) !!}</td>
                            </tr>
                            <tr>
                                <th>सदस्यको ३</th>
                                <td>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_member_name_three'], 'string', false, 'np', false) !!}</td>
                                <td>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_member_father_name_three'], 'string', false, 'np', false) !!}</td>
                                <td>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_member_grand_father_name_three'], 'string', false, 'np', false) !!}</td>
                            </tr>
                            <tr>
                                <th>सदस्यको ४</th>
                                <td>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_member_name_four'], 'string', false, 'np', false) !!}</td>
                                <td>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_member_father_name_four'], 'string', false, 'np', false) !!}</td>
                                <td>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_member_grand_father_name_four'], 'string', false, 'np', false) !!}</td>
                            </tr>
                            <tr>
                                <th>केन्द्र प्रमुख</th>
                                <td>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_head'], 'string', false, 'np', false) !!}</td>
                                <td>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_head_father_name'], 'string', false, 'np', false) !!}</td>
                                <td>{!! ViewHelper::docsValueGenerator($data['row']['microfinance_head_grand_father_name'], 'string', false, 'np', false) !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>