<?php
return [ 
        'fields' => [
            'land_unit'=>[
                'lang' => 'np',
                'name_en' => 'Land Unit',
                'name_np' => 'जग्गा मापन',
                'template_name' => 'LandUnit',
                'key' => 'land_unit',
                'foreign_key' =>false,
                'type' => 'string',
                'config' => 'custom.land_units',
                'required' => true,
                'required_if'=> false,
            ],
            't_land_area'=>[
                'lang' => 'np',
                'name_en' => 'Total Land Area',
                'name_np' => 'जग्गाको पुरा क्षेत्रफल',
                'template_name' => 'TotalLandArea',
                'key' => 't_land_area',
                'foreign_key' =>false,
                'type' => 'string',
                'config' => false,
                'required' => true,
                'required_if'=> false,
            ],
            'm_land_area'=>[
                'lang' => 'np',
                'name_en' => 'Mapdanda Area',
                'name_np' => 'मापदण्ड लाग्ने क्षेत्रफल',
                'template_name' => 'MapdandaArea',
                'key' => 'm_land_area',
                'foreign_key' =>false,
                'type' => 'string',
                'config' => false,
                'required' => true,
                'required_if'=> false,
            ],
            'v_land_area'=>[
                'lang' => 'np',
                'name_en' => 'Valid Land Area',
                'name_np' => 'मापदण्ड बाहेकको जग्गाको क्षेत्रफल',
                'template_name' => 'ValidLandArea',
                'key' => 'v_land_area',
                'foreign_key' =>false,
                'type' => 'string',
                'config' => false,
                'required' => true,
                'required_if'=> false,
            ],

            'collateral_type'=>[
                'lang' => 'np',
                'name_en' => 'Collateral Assessment Type',
                'name_np' => 'धितो मूल्याङ्कन',
                'template_name' => 'CollateralAssessmentType',
                'key' => 'collateral_type',
                'foreign_key' =>false,
                'type' => 'string',
                'config' => 'custom.mortgage_appraisal',
                'required' => false,
                'required_if'=> false,
            ],
            'land_market_price_per_unit'=>[
                'lang' => 'np',
                'name_en' => 'Land Market Price Per Unit',
                'name_np' => 'जग्गाको बजार मुल्य प्रति इकाइ',
                'template_name' => 'LandMarketPricePerUnit',
                'key' => 'land_market_price_per_unit',
                'foreign_key' =>false,
                'type' => 'string',
                'config' => false,
                'required' => true,
                'required_if'=> false,
            ],
            'land_market_price'=>[
                'lang' => 'np',
                'name_en' => 'Land Market Price',
                'name_np' => 'जग्गाको बजार मुल्य',
                'template_name' => 'LandMarketPrice',
                'key' => 'land_market_price',
                'foreign_key' =>false,
                'type' => 'string',
                'config' => false,
                'required' => true,
                'required_if'=> false,
            ],
            'land_market_distinct_price'=>[
                'lang' => 'np',
                'name_en' => 'Land Market Distinct Price',
                'name_np' => 'जग्गाको वजार मुल्यको ७०%',
                'template_name' => 'LandMarketDistinctPrice',
                'key' => 'land_market_distinct_price',
                'foreign_key' =>false,
                'type' => 'string',
                'config' => false,
                'required' => true,
                'required_if'=> false,
            ],
            'land_government_price_per_unit'=>[
                'lang' => 'np',
                'name_en' => 'Land Government Price Per Unit',
                'name_np' => 'जग्गाको सरकारी मुल्य प्रती इकाइ',
                'template_name' => 'LandGovernmentPricePerUnit',
                'key' => 'land_government_price_per_unit',
                'foreign_key' =>false,
                'type' => 'string',
                'config' => false,
                'required' => true,
                'required_if'=> false,
            ],
            'land_government_price'=>[
                'lang' => 'np',
                'name_en' => 'Land Government Price',
                'name_np' => 'जग्गाको सरकारी मुल्य',
                'template_name' => 'LandGovernmentPrice',
                'key' => 'land_government_price',
                'foreign_key' =>false,
                'type' => 'string',
                'config' => false,
                'required' => true,
                'required_if'=> false,
            ],
            'land_government_distinct_price'=>[
                'lang' => 'np',
                'name_en' => 'Land Government Distinct Price',
                'name_np' => 'जग्गाको सरकारी मुल्यको ३०%',
                'template_name' => 'LandGovernmentDistinctPrice',
                'key' => 'land_government_distinct_price',
                'foreign_key' =>false,
                'type' => 'string',
                'config' => false,
                'required' => true,
                'required_if'=> false,
            ],
            'land_value'=>[
                'lang' => 'np',
                'name_en' => 'Land  Value',
                'name_np' => 'जग्गाको मुल्य',
                'template_name' => 'LandValue',
                'key' => 'land_value',
                'foreign_key' =>false,
                'type' => 'string',
                'config' => false,
                'required' => true,
                'required_if'=> false,
            ],
            'no_of_floor'=>[
                'lang' => 'np',
                'name_en' => 'No of Floors',
                'name_np' => 'जम्मा तल्ला',
                'template_name' => 'NoOfFloor',
                'key' => 'no_of_floor',
                'foreign_key' =>false,
                'type' => 'string',
                'config' => false,
                'required' => false,
                'required_if'=> false,
            ],
            'price_per_floor'=>[
                'lang' => 'np',
                'name_en' => 'Price Per Floor',
                'name_np' => 'प्रतितल्ला लागत ',
                'template_name' => 'PricePerFloor',
                'key' => 'price_per_floor',
                'foreign_key' =>false,
                'type' => 'string',
                'config' => false,
                'required' => false,
                'required_if'=> false,
            ],
            'home_cost'=>[
                'lang' => 'np',
                'name_en' => 'Home Cost',
                'name_np' => 'घरको मुल्य',
                'template_name' => 'HomeCost',
                'key' => 'home_cost',
                'foreign_key' =>false,
                'type' => 'string',
                'config' => false,
                'required' => false,
                'required_if'=> false,
            ],
            'deducted_amount'=>[
                'lang' => 'np',
                'name_en' => 'Deducted Amount',
                'name_np' => 'ह्रास कट्टी',
                'template_name' => 'DeductedAmount',
                'key' => 'deducted_amount',
                'foreign_key' =>false,
                'type' => 'string',
                'config' => false,
                'required' => false,
                'required_if'=> false,
            ],
            'home_actual_value'=>[
                'lang' => 'np',
                'name_en' => 'Home Actual Value',
                'name_np' => 'घरको वास्तविक मुल्य',
                'template_name' => 'HomeActualValue',
                'key' => 'home_actual_value',
                'foreign_key' =>false,
                'type' => 'string',
                'config' => false,
                'required' => false,
                'required_if'=> false,
            ],
            'home_total_value'=>[
                'lang' => 'np',
                'name_en' => 'Home Price',
                'name_np' => 'घरको चलनचल्तीको मुल्य',
                'template_name' => 'HomePriceValue',
                'key' => 'home_total_value',
                'foreign_key' =>false,
                'type' => 'string',
                'config' => false,
                'required' => false,
                'required_if'=> false,
            ],
            'total_assessment_value'=>[
                'lang' => 'np',
                'name_en' => 'Total Assessment Value',
                'name_np' => 'जम्मा मुल्याङ्कन मुल्य',
                'template_name' => 'TotalAssessmentValue',
                'key' => 'total_assessment_value',
                'foreign_key' =>false,
                'type' => 'string',
                'config' => false,
                'required' => true,
                'required_if'=> false,
            ],
            
        ],
        
];