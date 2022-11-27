<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder 
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $datas =[
            1 => ['name_en'=> 'Province 1', 'name_np' => 'प्रदेश १', 
                'districts' => [

                    [   'name_en'=> 'Bhojpur',
                        'name_np'=> 'भोजपुर',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Bhojpur Municipality',
                                'name_np'=> 'भोजपुर नगरपालिका   ',
                            ],
                            [
                                'name_en'=> 'Shadanand Municipality',
                                'name_np'=> 'षडानन्द नगरपालिका   ',
                            ],
                            [
                                'name_en'=> 'Tyamkemaiyum Rural Municipality',
                                'name_np'=> 'ट्याम्केमैयुम गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Arun Rural Municipality',
                                'name_np'=> 'अरुण गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Ramprasad Rai Rural Municipality',
                                'name_np'=> 'रामप्रसाद राइ गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'PauwaDungama Rural Municipality',
                                'name_np'=> 'पौवादुङमा गाउँपालिका ',
                            ],

                            [
                                'name_en'=> 'Salpasilichho Rural Municipality',
                                'name_np'=> 'साल्पासिलिछो गाउँपालिका  ',
                            ],

                            [
                                'name_en'=> 'Aamchok Rural Municipality',
                                'name_np'=> 'आमचोक गाउँपालिका  ',
                            ],
                            [
                                'name_en'=> 'HatuwaGadhi Rural Municipality',
                                'name_np'=> 'हतुवागढी गाउँपालिका',
                            ],
                        ],
                    ],
                    [   'name_en'=> 'Dhankuta',
                        'name_np'=> 'धनकुटा',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Pakhribas Municipality',
                                'name_np'=> 'पाख्रीबास नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Dhankuta Municipality',
                                'name_np'=> 'धनकुटा नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Mahalaxmi Municipality',
                                'name_np'=> 'महालक्ष्मी नगरपालिका',
                            ],
                            [
                                'name_en'=> 'SanguriGadhi Rural Municipality',
                                'name_np'=> 'सागुरीगढी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Khalsa Chhintang Sahidbhumi Rural Municipality',
                                'name_np'=> 'खाल्सा छिन्ताङ सहीदभूमि	गाउँपालिका ',
                            ],

                            [
                                'name_en'=> 'Chhathat Jorpati Rural Municipality',
                                'name_np'=> 'छथर जोरपाटी	गाउँपालिका',
                            ],

                            [
                                'name_en'=> 'Chaubise Rural Municipality',
                                'name_np'=> 'चौविसे गाउँपालिका ',
                            ],
                        
                        ],
                    ],  
                    [   'name_en'=> 'Ilam',
                        'name_np'=> 'ईलाम',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Ilam Municipality',
                                'name_np'=> 'इलाम नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Deumai Municipality',
                                'name_np'=> 'देउमाई नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Mai Municipality',
                                'name_np'=> 'माई नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Suryodaya Municipality',
                                'name_np'=> 'सूर्योदय नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Phakaphokthum Rural Municipality',
                                'name_np'=> 'फाकफोकथुम गाउँपालिका ',
                            ],

                            [
                                'name_en'=> 'Chulachuli Rural Municipality',
                                'name_np'=> 'चुलाचुली गाउँपालिका',
                            ],

                            [
                                'name_en'=> 'Mai Jogmai Rural Municipality',
                                'name_np'=> 'माईजोगमाई गाउँपालिका ',
                            ],


                            [
                                'name_en'=> 'Mangsebung Rural Municipality',
                                'name_np'=> 'माङसेबुङ गाउँपालिका ',
                            ],

                            [
                                'name_en'=> 'Rong Rural Municipality',
                                'name_np'=> 'रोङ	गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Sandakpur Rural Municipality',
                                'name_np'=> 'सन्दकपुर गाउँपालिका ',
                            ],
                    
                        ],
                    ],
                    [   'name_en'=> 'Jhapa',
                        'name_np'=> 'झापा',
                        'localGovt'=>[
                            [
                                'name_en'=> 'MechiNagar Municipality',
                                'name_np'=> 'मेची नगर नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Damak Municipality',
                                'name_np'=> 'दमक नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Kankai Municipality',
                                'name_np'=> 'कन्काई नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Bhadrapur Municipality',
                                'name_np'=> 'भद्रपुर नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Arjundhara Municipality',
                                'name_np'=> 'अर्जुनधारा नगरपालिका ',
                            ],

                            [
                                'name_en'=> 'ShivaSataxi Municipality',
                                'name_np'=> 'शिवसताक्षि नगरपालिका',
                            ],

                            [
                                'name_en'=> 'Gauradaha Municipality',
                                'name_np'=> 'गौरादह नगरपालिका ',
                            ],

                            [
                                'name_en'=> 'Birtamod Municipality',
                                'name_np'=> 'विर्तामोड नगरपालिका ',
                            ],

                            [
                                'name_en'=> 'Kamal Rural Municipality',
                                'name_np'=> 'कमल गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Gaurigunj Rural Municipality',
                                'name_np'=> 'गौरीगंज गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Barhadashi Rural Municipality',
                                'name_np'=> 'बाह्रदशी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Jhapa Rural Municipality',
                                'name_np'=> 'झापा गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'BuddaShanti Rural Municipality',
                                'name_np'=> 'बुद्धशान्ति गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Haldibari Rural Municipality',
                                'name_np'=> 'हल्दीवारी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Kanchankawal Rural Municipality',
                                'name_np'=> 'कचनकवल गाउँपालिका',
                            ],
                        ],
                    ],
                    [   'name_en'=> 'Khotang',
                        'name_np'=> 'खोटाङ',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Halesi Tuwachung Municipality',
                                'name_np'=> 'हलेसी तुवाचुङ नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Rupakot Majhuwagadhi Municipality',
                                'name_np'=> 'रुपाकोट मजुवागढी नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Aiselukharka Rural Municipality',
                                'name_np'=> 'ऐसेलुखर्क गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Rawa Besi Rural Municipality',
                                'name_np'=> 'रावा बेसी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Jantedhunga Rural Municipality',
                                'name_np'=> 'जन्तेढुंगा गाउँपालिका ',
                            ],

                            [
                                'name_en'=> 'Khotehang Rural Municipality',
                                'name_np'=> 'खोटेहाङ गाउँपालिका',
                            ],

                            [
                                'name_en'=> 'Kepilasgadhi Rural Municipality',
                                'name_np'=> 'केपिलासगढी गाउँपालिका',
                            ],

                            [
                                'name_en'=> 'Diprung Rural Municipality',
                                'name_np'=> 'दिप्रुङ गाउँपालिका ',
                            ],

                            [
                                'name_en'=> 'Sakela Rural Municipality',
                                'name_np'=> 'साकेला गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Barahpokhari Rural Municipality',
                                'name_np'=> 'बराहपोखरी गाउँपालिका',
                            ],
                        
                        ],
                    ],
                    [   'name_en'=> 'Morang',
                        'name_np'=> 'मोरङ',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Biratnagar Metrpolitan City',
                                'name_np'=> 'विराटनगर महानगरपालिका',
                            ],
                            [
                                'name_en'=> 'Belbari Municipality',
                                'name_np'=> 'बेलवारी नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Letang Municipality',
                                'name_np'=> 'लेटाङ नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Pathari-Sanishchare Municiplaity',
                                'name_np'=> 'पथरी शनिश्चरे नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Rangeli Municipality',
                                'name_np'=> 'रंगेली नगरपालिका ',
                            ],

                            [
                                'name_en'=> 'Ratuwamai Municipality',
                                'name_np'=> 'रतुवामाई नगरपालिका',
                            ],

                            [
                                'name_en'=> 'Sunbarshi Municiplaity',
                                'name_np'=> 'सुनवर्षी नगरपालिका',
                            ],

                            [
                                'name_en'=> 'Urlabari Municipality',
                                'name_np'=> 'उर्लावारी नगरपालिका ',
                            ],

                            [
                                'name_en'=> 'SundarHaraincha Municipality',
                                'name_np'=> 'सुन्दरहरैंचा नगरपालिका',
                            ],
                            [
                                'name_en'=> 'BudhiGanga Rural Municipality',
                                'name_np'=> 'बुढीगंगा गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Dhanpalthan Rural Municipality',
                                'name_np'=> 'धनपालथान गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Gramthan Rural Municipality',
                                'name_np'=> 'ग्रामथान गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Jahada Rural Municipality',
                                'name_np'=> 'जहदा गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Kanepokhari Rural Municipality',
                                'name_np'=> 'कानेपोखरी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Katahari Rural Municipality',
                                'name_np'=> 'कटहरी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Kerabari Rural Municipality',
                                'name_np'=> 'केरावारी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Miklajung Rural Municipality',
                                'name_np'=> 'मिक्लाजुङ गाउँपालिका',
                            ],
                        ],
                    ],
                    [   'name_en'=> 'Okhaldhunga',
                        'name_np'=> 'ओखलढुंगा',
                        'localGovt'=>[
                            [
                                'name_en'=> 'SiddiCharan Municipality',
                                'name_np'=> 'सिद्दिचरण नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Khiji Demba Rural Municipality',
                                'name_np'=> 'खिजिदेम्वा गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Champadevi Rural Municipality',
                                'name_np'=> 'चम्पादेवी  गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'ChishankhuGadhi Rural Municipality',
                                'name_np'=> 'चिशंखुगढी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'ManeBhanjyang Rural Municipality',
                                'name_np'=> 'मानेभञ्ज्याङ गाउँपालिका ',
                            ],

                            [
                                'name_en'=> 'Molung Rural Municipality',
                                'name_np'=> 'मोलुङ गाउँपालिका',
                            ],

                            [
                                'name_en'=> 'Likhu Rural Municipality',
                                'name_np'=> 'लिखु  गाउँपालिका',
                            ],

                            [
                                'name_en'=> 'Sunkoshi Rural Municipality',
                                'name_np'=> 'सुनकोशी गाउँपालिका ',
                            ],
                        ],
                    ],
                    [   'name_en'=> 'Panchthar',
                        'name_np'=> 'पाँचथर',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Phidim Municipality',
                                'name_np'=> 'फिदिम नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Phalelung Rural Municipality',
                                'name_np'=> 'फालेलुङ गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Palgunanda Rural Municipality',
                                'name_np'=> 'फाल्गुनन्द गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Hilihang Rural Municipality',
                                'name_np'=> 'हिलिहाङ गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Kummayak Rural Municipality',
                                'name_np'=> 'कुम्मायक गाउँपालिका ',
                            ],

                            [
                                'name_en'=> 'Miklajung Rural Municipality',
                                'name_np'=> 'मिक्लाजुङ गाउँपालिका',
                            ],

                            [
                                'name_en'=> 'Tumbewa Rural Municipality',
                                'name_np'=> 'तुम्वेवा गाउँपालिका',
                            ],

                            [
                                'name_en'=> 'Yangbarak Rural Municipality',
                                'name_np'=> 'याङवरक गाउँपालिका',
                            ],
                        ],
                    ],
                    [   'name_en'=> 'Sankhuwasabha',
                        'name_np'=> 'संखुवासभा',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Chainpur Municipality',
                                'name_np'=> 'चैनपुर नगरपालिका',
                            ],
                            [
                                'name_en'=> 'DharmaDevi Municipality',
                                'name_np'=> 'धर्मदेवी नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Khadbari Municipality',
                                'name_np'=> 'खाँदवारी नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Madi Municipality',
                                'name_np'=> 'मादी नगरपालिका',
                            ],
                            [
                                'name_en'=> 'PanchKhapan Municipality',
                                'name_np'=> 'पाँचखपन नगरपालिका ',
                            ],

                            [
                                'name_en'=> 'Bhot Khola Rural Municipality',
                                'name_np'=> 'भोटखोला गाउँपालिका',
                            ],

                            [
                                'name_en'=> 'Chichila Rural Municipality',
                                'name_np'=> 'चिचिला गाउँपालिका',
                            ],

                            [
                                'name_en'=> 'Makalu Rural Municipality',
                                'name_np'=> 'मकालु गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Sabhapokhari Rural Municipality',
                                'name_np'=> 'सभापोखरी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Silingchong Rural Municipality',
                                'name_np'=> 'सिलीचोङ गाउँपालिका',
                            ],

                        ],
                    ],
                    [   'name_en'=> 'Solukhumbu',
                        'name_np'=> 'सोलुखुम्बु',
                        'localGovt'=>[
                            [
                                'name_en'=> 'SoluDudhakund Municipality',
                                'name_np'=> 'सोलु दुधकुण्ड नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Mypa Dudhakoshi Rural Municipality',
                                'name_np'=> 'माप्य दुधकोशी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Khumbu PasangLhamu Rural Municipality',
                                'name_np'=> 'खुम्वु पासाङल्हमु गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Dudhakaushika Rural Municipality',
                                'name_np'=> 'दुधकौशिका गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Necha Salyan Rural Municipality',
                                'name_np'=> 'नेचासल्यान गाउँपालिका ',
                            ],

                            [
                                'name_en'=> 'Maha Kulung Rural Municipality',
                                'name_np'=> 'महाकुलुङ गाउँपालिका',
                            ],

                            [
                                'name_en'=> 'Likhu Pike Rural Municipality',
                                'name_np'=> 'लिखु पिके गाउँपालिका',
                            ],

                            [
                                'name_en'=> 'Sotang Rural Municipality',
                                'name_np'=> 'सोताङ गाउँपालिका',
                            ],
                        ],
                    ],
                    [   'name_en'=> 'Sunsari',
                        'name_np'=> 'सुनसरी',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Itahari Sub-Metropolitan City',
                                'name_np'=> 'ईटहरी उपमहानगरपालिका',
                            ],
                            [
                                'name_en'=> 'Dharan Sub-Metropolitan City',
                                'name_np'=> 'धरान उपमहानगरपालिका',
                            ],
                            [
                                'name_en'=> 'Inaruwa Municipality',
                                'name_np'=> 'ईनरुवा नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Duhabi Municipality',
                                'name_np'=> 'दुहवी नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Ramdhuni Municipality',
                                'name_np'=> 'रामधुनी नगरपालिका ',
                            ],

                            [
                                'name_en'=> 'Baraha Municipality',
                                'name_np'=> 'बराह नगरपालिका',
                            ],

                            [
                                'name_en'=> 'Dewangunj Rural Municipality',
                                'name_np'=> 'देवानगन्ज गाउँपालिका',
                            ],

                            [
                                'name_en'=> 'Koshi Rural Municipality',
                                'name_np'=> 'कोशी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Gadhi Rural Municipality',
                                'name_np'=> 'गढी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Barju Rural Municipality',
                                'name_np'=> 'बर्जु गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Bhokraha Rural Municipality',
                                'name_np'=> 'भोक्राहा गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Harinagara Rural Municipality',
                                'name_np'=> 'हरिनगरा गाउँपालिका',
                            ],
                        ], 
                    ],
                    [   'name_en'=> 'Taplejung',
                        'name_np'=> 'ताप्लेजुङ',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Phungling Municipality',
                                'name_np'=> 'फुङलिङ नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Aatharai Triveni Rural Municipality',
                                'name_np'=> 'आठराई त्रिवेणी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Sidingawa Rural Municipality',
                                'name_np'=> 'सिदिङ्वा गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Phakatanglung Rural Municipality',
                                'name_np'=> 'फक्ताङलुङ गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Mikwa Khola Rural Municipality',
                                'name_np'=> 'मिक्वाखोला गाउँपालिका ',
                            ],

                            [
                                'name_en'=> 'Meringden Rural Municipality',
                                'name_np'=> 'मेरिङदेन गाउँपालिका',
                            ],

                            [
                                'name_en'=> 'Maiwa Khola Rural Municipality',
                                'name_np'=> 'मैवाखोला गाउँपालिका',
                            ],

                            [
                                'name_en'=> 'Yangbarak Rural Municipality',
                                'name_np'=> 'याङवरक गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Sirijunga Rural Municipality',
                                'name_np'=> 'सिरीजङ्घा गाउँपालिका',
                            ],
                        ],
                    ],
                    [   'name_en'=> 'Terhathum',
                        'name_np'=> 'तेह्रथुम',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Myanglung Municipality',
                                'name_np'=> 'म्याङलुङ नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Laligurans Municipality',
                                'name_np'=> 'लालिगुँरास नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Aatharai Rural Municipality',
                                'name_np'=> 'आठराई  गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Chhathar Rural Municipality',
                                'name_np'=> 'छथर गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Phedap Rural Municipality',
                                'name_np'=> 'फेदाप  गाउँपालिका ',
                            ],

                            [
                                'name_en'=> 'Menchayayem Rural Municipality',
                                'name_np'=> 'मेन्छयायेम गाउँपालिका',
                            ],

                            
                            
                            
                        ]
                    ],
                    [  'name_en'=> 'Udayapur',
                        'name_np'=> 'उदयपुर',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Katari Municipality',
                                'name_np'=> 'कटारी  नगरपालिका',
                            ],
                            [
                                'name_en'=> 'ChaudandiGadhi Municipality',
                                'name_np'=> 'चौदण्डीगढी नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Triyuga Municipality',
                                'name_np'=> 'त्रियुगा नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Belaka Municipality',
                                'name_np'=> 'वेलका  नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Udayapur Gadhi Rural Municipality',
                                'name_np'=> 'उदयपुरगढी गाउँपालिका ',
                            ],

                            [
                                'name_en'=> 'Tapli Rural Municipality',
                                'name_np'=> 'ताप्ली गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Rautamai Rural Municipality',
                                'name_np'=> 'रौतामाई गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Sunkoshi Rural Municipality',
                                'name_np'=> 'सुनकोशी गाउँपालिका',
                            ],

                            
                        ]
                    ],
                ],
            ],
            2 => ['name_en'=> 'Madhesh Province', 'name_np' => 'मधेश प्रदेश', 
				'districts' => [

					[   'name_en'=> 'Bara',
	                 	'name_np'=> 'बारा',
	           			'localGovt'=>[
	                        [
	                            'name_en'=> 'Kalaiya Sub-Metrpolitan City',
	                            'name_np'=> 'कलैया उपमहानगरपालिका   ',
	                        ],
	                        [
	                            'name_en'=> 'Jitpur Simara Sub-Metrpolitan City',
	                            'name_np'=> 'जीतपुरसिमरा उपमहानगरपालिका  ',
	                        ],
	                        [
	                            'name_en'=> 'Kolhabi Municipality',
	                            'name_np'=> 'कोल्हवी नगरपालिका ',
	                        ],
	                        [
	                            'name_en'=> 'Nijgadh Municipality',
	                            'name_np'=> 'निजगढ नगरपालिका',
	                        ],
	                        [
	                            'name_en'=> 'Maha Gahdimai Municipality',
	                            'name_np'=> 'महागढीमाई नगरपालिका ',
	                        ],

	                        [
	                            'name_en'=> 'Simraun Gadh Municipality',
	                            'name_np'=> 'सिम्रौनगढ नगरपालिका  ',
	                        ],

	                        [
	                            'name_en'=> 'Adarsha Kotwa Rural Municipality',
	                            'name_np'=> 'आदर्श कोटवाल गाउँपालिका ',
	                        ],
	                        [
	                            'name_en'=> 'Karaiya Mai Rural Municipality',
	                            'name_np'=> 'करैयामाई गाउँपालिका',
	                        ],
	                        [
	                            'name_en'=> 'Devtaal Rural Municipality',
	                            'name_np'=> 'देवताल गाउँपालिका',
	                        ],
	                        [
	                            'name_en'=> 'PachaRouta Rural Municipality',
	                            'name_np'=> 'पचरौता नगरपालिका',
	                        ],
	                        [
	                            'name_en'=> 'Parawanipur Rural Municipality',
	                            'name_np'=> 'परवानीपुर गाउँपालिका',
	                        ],
	                        [
	                            'name_en'=> 'Prasouni Rural Municipality',
	                            'name_np'=> 'प्रसौनी गाउँपालिक',
	                        ],
	                         [
	                            'name_en'=> 'Pheta Rural Municipality',
	                            'name_np'=> 'फेटा गाउँपालिका',
	                        ],
	                        [
	                            'name_en'=> 'Bara Gadhi Rural Municipality',
	                            'name_np'=> 'बारागढी गाउँपालिका',
	                        ],
	                        [
	                            'name_en'=> 'Subarna Rural Municipality',
	                            'name_np'=> 'सुवर्ण गाउँपालिका',
	                        ],
	                         [
	                            'name_en'=> 'Bishrampur Rural Municipality',
	                            'name_np'=> 'विश्रामपुर गाउँपालिका',
	                        ],
                    	],
	               	],

			        [   'name_en'=> 'Dhanusa',
	             	    'name_np'=> 'धनुषा',
	       			    'localGovt'=>[
		                        [
		                            'name_en'=> 'Janakpur Sub-Metropolitan City',
		                            'name_np'=> 'जनकपुर उपमहानगरपालिका',
		                        ],
		                        [
		                            'name_en'=> 'Chhireshwarnath Municipality',
		                            'name_np'=> 'क्षिरेश्वरनाथ नगरपालिका  ',
		                        ],
		                        [
		                            'name_en'=> 'Ganeshman Charnath Municipality',
		                            'name_np'=> 'गणेशमान चारनाथ नगरपालिका',
		                        ],
		                        [
		                            'name_en'=> 'Dhanusadham Municipality',
		                            'name_np'=> 'धनुषाधाम नगरपालिका',
		                        ],
		                        [
		                            'name_en'=> 'Nagaraen Municipality',
		                            'name_np'=> 'नगराइन नगरपालिका ',
		                        ],

		                        [
		                            'name_en'=> 'Bideh Municipality',
		                            'name_np'=> 'विदेह नगरपालिका ',
		                        ],

		                        [
		                            'name_en'=> 'Mithila   Municipality',
		                            'name_np'=> 'मिथिला  नगरपालिका ',
		                        ],
		                        [
		                            'name_en'=> 'Shahid Nagar Municipality',
		                            'name_np'=> 'शहीदनगर नगरपालिका',
		                        ],
		                        [
		                            'name_en'=> 'Sabaila Municipality',
		                            'name_np'=> 'सबैला नगरपालिका',
		                        ],
		                        [
		                            'name_en'=> 'Kamala Siddidatri Rural Municipality',
		                            'name_np'=> 'कमला नगरपालिका',
		                        ],
		                        [
		                            'name_en'=> 'Janak Nandini Rural Municipality',
		                            'name_np'=> 'जनकनन्दिनी गाउँपालिका',
		                        ],
		                        [
		                            'name_en'=> 'Bateshwor Rural Municipality',
		                            'name_np'=> 'बटेश्वर गाउँपालिका',
		                        ],
		                         [
		                            'name_en'=> 'Mithila Bihar Rural Municipality',
		                            'name_np'=> 'मिथिला बिहारी नगरपालिका',
		                        ],
		                        [
		                            'name_en'=> 'Mukhiyapatti Musaharmiya Rural Municipality',
		                            'name_np'=> 'मुखियापट्टी मुसहरमिया गाउँपालिका',
		                        ],
		                        [
		                            'name_en'=> 'Laxminiya Rural Municipality',
		                            'name_np'=> 'लक्ष्मीनिया गाउँपालिका',
		                        ],
		                         [
		                            'name_en'=> 'Hanspur Rural Municipality',
		                            'name_np'=> 'हंसपुर नगरपालिका',
		                        ],
		                        [
		                            'name_en'=> 'Aaurahi Rural Municipality',
		                            'name_np'=> 'औरही  गाउँपालिका',
		                        ],
		                        [
		                            'name_en'=> 'Dhanauji Rural Municipality',
		                            'name_np'=> 'धनौजी गाउँपालिका',
		                        ],
	                    	],
               	 	],

					[   'name_en'=> 'Mahottari',
	                 	'name_np'=> 'महोत्तरी',
	           			'localGovt'=>[
                            [
                                'name_en'=> 'Jaleshwor Municipality',
                                'name_np'=> 'जलेश्वर नगरपालिका   ',
                            ],
                            [
                                'name_en'=> 'Bardibas Municipality',
                                'name_np'=> 'बर्दिबास नगरपालिका  ',
                            ],
                            [
                                'name_en'=> 'Gaushala Municipality',
                                'name_np'=> 'गौशाला नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Ekadara Rural Municipality',
                                'name_np'=> 'एकडारा गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Sonama Rural Municipality',
                                'name_np'=> 'सोनमा गाउँपालिका ',
                            ],

                            [
                                'name_en'=> 'Samsi Rural Municipality',
                                'name_np'=> 'साम्सी गाउँपालिका  ',
                            ],

                            [
                                'name_en'=> 'Loharpatti Rural Municipality',
                                'name_np'=> 'लोहरपट्टी नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'RamGopalpur Rural Municipality',
                                'name_np'=> 'रामगोपालपुर नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Mahottari Rural Municipality',
                                'name_np'=> 'महोत्तरी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'ManaraShiswa Municipality',
                                'name_np'=> 'मनरा शिसवा नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Matihani Municipality',
                                'name_np'=> 'मटिहानी नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Bhangaha Municipality',
                                'name_np'=> 'भँगाहा नगरपालिका',
                            ],
                                [
                                'name_en'=> 'Balawa Municipality',
                                'name_np'=> 'बलवा नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Pipara Rural Municipality',
                                'name_np'=> 'पिपरा गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Aurahi Municipality',
                                'name_np'=> 'औरही नगरपालिका',
                            ],
		               	],
		            ],

            		[   'name_en'=> 'Parsa',
						'name_np'=> 'पर्सा',
						'localGovt'=>[
	                        [
	                            'name_en'=> 'Birgunj Metropolitan',
	                            'name_np'=> 'बिरगंज महानगरपालिका ',
	                        ],
	                        [
	                            'name_en'=> 'Pokhariya Municipality',
	                            'name_np'=> 'पोखरिया नगरपालिका ',
	                        ],
	                        [
	                            'name_en'=> 'Jagarnathapur Rural Municipality',
	                            'name_np'=> 'जगरनाथपुर गाउँपालिका',
	                        ],
	                        [
	                            'name_en'=> 'Dhobini Rural Municipality',
	                            'name_np'=> 'धोबीनी गाउँपालिका',
	                        ],

	                        [
	                            'name_en'=> 'Chhipahar Mai Rural Municipality',
	                            'name_np'=> 'छिपहरमाई गाउँपालिका',
	                        ],

	                        [
	                            'name_en'=> 'Pakaha Mainpur Rural Municipality',
	                            'name_np'=> 'पकाहा मैनपुर गाउँपालिका',
	                        ],
	                        [
	                            'name_en'=> 'Bindabasini Rural Municipality',
	                            'name_np'=> 'बिन्दबासिनी गाउँपालिका',
	                        ],
	                        [
	                            'name_en'=> 'Bahudar Mai Rural Municipality',
	                            'name_np'=> 'बहुदरमाई नगरपालिका',
	                        ],
	                        [
	                            'name_en'=> 'Parsa Gadhi Municipality',
	                            'name_np'=> 'पर्सागढी नगरपालिका',
	                        ],
	                        [
	                            'name_en'=> 'Sakhuwa Prasouni Rural Municipality',
	                            'name_np'=> 'सखुवा प्रसौनी गाउँपालिका',
	                        ],
	                         [
	                            'name_en'=> 'Paterwa Sugauli Rural Municipality',
	                            'name_np'=> 'पटेर्वा सुगौली गाउँपालिका',
	                        ],
	                        [
	                            'name_en'=> 'Thori  Rural Municipality',
	                            'name_np'=> 'ठोरी गाउँपालिका',
	                        ],
	                        [
	                            'name_en'=> 'Jirabhawani Rural Municipality',
	                            'name_np'=> 'जिराभावानी गाउँपालिका',
	                        ],
	                        [
	                            'name_en'=> 'Kalikamai Rural Municipality',
	                            'name_np'=> 'कालिकामाई गाउँपालिका',
	                        ],
                    	],
		            ],

            		[	'name_en'=> 'Rautahat',
							'name_np'=> 'रौतहट',
							'localGovt'=>[
				                        [
				                            'name_en'=> 'Chandrapur Municipality',
				                            'name_np'=> 'चन्द्रपुर नगरपालिका ',
				                        ],
				                        [
				                            'name_en'=> 'Garuda Municipality',
				                            'name_np'=> 'गरुडा नगरपालिका',
				                        ],
				                        [
				                            'name_en'=> 'Gaur Municipality',
				                            'name_np'=> 'गौर नगरपालिका',
				                        ],
				                        [
				                            'name_en'=> 'BoudhiMai Municipality',
				                            'name_np'=> 'बौधीमाई नगरपालिका',
				                        ],
				                        [
				                            'name_en'=> 'Brindaban  Municipality',
				                            'name_np'=> 'वृन्दावन नगरपालिका',
				                        ],

				                        [
				                            'name_en'=> 'Devahi Gonahi  Municipality',
				                            'name_np'=> 'देवाही गोनाही   नगरपालिका',
				                        ],

				                        [
				                            'name_en'=> 'Durga Bhagawat Rural Municipality',
				                            'name_np'=> 'दुर्गा भगवती गाउँपालिका',
				                        ],
				                        [
				                            'name_en'=> 'GadhiMai  Municipality',
				                            'name_np'=> 'गढीमाई नगरपालिका',
				                        ],
				                        [
				                            'name_en'=> 'Gujara  Municipality',
				                            'name_np'=> 'गुजरा नगरपालिका',
				                        ],
				                        [
				                            'name_en'=> 'Katahariya  Municipality',
				                            'name_np'=> 'कटहरिया नगरपालिका',
				                        ],
				                        [
				                            'name_en'=> 'Madhav Narayan Municipality',
				                            'name_np'=> 'माधव नारायण नगरपालिका',
				                        ],
				                        [
				                            'name_en'=> 'Moulapur  Municipality',
				                            'name_np'=> 'मौलापुर नगरपालिका',
				                        ],
				                         [
				                            'name_en'=> 'Phatuwa Bijayapur Municipality',
				                            'name_np'=> 'फतुवा बिजयपुर नगरपालिका',
				                        ],
				                        [
				                            'name_en'=> 'Ishanath Municipality',
				                            'name_np'=> 'ईशनाथ नगरपालिका',
				                        ],
				                        [
				                            'name_en'=> 'Paroha Municipality',
				                            'name_np'=> 'परोहा नगरपालिका',
				                        ],
				                        [
				                            'name_en'=> 'Rajpur Municipality',
				                            'name_np'=> 'राजपुर नगरपालिका',
				                        ],
				                         [
				                            'name_en'=> 'Yamunamai Rural Municipality',
				                            'name_np'=> 'यमुनामाई गाउँपालिका',
				                        ],
				                         [
				                            'name_en'=> 'Rajdevi Municipality',
				                            'name_np'=> 'राजदेवी नगरपालिका',
				                        ],
                    	],
		            ],

	            	[   'name_en'=> 'Saptari',
						'name_np'=> 'सप्तरी',
						'localGovt'=>[
								[
								'name_np' => 'राजविराज नगरपालिका',
								'name_en'=> 'Rajbiraj Municipality',
								],
								[
								'name_np' => 'कञ्चनरुप नगरपालिका',
								'name_en'=> 'Kanchanrup Municipality',
								],
								[
								'name_np' => 'डाक्नेश्वरी नगरपालिका',
								'name_en'=> 'Dakneshwori Municipality',
								],
								[
								'name_np' => 'बोदे बरसाइन नगरपालिका',
								'name_en'=> 'BodeBarsain Municipality',
								],
								[
								'name_np' => 'खडक नगरपालिका',
								'name_en'=> 'Khadak Municipality',
								],
								[
								'name_np' => 'शम्भुनाथ  नगरपालिका',
								'name_en'=> 'Shambhunath Municipality',
								],
								[
								'name_np' => 'सुरुङ्गा नगरपालिका',
								'name_en'=> 'Surunga Municipality',
								],
								[
								'name_np' => 'हनुमाननगर कङ्कालिनी नगरपालिका',
								'name_en'=> 'HanumanNagar Kankalini Municipality',
								],
								[
								'name_np' => 'अग्नीसाइर कृष्णासवरन गाउँपालिका',
								'name_en'=> 'Agnisaira Krishna Sawaran Rural Municipality',
								],
								[
								'name_np' => 'छिन्नमस्ता गाउँपालिका',
								'name_en'=> 'Chhinnamasta Rural Municipality',
								],
								[
								'name_np' => 'महादेवा गाउँपालिका',
								'name_en'=> 'Mahadeva Rural Municipality',
								],
								[
								'name_np' => 'सप्तकोशी नगरपालिका',
								'name_en'=> 'Saptkoshi Rural Municipality',
								],
								[
								'name_np' => 'तिरहुत गाउँपालिका',
								'name_en'=> 'Tirhut Rural Municipality',
								],
								[
								'name_np' => 'तिलाठी कोईलाडी गाउँपालिका',
								'name_en'=> 'Tilathi Koiladi Rural Municipality',
								],
								[
								'name_np' => 'रुपनी गाउँपालिका',
								'name_en'=> 'Rupani Rural Municipality',
								],
								[
								'name_np' => 'बेल्ही चपेना गाउँपालिका',
								'name_en'=> 'Belhi Chapani Rural Municipality',
								],
								[
								'name_np' => 'विष्णुपुर गाउँपालिका',
								'name_en'=> 'Bishnupura Rural Municipality',
								],
								[
								'name_np' => 'बलान-विहुल  गाउँपालिका',
								'name_en'=> 'Balan-Bihul Rural Development',
								],
						],
					],

					[	'name_en' => 'Sarlahi',
						'name_np' => 'सर्लाही',
						'localGovt'=>[
							[
							'name_np' => 'ईश्वरपुर नगरपालिका',
							'name_en' => 'Ishworpur Municipality',
							],
							[
							'name_np' => 'मलंगवा नगरपालिका',
							'name_en' => 'Malangawa Municipality',

							],
							[
							'name_np' => 'लालबन्दी नगरपालिका',
							'name_en' => 'Lalbandi Municipality',

							],
							[
							'name_np' => 'हरिपुर नगरपालिका',
							'name_en' => 'Haripur Municipality',

							],
							[
							'name_np' => 'हरिपुर्वा नगरपालिका',
							'name_en' => 'Haripurwa Municipality',

							],
							[
							'name_np' => 'हरिवन नगरपालिका',
							'name_en' => 'Hariwan Municipality',

							],
							[
							'name_np' => 'बरहथवा नगरपालिका',
							'name_en' => 'Barahathawa Municipality',

							],
							[
							'name_np' => 'बलरा नगरपालिका',
							'name_en' => 'Balara Municipality',

							],
							[
							'name_np' => 'गोडैटा  नगरपालिका',
							'name_en' => 'Godaita Municipality',

							],
							[
							'name_np' => 'बागमती नगरपालिका',
							'name_en' => 'Bagamati Municipality',

							],
							[
							'name_np' => 'कविलासी नगरपालिका',
							'name_en' => 'Kabilasi Rural Municipality',

							],
							[
							'name_np' => 'चक्रघट्टा  गाउँपालिका',
							'name_en' => 'Chakraghatta Rural Municipality',

							],
							[
							'name_np' => 'चन्द्रनगर गाउँपालिका',
							'name_en' => 'Chandra Nagar Rural Municipality',

							],
							[
							'name_np' => 'धनकौल गाउँपालिका',
							'name_en' => 'DhanaKoul Rural Municipality',

							],
							[
							'name_np' => 'ब्रह्मपुरी  गाउँपालिका',
							'name_en' => 'Bramhapuri Rural Municipality',

							],
							[
							'name_np' => 'रामनगर गाउँपालिका',
							'name_en' => 'Ram Nagar Rural Municipality',

							],
							[
							'name_np' => 'विष्णु गाउँपालिका',
							'name_en' => 'Bishnu Rural Municipality',

							],
							[
							'name_np' => 'पर्सा',
							'name_en' => 'Parsa',

							],
							[
							'name_np' => 'कौडेना',
							'name_en' => 'Kaudena',

							],
							[
							'name_np' => 'वासवारिया',
							'name_en' => 'Basbariya',

							],
						],
					],

					[	'name_en' => 'Siraha',
						'name_np' => 'सिराहा',
						'localGovt'=> [
							[
							'name_np' => 'लहान नगरपालिका',
							'name_en' => 'Lahan Municipality',
							],
							[
							'name_np' => 'धनगढीमाई नगरपालिका',
							'name_en' => 'DhanagadhiMai Municipality',
							],
							[
							'name_np' => 'सिराहा नगरपालिका',
							'name_en' => 'Siraha Municipality',
							],
							[
							'name_np' => 'गोलबजार नगरपालिका',
							'name_en' => 'GolBazaar Municipality',
							],
							[
							'name_np' => 'मिर्चैया नगरपालिका',
							'name_en' => 'Mirchaiya Municipality',
							],
							[
							'name_np' => 'कल्याणपुर नगरपालिका',
							'name_en' => 'Kalyanpur Municipality',
							],
							[
							'name_np' => 'भगवानपुर गाउँपालिका',
							'name_en' => 'Bhagawanpur Rural Municipality',
							],
							[
							'name_np' => 'औरही गाउँपालिका',
							'name_en' => 'Aaurahi Rural Municipality',
							],
							[
							'name_np' => 'विष्णुपुर गाउँपालिका',
							'name_en' => 'Bishnupur Rural Municipality',
							],
							[
							'name_np' => 'सुखीपुर नगरपालिका',
							'name_en' => 'Sukhipur Rural Municipality',
							],
							[
							'name_np' => 'कर्जन्हा नगरपालिका',
							'name_en' => 'Karjanha Rural Municipality',
							],
							[
							'name_np' => 'बरियारपट्टी गाउँपालिका',
							'name_en' => 'Bariyarpatti Rural Municipality',
							],
							[
							'name_np' => 'लक्ष्मीपुर पतारी गाउँपालिका',
							'name_en' => 'Laxmipur Patari Rural Municipality',
							],
							[
							'name_np' => 'नरहा गाउँपालिका',
							'name_en' => 'Naraha Rural Municipality',
							],
							[
							'name_np' => 'सखुवानान्कारकट्टी गाउँपालिका',
							'name_en' => 'Sakhuwanankarkatti Rural Municipality',
							],
							[
							'name_np' => 'अर्नमा गाउँपालिका',
							'name_en' => 'Arnama Rural Municipality',
							],
							[
							'name_np' => 'नवराजपुर गाउँपालिका',
							'name_en' => 'Nawarajpur Rural Municipality',
							],
						],
					],
                ],
            ],
            3 => ['name_en'=> 'Bagmati Province', 'name_np' => 'वागमति प्रदेश', 
            	'districts' => [
                    [   'name_en'=> 'Bhaktapur',
                        'name_np'=> 'भक्तपुर',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Changunarayan Municipality',
                                'name_np'=> 'चाँगुनारायण नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Bhaktapur Municipality',
                                'name_np'=> 'भक्तपुर नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Madhyapur Thimi Municipality',
                                'name_np'=> 'मध्यपुर थिमी नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Surya Binayak Municipality',
                                'name_np'=> 'सूर्यविनायक नगरपालिका ',
                            ],
                            
                        ]
                    ],


                    [   'name_en'=> 'Chitwan',
                        'name_np'=> 'चितवन',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Bharatpur Metropolitan City',
                                'name_np'=> 'भरतपुर महानगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Kalika Municipality',
                                'name_np'=> 'कालिका नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Khairhani Municipality',
                                'name_np'=> 'खैरहनी नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Ichchhakamana Rural Municipality',
                                'name_np'=> 'इच्छाकामना गाउँपालिका',
                            ],
                                [
                                'name_en'=> 'Madi Municipality',
                                'name_np'=> 'माडी नगरपालिका ',
                            ],
                                [
                                'name_en'=> 'Ratna Nagar Municipality',
                                'name_np'=> 'रत्ननगर नगरपालिका ',
                            ],
                                [
                                'name_en'=> 'Rapti Municipality',
                                'name_np'=> 'राप्ती नगरपालिका',
                            ],
                        ],
                    ],


                    [   'name_en'=> 'Dhading',
                        'name_np'=> 'धादिङ',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Dhunibesi Municipality',
                                'name_np'=> 'धुनीबेंशी नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Nilkantha Municipality',
                                'name_np'=> 'निलकण्ठ नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Khaniyabas Rural Municipality',
                                'name_np'=> 'खनियाबास गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Gajuri Rural Municipality',
                                'name_np'=> 'गजुरी गाउँपालिका',
                            ],
                                [
                                'name_en'=> 'Galchhi Rural Municipality',
                                'name_np'=> 'गल्छी गाउँपालिका ',
                            ],
                                [
                                'name_en'=> 'Ganga Jamuna Rural Municipality',
                                'name_np'=> 'गङ्गाजमुना गाउँपालिका ',
                            ],
                                [
                                'name_en'=> 'Jwalamukhi Rural Municipality',
                                'name_np'=> 'ज्वालामूखी गाउँपालिका',
                            ],

                            [
                                'name_en'=> 'Thakre Rural Municipality',
                                'name_np'=> 'थाक्रे गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Netrawati Rural Municipality',
                                'name_np'=> 'नेत्रावती गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Benighat Rorang Rural Municipality',
                                'name_np'=> 'बेनीघाट रोराङ्ग गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Rubi Valley Rural Municipality',
                                'name_np'=> 'रुवी भ्याली गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Sidda Lekh Rural Municipality',
                                'name_np'=> 'सिद्धलेक गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Tripura Sundari Rural Municipality',
                                'name_np'=> 'त्रिपुरासुन्दरी गाउँपालिका',
                            ],
                        ],
                    ],
                    [   'name_en'=> 'Dholkha',
                        'name_np'=> 'दोलखा',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Jiri Municipality',
                                'name_np'=> 'जिरी  नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Bhithwor Rural Muncipality',
                                'name_np'=> 'वैतेश्वर  गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Kalinchok Rural Municipality',
                                'name_np'=> 'कालिन्चोक  गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Gauri Shankar Rural Municipality',
                                'name_np'=> 'गौरिशंकर  गाउँपालिका',
                            ],
                                [
                                'name_en'=> 'Tamakoshi Rural Municipality',
                                'name_np'=> 'तामाकोशी  गाउँपालिका',
                            ],
                                [
                                'name_en'=> 'Melung Rural Municipality',
                                'name_np'=> 'मेलुङ  गाउँपालिका',
                            ],
                                [
                                'name_en'=> 'Bigu Rural Municipality',
                                'name_np'=> 'विगु गाउँपालिका',
                            ],

                            [
                                'name_en'=> 'Shailung Rural Municipality',
                                'name_np'=> 'शैलुङ  गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Bhimeshwor Municipality',
                                'name_np'=> 'भिमेश्वर नगरपालिका',
                            ],
				                            
                        ],
                    ],

 						
 					[   'name_en'=> 'Kathmandu',
                        'name_np'=> 'काठमाडौं',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Kathmandu Metropolitan City',
                                'name_np'=> 'काठमाण्डौ महानगरपालिका',
                            ],
                            [
                                'name_en'=> 'Kageswori-Manohara Municipality',
                                'name_np'=> 'कागेश्वरी मनोहरा नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Kirtipur Municipality',
                                'name_np'=> 'किर्तिपुर नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Gokarneshwor Municipality',
                                'name_np'=> 'गोकर्णेश्वर नगरपालिका',
                            ],
                                [
                                'name_en'=> 'Chandragiri Municipality',
                                'name_np'=> 'चन्द्रागिरी नगरपालिका',
                            ],
                                [
                                'name_en'=> 'Tokha Municipality',
                                'name_np'=> 'टोखा नगरपालिका',
                            ],
                                [
                                'name_en'=> 'Tarkeshwor Municiplaity',
                                'name_np'=> 'तारकेश्वर नगरपालिका',
                            ],
                            
                            [
                                'name_en'=> 'Daxinkali Municipality',
                                'name_np'=> 'दक्षिणकाली नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Nagarjun Municipality',
                                'name_np'=> 'नागार्जुन नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Budhanialkantha Municipality',
                                'name_np'=> 'बुढानिलकण्ठ नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Sankharapur Municipality',
                                'name_np'=> 'शङ्खरापुर नगरपालिका',
                            ],
				                            
                        ],
                    ],

                    [   'name_en'=> 'Kabhrepalanchok',
                        'name_np'=> 'काभ्रेपलाञ्चोक',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Dhulikhel Municipality',
                                'name_np'=> 'धुलिखेल नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Banepa Municipality',
                                'name_np'=> 'बनेपा नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Panauti Municipality',
                                'name_np'=> 'पनौती नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Panchkhal Municipality',
                                'name_np'=> 'पाँचखाल नगरपालिका',
                            ],
                                [
                                'name_en'=> 'Namobuddha Municipality',
                                'name_np'=> 'नमोबुद्ध नगरपालिका',
                            ],
                                [
                                'name_en'=> 'Mandan Deupur Municipality',
                                'name_np'=> 'मण्डनदेउपुर नगरपालिका',
                            ],
                                [
                                'name_en'=> 'Khanikhola Rural Municipality',
                                'name_np'=> 'खानीखोला गाउँपालिका',
                            ],
                            
                            [
                                'name_en'=> 'Chaunri Deurali Rural Municipality',
                                'name_np'=> 'चौंरीदेउराली गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Temal Rural Municipality',
                                'name_np'=> 'तेमाल गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Bethanchok Rural Municipality',
                                'name_np'=> 'बेथानचोक गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Bhumlu Rural Municipality',
                                'name_np'=> 'भुम्लु गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Mahabharat Rural Municipality',
                                'name_np'=> 'महाभारत गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Roshi Rural Municipality',
                                'name_np'=> 'रोशी गाउँपालिका',
                            ],
				                            
                        ],
                    ],

                    [   'name_en'=> 'Lalitpur',
                        'name_np'=> 'ललितपुर',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Lalitpur Metropolitan City',
                                'name_np'=> 'ललितपुर महानगरपालिका',
                            ],
                            [
                                'name_en'=> 'Godawari Municipality',
                                'name_np'=> 'गोदावरी नगरपालिका',
                            ],
                            [
                                'name_en'=> 'MahaLaxmi Municipality',
                                'name_np'=> 'महालक्ष्मी नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Konjyosom Rural Municipality',
                                'name_np'=> 'कोन्ज्योसोम गाउँपालिका',
                            ],
                                [
                                'name_en'=> 'Bagmati Rural Municipality',
                                'name_np'=> 'बाग्मती गाउँपालिका',
                            ],
                                [
                                'name_en'=> 'Mahankal Rural Municipality',
                                'name_np'=> 'महाङ्काल गाउँपालिका',
                            ],                  
                        ],
                    ],
                    [   'name_en'=> 'Makwanpur',
                        'name_np'=> 'मकवानपुर',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Hetauda Sub-Metropolitan City',
                                'name_np'=> 'हेटौडा उपमहानगरपालिका',
                            ],
                            [
                                'name_en'=> 'Thaha Municipality',
                                'name_np'=> 'थाहा नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Indra Sarobar Rural Municipality',
                                'name_np'=> 'ईन्द्र सरोवर गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Kailash Rural Municipality',
                                'name_np'=> 'कैलाश गाउँपालिका',
                            ],
                                [
                                'name_en'=> 'Bakaiya Rural Municipality',
                                'name_np'=> 'बकैया गाउँपालिका',
                            ],
                                [
                                'name_en'=> 'Bagmati Rural Municipality',
                                'name_np'=> 'बाग्मती गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Bhimphedi Rural Municipality',
                                'name_np'=> 'भीमफेदी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Makawanpur Gadhi Rural Municipality',
                                'name_np'=> 'मकवानपुरगढी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Manahari Rural Municipality',
                                'name_np'=> 'मनहरी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Raksirang Rural Municipality',
                                'name_np'=> 'राक्सिराङ्ग गाउँपालिका',
                            ],                  
                        ],
                    ],
                    [   'name_en'=> 'Nuwakot',
                        'name_np'=> 'नुवाकोट',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Bidur Municipality',
                                'name_np'=> 'विदुर नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Belkot Gadhi Municipality',
                                'name_np'=> 'बेलकोटगढी नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Kakani Rural Municipality',
                                'name_np'=> 'ककनी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Kispang Rural Municipality',
                                'name_np'=> 'किस्पाङ गाउँपालिका',
                            ],
                                [
                                'name_en'=> 'Tadi Rural Municipality',
                                'name_np'=> 'तादी गाउँपालिका',
                            ],
                                [
                                'name_en'=> 'Tarkeshwor Rural Municipality',
                                'name_np'=> 'तारकेश्वर गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Dupcheshwor Rural Municipality',
                                'name_np'=> 'दुप्चेश्वर गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'PanchaKanya Rural Municipality',
                                'name_np'=> 'पञ्चकन्या गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Likhu Rural Municipality',
                                'name_np'=> 'लिखु गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Meghang Rural Municipality',
                                'name_np'=> 'मेघाङ गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Shivpuri Rural Municipality',
                                'name_np'=> 'शिवपुरी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Surya Gadhi Rural Municipality',
                                'name_np'=> 'सुर्यगढी गाउँपालिका',
                            ],
				                             
				                            
                        ]
                    ],	
       			    [   'name_en'=> 'Ramechhap',
                        'name_np'=> 'रामेछाप',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Manthali Municipality',
                                'name_np'=> 'मन्थली नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Ramechhap Municipality',
                                'name_np'=> 'रामेछाप नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Umakunda Rural Municipality',
                                'name_np'=> 'उमाकुण्ड गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'KhandaDevi Rural Municipality',
                                'name_np'=> 'खाँडादेवी गाउँपालिका',
                            ],
                                [
                                'name_en'=> 'Gokul Ganga Rural Municipality',
                                'name_np'=> 'गोकुलगङ्गा गाउँपालिका',
                            ],
                                [
                                'name_en'=> 'Doramba Rural Municipality',
                                'name_np'=> 'दोरम्बा गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Likhu Rural Municipality',
                                'name_np'=> 'लिखु गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Sunapati Rural Municipality',
                                'name_np'=> 'सुनापती गाउँपालिका',
                            ],
				                            
				                             
				                            
                        ]
                    ],
                    [   'name_en'=> 'Rasuwa',
                        'name_np'=> 'रसुवा',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Uttar Gaya Rural Municipality',
                                'name_np'=> 'उत्तरगया गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Kalika Rural Municipality',
                                'name_np'=> 'कालिका गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'GosaiKunda Rural Municipality',
                                'name_np'=> 'गोसाईकुण्ड गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'NauKunda Rural Municipality',
                                'name_np'=> 'नौकुण्ड गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Aamachodingmo Rural Municipality',
                                'name_np'=> 'आमाछोदिङमो गाउँपालिका',
                            ],
				                            
				                            
				                             
				                            
                        ]
                    ],


                    [   'name_en'=> 'Sindhuli',
                        'name_np'=> 'सिन्धुली',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Kamalamai Municipality',
                                'name_np'=> 'कमलामाई नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Dudhauli Municipality',
                                'name_np'=> 'दुधौली नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Golanjor Rural Municipality',
                                'name_np'=> 'गोलन्जोर गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Ghyanglekh Rural Municipality',
                                'name_np'=> 'घ्याङलेख गाउँपालिका',
                            ],
                                [
                                'name_en'=> 'Teen Patan Rural Municipality',
                                'name_np'=> 'तिनपाटन गाउँपालिका',
                            ],
                                [
                                'name_en'=> 'Phikkal Rural Municipality',
                                'name_np'=> 'फिक्कल गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Marin Rural Municipality',
                                'name_np'=> 'मरिण गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Sunkoshi Rural Municipality',
                                'name_np'=> 'सुनकोशी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Hariharpur Gadhi Rural Municipality',
                                'name_np'=> 'हरिहरपुरगढी गाउँपालिका',
                            ],
				                                                    
				                            
                        ],
                    ],


                    [   'name_en'=> 'Sindhupalchok',
                        'name_np'=> 'सिन्धुपाल्चोक',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Chautara Sangachokgadhi Municipality',
                                'name_np'=> 'चौतारा साँगाचोकगढी नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Barhabise Municipality',
                                'name_np'=> 'वाह्रविसे नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Melamchi Municipality',
                                'name_np'=> 'मेलम्ची नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Indrawati Rural Municipality',
                                'name_np'=> 'र्इन्द्रावती गाउँपालिका',
                            ],
                                [
                                'name_en'=> 'Jugal Rural Municipality',
                                'name_np'=> 'जुगल गाउँपालिका',
                            ],
                                [
                                'name_en'=> 'PanchaPokhari Rural Municipality',
                                'name_np'=> 'पाँचपोखरी थाङपाल  गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Balephi Rural Municipality',
                                'name_np'=> 'बलेफी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Bhotekoshi Rural Municipality',
                                'name_np'=> 'भोटेकोशी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Lishankhu Pakhar Rural Municipality',
                                'name_np'=> 'लिसंखु पाखर गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Sunkoshi Rural Municipality',
                                'name_np'=> 'सुनकोशी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Helambu Rural Municipality',
                                'name_np'=> 'हेलम्बु  गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'TripuraSundari Rural Municipality',
                                'name_np'=> 'त्रिपुरासुन्दरी गाउँपालिका',
                            ],
				                                                    
                        ],
                    ],

                ],
            ],
            4 => ['name_en'=> 'Gandaki Province', 'name_np' => 'गण्डकी प्रदेश',
                'districts' => [
                    [   'name_en'=> 'Mustang',
                        'name_np'=> 'मुस्ताङ',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Gharapjhong Gaunpalika',
                                'name_np'=> 'घरपझोङ गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Thangsang Gaunpalika',
                                'name_np'=> 'थासाङ गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Dalome Gaunpalika',
                                'name_np'=> 'दालोमे गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Lomanthang Gaunpalika',
                                'name_np'=> 'लोमन्थाङ गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Barhagau Muktichhetra Gaunpalika',
                                'name_np'=> 'वाह्रगाउँ मुक्तिक्षेत्र  गाउँपालिका ',
                            ],
                        ]
                    ],
                    [   'name_en'=> 'Manang',
                        'name_np'=> 'मनाङ',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Chame Gaunpalika',
                                'name_np'=> 'चामे गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Narphu Gaunpalika',
                                'name_np'=> 'नारफू गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Nasong Gaunpalika',
                                'name_np'=> 'नाशोङ  गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Nesyang Gaunpalika',
                                'name_np'=> 'नेस्याङ गाउँपालिका ',
                            ],
                        ]
                    ],
                    [   'name_en'=> 'Myagdi',
                        'name_np'=> 'म्याग्दी',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Beni Nagarpalika',
                                'name_np'=> 'बेनी नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Annapurna Gaunpalika',
                                'name_np'=> 'अन्नपूर्ण  गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Dhawalagiri Gaunpalika',
                                'name_np'=> 'धवलागिरी   गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Mangala Gaunpalika',
                                'name_np'=> 'मंगला गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Malika Gaunpalika',
                                'name_np'=> 'मालिका  गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Raghuganga Gaunpalika',
                                'name_np'=> 'रघुगंगा   गाउँपालिका ',
                            ],
                        ]
                    ],
                    [   'name_en'=> 'Baglung',
                        'name_np'=> 'वाग्लुङ',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Baglung Nagarpalika',
                                'name_np'=> 'बागलुङ नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Galkot Nagarpalika',
                                'name_np'=> 'गल्कोट नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Jaimuni Nagarpalika',
                                'name_np'=> 'जैमूनी नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Dhorpatan Nagarpalika',
                                'name_np'=> 'ढोरपाटन नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Bareng Gaunpalika',
                                'name_np'=> 'वरेङ गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Katheykhola Gaunpalika',
                                'name_np'=> 'काठेखोला गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Tamankhola Gaunpalika',
                                'name_np'=> 'तमानखोला गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Tarakhola Gaunpalika',
                                'name_np'=> 'ताराखोला गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Nisikhola Gaunpalika',
                                'name_np'=> 'निसीखोला गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Badigad Gaunpalika',
                                'name_np'=> 'वडिगाड गाउँपालिका',
                            ],

                        ]
                    ],
                    [   'name_en'=> 'Parbat',
                        'name_np'=> 'पर्वत',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Kusma Nagarpalika',
                                'name_np'=> 'कुश्मा नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Phalewas Nagarpalika',
                                'name_np'=> 'फलेवास नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Jaljala Gaunalika',
                                'name_np'=> 'जलजला गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Paiyun Gaunpalika',
                                'name_np'=> 'पैयूं गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Mahashila Gaunpalika',
                                'name_np'=> 'महाशिला गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Modi Gaunpalika',
                                'name_np'=> 'मोदी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Bihadi Gaunpalika',
                                'name_np'=> 'विहादी गाउँपालिका ',
                            ],
                        ]
                    ],
                    [   'name_en'=> 'Syangja',
                        'name_np'=> 'स्याङजा',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Galyang  Nagarpalika',
                                'name_np'=> 'गल्याङ नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Chapakot Nagarpalika',
                                'name_np'=> 'चापाकोट नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Putalibazar Nagarpalika',
                                'name_np'=> 'पुतलीबजार नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Bheerkot Nagarpalika',
                                'name_np'=> 'भीरकोट नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Waling Nagarpalika',
                                'name_np'=> 'वालिङ नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Arjun Chaupari Gaunpalika',
                                'name_np'=> 'अर्जुनचौपारी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Aandhikhola Gaunpalika',
                                'name_np'=> 'आँधिखोला गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Kaligandaki Gaunpalika',
                                'name_np'=> 'कालीगण्डकी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Phedikhola Gaunpalika',
                                'name_np'=> 'फेदीखोला गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Harinas Gaunpalika',
                                'name_np'=> 'हरिनास गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Biruwa Gaunpalika',
                                'name_np'=> 'बिरुवा गाउँपालिका ',
                            ],
                        ]
                    ],
                    [   'name_en'=> 'Tanahun',
                        'name_np'=> 'तनहुँ',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Bhanu Nagarpalika',
                                'name_np'=> 'भानु नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Bhimad Nagarpalika',
                                'name_np'=> 'भिमाद नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Vyas Nagarpalika',
                                'name_np'=> 'व्यास नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Shuklagandaki Nagarpalika',
                                'name_np'=> 'शुक्लागण्डकी नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Anbu Khaireni Gaunpalika',
                                'name_np'=> 'आँबुखैरेनी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Rhishing Gaunpalika',
                                'name_np'=> 'ऋषिङ्ग गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Ghiring Gaunpalika',
                                'name_np'=> 'घिरिङ गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Myagde Gaunpalika',
                                'name_np'=> 'म्याग्दे गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Devghat Gaunpalika',
                                'name_np'=> 'देवघाट गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Bandipur Gaunpalika',
                                'name_np'=> 'वन्दिपुर गाउँपालिका ',
                            ],
                        ]
                    ],
                    [   'name_en'=> 'Nawalpur',
                        'name_np'=> 'नवलपुर',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Kawasati Nagarpalika',
                                'name_np'=> 'कावासोती नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Gaindakot Nagarpalika',
                                'name_np'=> 'गैडाकोट नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Devachuli Nagarpalika',
                                'name_np'=> 'देवचुली नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Madhyabindu Nagarpalika',
                                'name_np'=> 'मध्यविन्दु नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Bungdikali Gaunpalika',
                                'name_np'=> 'बुङ्दीकाली गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Bulingtar Gaunpalika',
                                'name_np'=> 'बुलिङटार गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Binayi Tribeni Gaunpalika',
                                'name_np'=> 'विनयी त्रिवेणी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Hupsekot Gaunpalika',
                                'name_np'=> 'हुप्सेकोट गाउँपालिका ',
                            ],
                        ]
                    ],
                    [   'name_en'=> 'Gorkha',
                        'name_np'=> 'गोरखा',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Gorkha Nagarpalika',
                                'name_np'=> 'गोरखा नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Palungtar Nagarpalika',
                                'name_np'=> 'पालुङटार नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Sulikot Gaunpalika',
                                'name_np'=> 'सुलीकोट गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Siranchowk Gaunpalika',
                                'name_np'=> 'सिरानचोक गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Ajirkot Gaunpalika',
                                'name_np'=> 'अजिरकोट गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Aarughat Gaunpalika',
                                'name_np'=> 'आरूघाट गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Gandaki Gaunpalika',
                                'name_np'=> 'गण्डकी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Chumnubri Gaunpalika',
                                'name_np'=> 'चुमनुव्री गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Gharche Gaunpalika',
                                'name_np'=> 'धार्चे गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Bhimsen Gaunpalika',
                                'name_np'=> 'भिमसेन गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Shahid Lakhan Gaunpalika',
                                'name_np'=> 'शहिद लखन गाउँपालिका ',
                            ],
                        ]
                    ],
                    [   'name_en'=> 'Kaski',
                        'name_np'=> 'कास्की ',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Pokhara Mahanagarpalika',
                                'name_np'=> 'पोखरा महानगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Annapurna Gaunpalika',
                                'name_np'=> 'अन्नपूर्ण गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Machapuchre Gaunpalika',
                                'name_np'=> 'माछापुच्छ्रे गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Madi Gaunpalika',
                                'name_np'=> 'मादी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Rupa Gaunpalika',
                                'name_np'=> 'रूपा गाउँपालिका ',
                            ],
                        ]
                    ],
                    [   'name_en'=> 'Lamjung',
                        'name_np'=> 'लमजुङ ',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Besisahar Nagarpalika',
                                'name_np'=> 'बेसीशहर नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Madhya Nepal Nagarpalika',
                                'name_np'=> 'मध्यनेपाल नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Rainas Nagarpalika',
                                'name_np'=> 'रार्इनास नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Sundarbajar Nagarpalika',
                                'name_np'=> 'सुन्दरबजार नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Kohlasothar Gaunpalika',
                                'name_np'=> 'क्व्होलासोथार गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Dudhpokhari Gaunpalika',
                                'name_np'=> 'दूधपोखरी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Dordi Gaunpalika',
                                'name_np'=> 'दोर्दी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Marsyangdi Gaunpalika',
                                'name_np'=> 'मर्स्याङदी गाउँपालिका ',
                            ],
                        ]
                    ],

                ],

            ],
            5 => ['name_en'=> 'Lumbini Province', 'name_np' => 'लुम्बिनी प्रदेश', 
                'districts' => [
                    [   'name_en'=> 'Kapilvastu',
                        'name_np'=> 'कपिलवस्तु',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Kapilbastu Municipality',
                                'name_np'=> 'कपिलवस्तु नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Buddabhumi Municipality',
                                'name_np'=> 'बुद्धभूमी नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Shivaraj Municipality',
                                'name_np'=> 'शिवराज नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Maharajganj Municipality',
                                'name_np'=> 'महाराजगंज नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Krishna Nagar Municipality',
                                'name_np'=> 'कृष्णनगर नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Banganga Municipality',
                                'name_np'=> 'बाणगंगा नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Mayadevi Rural Municipality',
                                'name_np'=> 'मायादेवी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Yashodhara Rural Municipality',
                                'name_np'=> 'यसोधरा गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Suddodhana Rural Municipality',
                                'name_np'=> 'शुद्धोधन गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Bijay Nagar Rural Municipality',
                                'name_np'=> 'विजयनगर गाउँपालिका ',
                            ],
                        ],
                    ],
                    [   'name_en'=> 'Parasi',
                        'name_np'=> 'परासी',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Bardaghat Municipality',
                                'name_np'=> 'बर्दघाट नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Ramgram Municipality',
                                'name_np'=> 'रामग्राम नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Sunwal Municipality',
                                'name_np'=> 'सुनवल नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Susta Rural Municipality',
                                'name_np'=> 'सुस्ता गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Palhi Nandan Rural Municipality',
                                'name_np'=> 'पाल्हीनन्दन गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Pratappur Rural Municipality',
                                'name_np'=> 'प्रतापपुर गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Sarawal Rural Municipality',
                                'name_np'=> 'सरावल गाउँपालिका ',
                            ],
                        ]
                    ],
                    [   'name_en'=> 'Rupandehi',
                        'name_np'=> 'रुपन्देही',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Butwal Sub-Metropolitan City',
                                'name_np'=> 'बुटवल उपमहानगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Devdaha Municipality',
                                'name_np'=> 'देवदह नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Lumbini Sanskritik Municipality',
                                'name_np'=> 'लुम्बिनी सांस्कृतिक नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Siddharthanagar Municipality',
                                'name_np'=> 'सिद्धार्थनगर नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Saina Maina Municipality',
                                'name_np'=> 'सैनामैना नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Tilottama Municipality',
                                'name_np'=> 'तिलोत्तमा नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Gaidahawa Rural Municipality',
                                'name_np'=> 'गैडहवा गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Kanchan Rural Municipality',
                                'name_np'=> 'कंचन गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Kotahi Mai Rural Municipality',
                                'name_np'=> 'कोटहीमाई गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Marchawari Rural Municipality',
                                'name_np'=> 'मर्चवारी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Mayadevi Rural Municipality',
                                'name_np'=> 'मायादेवी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Om Satiya Rural Municipality',
                                'name_np'=> 'ओमसतिया गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Rohini Rural Municipality',
                                'name_np'=> 'रोहिणी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Sammari Mai Rural Municipality',
                                'name_np'=> 'सम्मरीमाई गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Siyari Rural Municipality',
                                'name_np'=> 'सियारी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Suddodhana Rural Municipality',
                                'name_np'=> 'शुद्धोधन गाउँपालिका ',
                            ],
                        ]
                    ],
                    [   'name_en'=> 'Arghakhanchi',
                        'name_np'=> 'अर्घाखाँची',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Sandhikharka Municipality',
                                'name_np'=> 'सन्धिखर्क नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Shit Ganga Municipality',
                                'name_np'=> 'सितगंगा नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Bhumikasthan Municipality',
                                'name_np'=> 'भूमिकास्थान नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Chhatra Dev Rural Municipality',
                                'name_np'=> 'छत्रदेव गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Panini Rural Municipality',
                                'name_np'=> 'पाणिनी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Malarani Rural Municipality',
                                'name_np'=> 'मालारानी गाउँपालिका ',
                            ],
                            

                        ]
                    ],
                    [   'name_en'=> 'Gulmi',
                        'name_np'=> 'गुल्मी',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Chandrakot Rural Municipality',
                                'name_np'=> 'चन्द्रकोट गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Resunga Municipality',
                                'name_np'=> 'रेसुङ्गा नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Kali Gandaki Rural Municipality',
                                'name_np'=> 'कालीगण्डकी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Ruru Rural Municipality',
                                'name_np'=> 'रुरु गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Gulmi Durbar Rural Municipality',
                                'name_np'=> 'गुल्मीदरवार गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Isma Rural Municipality',
                                'name_np'=> 'ईस्मा गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Musikot  Municipality',
                                'name_np'=> 'मुसिकोट नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Madane Rural Municipality',
                                'name_np'=> 'मदाने गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'ChhatrakotRural Rural Municipality',
                                'name_np'=> 'छत्रकोट गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Dhurkot Rural Municipality',
                                'name_np'=> 'धुर्कोट गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Malika Rural Municipality',
                                'name_np'=> 'मालिका गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Satyawati Rural Municipality',
                                'name_np'=> 'सत्यवती गाउँपालिका ',
                            ],
                           
                        ]
                    ],
                    [   'name_en'=> 'Palpa',
                        'name_np'=> 'पाल्पा',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Rampur Municipality',
                                'name_np'=> 'रामपुर नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Tansen Municipality',
                                'name_np'=> 'तानसेन नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Nisdi Rural Municipality',
                                'name_np'=> 'निस्दी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Purba Khola Rural Municipality',
                                'name_np'=> 'पूर्वखोला गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Rambha Rural Municipality',
                                'name_np'=> 'रम्भा गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Matha Gadhi Rural Municipality',
                                'name_np'=> 'माथागढी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Tinau Rural Municipality',
                                'name_np'=> 'तिनाउ गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Bagnaskali Rural Municipality',
                                'name_np'=> 'बगनासकाली गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Ribdikot Rural Municipality',
                                'name_np'=> 'रिब्दिकोट गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Raina Devi Chhahara Rural Municipality',
                                'name_np'=> 'रैनादेवी छहरा गाउँपालिका ',
                            ],
                           
                        ]
                    ],
                    [   'name_en'=> 'Dang',
                        'name_np'=> 'दाङ',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Tulsipur Sub-Metropolitan City',
                                'name_np'=> 'तुल्सिपुर उपमहानगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Ghorahi Sub-Metropolitan City',
                                'name_np'=> 'घोराही उपमहानगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Lamahi Municipality',
                                'name_np'=> 'लमही नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Banglachuli Rural Municipality',
                                'name_np'=> 'बंगलाचुली गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Dangi Sharan Rural Municipality',
                                'name_np'=> 'दंगीशरण गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Gadhawa Rural Municipality',
                                'name_np'=> 'गढवा गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Rajpur Rural Municipality',
                                'name_np'=> 'राजपुर गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Rapti Rural Municipality',
                                'name_np'=> 'राप्ती गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Shanti Nagar Rural Municipality',
                                'name_np'=> 'शान्तिनगर गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Babai Rural Municipality',
                                'name_np'=> 'बबई गाउँपालिका ',
                            ],
                        ]
                    ],
                    [   'name_en'=> 'Pyuthan',
                        'name_np'=> 'प्युठान',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Pyuthan Municipality',
                                'name_np'=> 'प्यूठान नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Swargadwari Municipality',
                                'name_np'=> 'स्वर्गद्वारी नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Gaumukhi Rural Municipality',
                                'name_np'=> 'गौमुखी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Mandavi Rural Municipality',
                                'name_np'=> 'माण्डवी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Sarumarani Rural Municipality',
                                'name_np'=> 'सरुमारानी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Mallarani Rural Municipality',
                                'name_np'=> 'मल्लरानी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Nau Bahini Rural Municipality',
                                'name_np'=> 'नौवहिनी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Jhimaruk Rural Municipality',
                                'name_np'=> 'झिमरुक गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Eairabati Rural Municipality',
                                'name_np'=> 'ऐरावती गाउँपालिका',
                            ],
                        ]
                    ],
                    [   'name_en'=> 'Rolpa',
                        'name_np'=> 'रोल्पा',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Rolpa Municipality',
                                'name_np'=> 'रोल्पा नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Triveni Rural Municipality',
                                'name_np'=> 'त्रिवेणी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Dui Kholi Rural Municipality',
                                'name_np'=> 'दुईखोली गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Madi Rural Municipality',
                                'name_np'=> 'माडी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Runti Gadhi Rural Municipality',
                                'name_np'=> 'रुन्टीगढी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Lungri Rural Municipality',
                                'name_np'=> 'लुङग्री गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Sukidaha Rural Municipality',
                                'name_np'=> 'सुकिदह गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Sunchhahari Rural Municipality',
                                'name_np'=> 'सुनछहरी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Subarnawati Rural Municipality',
                                'name_np'=> 'सुवर्णावती गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Thawang Rural Municipality',
                                'name_np'=> 'थवाङ गाउँपालिका ',
                            ],
                           
                        ]
                    ],
                    [   'name_en'=> 'Eastern Rukum',
                        'name_np'=> 'पूर्वी रूकुम',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Putha Uttar Ganga Rural Municipality',
                                'name_np'=> 'पुथा उत्तरगंगा गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Bhume Rural Municipality',
                                'name_np'=> 'भूमे गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Sisne Rural Municipality',
                                'name_np'=> 'सिस्ने गाउँपालिका',
                            ],
                            
                        ]
                    ],
                          
                    [   'name_en'=> 'Bardiya ',
                        'name_np'=> 'बर्दिया',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Gulariya Municipality',
                                'name_np'=> 'गुलरिया नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Madhuvan Municipality',
                                'name_np'=> 'मधुवन नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Rajapur Taratal Municipality',
                                'name_np'=> 'राजापुर ताराताल नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Thakura Baba Municipality',
                                'name_np'=> 'ठाकुरबाबा नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Bansgadhi Municipality',
                                'name_np'=> 'बासगढी नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Bar Bardiya Municipality',
                                'name_np'=> 'बारबर्दिया नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Badhaiya Tal Rural Municipality',
                                'name_np'=> 'बढैयाताल गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Geruwa Rural Municipality',
                                'name_np'=> 'गेरुवा गाउँपालिका ',
                            ],
                        ]
                    ],

                    [   'name_en'=> 'Banke',
                        'name_np'=> 'बाँके ',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Nepalgunj Sub-Metropolitan City',
                                'name_np'=> 'नेपालगंज उपमहानगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Kohalpur Municipality',
                                'name_np'=> 'कोहलपुर नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Narainapur Rural Municipality',
                                'name_np'=> 'नरैनापुर गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Raptisonari Rural Municipality',
                                'name_np'=> 'राप्ती सोनारी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Baijanath Rural Municipality',
                                'name_np'=> 'बैजनाथ गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Khajura Rural Municipality',
                                'name_np'=> 'खजुरा गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Duduwa Rural Municipality',
                                'name_np'=> 'डुडुवा गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Janaki Rural Municipality',
                                'name_np'=> 'जानकी गाउँपालिका ',
                            ],
                        ]
                    ],

                ],
            ],
            6 => ['name_en'=> 'Karnali Province', 'name_np' => 'कणालि प्रदेश', 
                'districts' => [
                    [   'name_en'=> 'Dailekh',
                        'name_np'=> 'दैलेख',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Narayan Municipality',
                                'name_np'=> 'नारायण नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Dullu Municipality',
                                'name_np'=> 'दुल्लु नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Chamunda Bindrasaini Municipality',
                                'name_np'=> 'चामुण्डा विन्द्रासैनी नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Aathbis Municipality',
                                'name_np'=> 'आठबीस नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Bhagawatimai Rural Municipality',
                                'name_np'=> 'भगवतीमाई गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Gurans Rural Municipality',
                                'name_np'=> 'गुराँस गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Dungeshwar Rural Municipality',
                                'name_np'=> 'डुंगेश्वर गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Naumule Rural Municipality',
                                'name_np'=> 'नौमुले गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Mahabu Rural Municipality',
                                'name_np'=> 'महावु गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Bhairabi Rural Municipality',
                                'name_np'=> 'भैरवी गाउँपालिका ',
                            ],
                             [
                                'name_en'=> 'Thantikandh Rural Municipality',
                                'name_np'=> 'ठाँटीकाँध गाउँपालिका ',
                            ],
                             

                        ]
                    ],
                    [   'name_en'=> 'Dolpa',
                        'name_np'=> 'डोल्पा',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Thuli Bheri Municipality',
                                'name_np'=> 'ठूली भेरी नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Tripurasundari Municipality',
                                'name_np'=> 'त्रिपुरासुन्दरी नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Dolpo Buddha Rural Municipality',
                                'name_np'=> 'डोल्पो बुद्ध गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'She Phoksundo Rural Municipality',
                                'name_np'=> 'शे फोक्सुन्डो गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Jagadulla Rural Municipality',
                                'name_np'=> 'जगदुल्ला गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Mudkechula Rural Municipality',
                                'name_np'=> 'मुड्केचुला गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Kaike Rural Municipality',
                                'name_np'=> 'काईके गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Chharka Tangsong Rural Municipality',
                                'name_np'=> 'छार्का ताङसोङ गाउँपालिका ',
                            ],

                        ]
                    ],
                    [   'name_en'=> 'Humla',
                        'name_np'=> 'हुम्ला',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Simkot Rural Municipality',
                                'name_np'=> 'सिमकोट गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Namkha Rural Municipality',
                                'name_np'=> 'नाम्खा गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Kharpunath Rural Municipality',
                                'name_np'=> 'खार्पुनाथ गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Sarkegad Rural Municipality',
                                'name_np'=> 'सर्केगाड गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Chankheli Rural Municipality',
                                'name_np'=> 'चंखेली गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Adanchuli Rural Municipality',
                                'name_np'=> 'अदानचुली गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Tajakot Rural Municipality',
                                'name_np'=> 'ताँजाकोट गाउँपालिका',
                            ],
                            
                           
                        ]
                    ],
                    [   'name_en'=> 'Jajarkot',
                        'name_np'=> 'जाजरकोट',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Bheri Municipality',
                                'name_np'=> 'भेरी नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Chhedagad Municipality',
                                'name_np'=> 'छेडागाड नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Tribeni Nalgad Municipality',
                                'name_np'=> 'त्रिवेणी नलगाड नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Kushe Rural Municipality',
                                'name_np'=> 'कुसे गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Junichande Rural Municipality',
                                'name_np'=> 'जुनीचाँदे गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Barekot Rural Municipality',
                                'name_np'=> 'बारेकोट गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Shivalaya Rural Municipality',
                                'name_np'=> 'शिवालय गाउँपालिका ',
                            ],
                           
                            

                        ]
                    ],
                    [   'name_en'=> 'Jumla',
                        'name_np'=> 'जुम्ला',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Chandannath Municipality',
                                'name_np'=> 'चन्दननाथ नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Kankasundari Rural Municipality',
                                'name_np'=> 'कनकासुन्दरी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Sinja  Rural Municipality',
                                'name_np'=> 'सिंजा गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Hima Rural Municipality',
                                'name_np'=> 'हिमा गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Tila Rural Municipality',
                                'name_np'=> 'तिला गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Guthichaur Rural Municipality',
                                'name_np'=> 'गुठिचौर गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Tatopani Rural  Municipality',
                                'name_np'=> 'तातोपानी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Patarasi Rural Municipality',
                                'name_np'=> 'पातारासी गाउँपालिका',
                            ],         
                        ]
                    ],
                    [   'name_en'=> 'Kalikot',
                        'name_np'=> 'कालिकोट',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Khandachakra Municipality',
                                'name_np'=> 'खाँडाचक्र नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Raskot Municipality',
                                'name_np'=> 'रास्कोट नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Tilagufa Municipality',
                                'name_np'=> 'तिलागुफा नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Pachaljharana Rural Municipality',
                                'name_np'=> 'पचालझरना गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Sanni Triveni Rural Municipality',
                                'name_np'=> 'सान्नी त्रिवेणी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Narharinath Rural Municipality',
                                'name_np'=> 'नरहरिनाथ गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Shubha Kalika Rural Municipality',
                                'name_np'=> ' शुभ कालिका गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Mahawai Rural Municipality',
                                'name_np'=> 'महावै गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Palata Rural Municipality',
                                'name_np'=> 'पलाता गाउँपालिका ',
                            ],
                            
                           
                        ]
                    ],
                    [   'name_en'=> 'Mugu',
                        'name_np'=> 'मुगु',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Chhayanath Rara Municipality',
                                'name_np'=> 'छायाँनाथ रारा नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Mugum Karmarong Rural Municipality',
                                'name_np'=> 'मुगुम कार्मारोंग गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Soru Rural Municipality',
                                'name_np'=> 'सोरु गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Khatyad Rural Municipality',
                                'name_np'=> 'खत्याड गाउँपालिका',
                            ],
                            
                        ]
                    ],
                    [   'name_en'=> 'Salyan ',
                        'name_np'=> 'सल्यान',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Shaarda Municipality',
                                'name_np'=> 'शारदा नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Bagchaur Municipality',
                                'name_np'=> 'बागचौर नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Bangad Kupinde Municipality',
                                'name_np'=> 'बनगाड कुपिण्डे नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Kalimati Rural Municipality',
                                'name_np'=> 'कालीमाटी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Tribeni Rural Municipality',
                                'name_np'=> 'त्रिवेणी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Kapurkot Rural Municipality',
                                'name_np'=> 'कपुरकोट गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Chatreshwari Rural Municipality',
                                'name_np'=> 'छत्रेश्वरी गाउँपालिका ',
                            ],
                            [
                                'name_en'=> 'Siddha Kumakh Rural Municipality',
                                'name_np'=> 'सिद्ध कुमाख गाउँपालिका ',
                            ],
                           
                            [
                                'name_en'=> 'Darma Rural Municipality',
                                'name_np'=> 'दार्मा गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Kumakh Rural Municipality ',
                                'name_np'=> 'कुमाख  गाउँपालिका',
                            ],
                        ]
                    ],
                    [   'name_en'=> 'Surkhet',
                        'name_np'=> 'सुर्खेत',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Birendranagar Municipality',
                                'name_np'=> 'बीरेन्द्रनगर नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Bheriganga Municipality',
                                'name_np'=> 'भेरीगंगा नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Gurbha Kot Municipality',
                                'name_np'=> 'गुर्भाकोट नगरपालिका ',
                            ],
                            [
                                'name_en'=> ' Panchapuri Municipality',
                                'name_np'=> 'पञ्चपुरी नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Lekbesi Municipality',
                                'name_np'=> 'लेकबेशी नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Chaukune Rural Municipality',
                                'name_np'=> 'चौकुने गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Barahatal Rural Municipality',
                                'name_np'=> 'बराहताल गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Chingad Rural Municipality',
                                'name_np'=> 'चिङ्गाड गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Simta Rural Municipality',
                                'name_np'=> 'सिम्ता गाउँपालिका',
                            ],
                            
                           
                        ]
                    ],
                    [   'name_en'=> 'Western Rukum',
                        'name_np'=> 'रुकुम ( पश्चिम )',
                        'localGovt'=>[
                            [
                                'name_en'=> 'Musikot Muncipility',
                                'name_np'=> 'मुसिकोट नगरपालिका ',
                            ],
                            [
                                'name_en'=> 'Chaurjahari Municipality',
                                'name_np'=> 'चौरजहारी नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Aadthbiskot Municipality',
                                'name_np'=> 'आठबिसकोट नगरपालिका',
                            ],
                            [
                                'name_en'=> 'Bafikot Rural Development',
                                'name_np'=> 'बाँफिकोट गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Triveni Rural Development',
                                'name_np'=> 'त्रिवेणी गाउँपालिका',
                            ],
                            [
                                'name_en'=> 'Sani Bheri Rural Development',
                                'name_np'=> 'सानी भेरी गाउँपालिका',
                            ],
                            
                        ]
                    ],
                ],
            ],
            7 => ['name_en'=> 'Sudur Paschim Province', 'name_np' => 'सुदुर पश्चिम् प्रदेश', 
                    'districts' => [
                        [   'name_en'=> 'Accham',
                            'name_np'=> 'अछाम',
                            'localGovt'=>[
                                [
                                    'name_en'=> 'Mangalsen Municipality',
                                    'name_np'=> 'मंगलसेन नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Sanfebagar Municipality',
                                    'name_np'=> 'साफेबगर नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Kamalbazar Municipality',
                                    'name_np'=> 'कमलबजार नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Panchdeval Binayak Municipality',
                                    'name_np'=> 'पञ्चदेवल विनायक नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Chourpati Rural Municipality',
                                    'name_np'=> 'चौरपाटी गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Mellekh Rural Municipality',
                                    'name_np'=> 'मेल्लेख गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Bannigadhi Jayagadh Rural Municipality',
                                    'name_np'=> 'बान्नीगढी जयगढ गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Rama Roshan Rural Municipality',
                                    'name_np'=> 'रामारोशन गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Dhakari Rural Municipality',
                                    'name_np'=> 'ढकारी गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Turmakhand Rural Municipality',
                                    'name_np'=> 'तुर्माखाँद गाउँपालिका',
                                ],
                                
                            ],
                        ],
                        [   'name_en'=> 'baitadi',
                            'name_np'=> 'बैतडी',
                            'localGovt'=>[
                                [
                                    'name_en'=> 'Dasharath Chanda Municipality',
                                    'name_np'=> 'दशरथचन्द नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Patan Municipality',
                                    'name_np'=> 'पाटन नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Melauli Municipality',
                                    'name_np'=> 'मेलौली नगरपालिका',
                                ],
                            
                                [
                                    'name_en'=> 'Purchaundi Municipality',
                                    'name_np'=> 'पुर्चौडी नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Surnaiya Rural Municipality',
                                    'name_np'=> 'सुर्नया गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Sigas Rural Municipality',
                                    'name_np'=> 'सिगास गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Shivanath Rural Municipality',
                                    'name_np'=> 'शिवनाथ गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Pancheshwor Rural Municipality',
                                    'name_np'=> 'पन्चेश्वर गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Dogada Keda Rural Municipality',
                                    'name_np'=> 'दोगडाकेदार गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Dilasaini Rural Municipality',
                                    'name_np'=> 'डीलासैनी गाउँपालिका',
                                ],
                                
                            ],
                        ],
                        [   'name_en'=> 'bajhang',
                            'name_np'=> 'बझाङ',
                            'localGovt'=>[
                                [
                                    'name_en'=> 'Jaya Prithvi Municipality',
                                    'name_np'=> 'जयपृथ्वी नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Bungal Municipality',
                                    'name_np'=> 'बुंगल नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Talkot Rural Municipality',
                                    'name_np'=> 'तलकोट गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Masta Rural Municipality',
                                    'name_np'=> 'मष्टा गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Khaptadchhanna Rural Municipality',
                                    'name_np'=> 'खप्तडछान्ना गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Thalara Rural Municipality',
                                    'name_np'=> 'थलारा गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Bitthadchir Rural Municipality',
                                    'name_np'=> 'वित्थडचिर गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Surma Rural Municipality',
                                    'name_np'=> 'सूर्मा गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Chhabis Pathibhera Rural Municipality',
                                    'name_np'=> 'छबिसपाथिभेरा गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Durgathali Rural Municipality',
                                    'name_np'=> 'दुर्गाथली गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Kedarsyun Rural Municipality',
                                    'name_np'=> 'केदारस्युँ गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Kanda Rural Municipality',
                                    'name_np'=> 'काँडा गाउँपालिका',
                                ],
                            ],
                        ],
                        
                        [   'name_en'=> 'bajura',
                            'name_np'=> 'बाजुरा',
                            'localGovt'=>[
                                [
                                    'name_en'=> 'Budhi Nanda Municipality',
                                    'name_np'=> 'बुढीनन्दा नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Triveni Municipality',
                                    'name_np'=> 'त्रिवेणी नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Budhi Ganga Municipality',
                                    'name_np'=> 'बुढीगंगा नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Gaumul Rural Municipality',
                                    'name_np'=> 'गौमुल गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'SwamiKartik Rural Municipality',
                                    'name_np'=> 'स्वामीकार्तिक गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Chhededaha Rural Municipality',
                                    'name_np'=> 'छेडेदह गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Himali Rural Municipality',
                                    'name_np'=> 'हिमाली गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Pandav Gupha Rural Municipality',
                                    'name_np'=> 'पाण्डव गुफा गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Badi Malika Municipality',
                                    'name_np'=> 'बडिमालिका नगरपालिका',
                                ],
                            ],
                        ],


                        [   'name_en'=> 'darchula',
                            'name_np'=> 'दार्चुला',
                            'localGovt'=>[
                                [
                                    'name_en'=> 'Mahakali Municipality',
                                    'name_np'=> 'महाकाली नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Sailya Shikhar Municipality',
                                    'name_np'=> 'शैल्यशिखर नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Malikarjun Rural Municipality',
                                    'name_np'=> 'मालिकार्जुन गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Api Himal Rural Municipality',
                                    'name_np'=> 'अपिहिमाल गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Duhun Rural Municipality',
                                    'name_np'=> 'दुहुँ गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Naugad Rural Municipality',
                                    'name_np'=> 'नौगाड गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Marma Rural Municipality',
                                    'name_np'=> 'मार्मा गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Lekam Rural Municipality',
                                    'name_np'=> 'लेकम गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Byans Rural Municipality',
                                    'name_np'=> 'ब्यास गाउँपालिका',
                                ],
                            ],
                        ],
                                
                        [   'name_en'=> 'doti',
                            'name_np'=> 'डोटी',
                            'localGovt'=>[
                                [
                                    'name_en'=> 'Dipayal-Silgadi Municipality',
                                    'name_np'=> 'दिपायल सिलगढी नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Shikhar Municipality',
                                    'name_np'=> 'शिखर नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Purbi Chouki Rural Municipality',
                                    'name_np'=> 'पूर्वीचौकी गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Badikedar Rural Municipality',
                                    'name_np'=> 'बडीकेदार गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Jorayal Rural Municipality',
                                    'name_np'=> 'जोरायल गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Sayal Rural Municipality',
                                    'name_np'=> 'सायल गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Aadarsha Rural Municipality',
                                    'name_np'=> 'आदर्श गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'K.I. Singh Rural Municipality',
                                    'name_np'=> 'के.आई.सिं. गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Bogtan Rural Municipality',
                                    'name_np'=> 'बोगटान गाउँपालिका',
                                ],
                            ],
                        ],
                            

                        [   'name_en'=> 'kailali',
                            'name_np'=> 'कैलाली',
                            'localGovt'=>[
                                [
                                    'name_en'=> 'Dhangadhi Sub-Metropolitan City',
                                    'name_np'=> 'धनगढी उपमहानगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Tikapur Muncipality',
                                    'name_np'=> 'टिकापुर नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Ghodaghodi Municipality',
                                    'name_np'=> 'घोडाघोडी नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Lamki-Chuha Municipality',
                                    'name_np'=> 'लम्की चुहा नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Bhajani Municipality',
                                    'name_np'=> 'भजनी नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Godavari Municipality',
                                    'name_np'=> 'गोदावरी नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Gauri Ganga Municipality',
                                    'name_np'=> 'गौरीगंगा नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Janaki Rural Municipality',
                                    'name_np'=> 'जानकी गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Bardagoriya Rural Municipality',
                                    'name_np'=> 'बर्दगोरीया गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Mohanyal Rural Municipality',
                                    'name_np'=> 'मोहन्याल गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Kailari Rural Municipality',
                                    'name_np'=> 'कैलारी गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Joshipur Rural Municipality',
                                    'name_np'=> 'जोशीपुर गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Chure Rural Municipality',
                                    'name_np'=> 'चुरे गाउँपालिका',
                                ],
                            ],
                        ],
                        [   'name_en'=> 'kanchanpur',
                            'name_np'=> 'कंचनपुर',
                            'localGovt'=>[
                                [
                                    'name_en'=> 'Bhimdatta Municipality',
                                    'name_np'=> 'भीमदत्त नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Punarbas Municipality ',
                                    'name_np'=> 'पुनर्वास नगरपालिका ',
                                ],
                                [
                                    'name_en'=> 'Bedkot Municipality ',
                                    'name_np'=> 'वेदकोट नगरपालिका ',
                                ],
                                [
                                    'name_en'=> 'Mahakali Municipality',
                                    'name_np'=> 'माहाकाली नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Shuklaphanta Municipality',
                                    'name_np'=> 'सुक्लाफाँटा नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Belauri Municipality',
                                    'name_np'=> 'बेलौरी नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Krishnapur Municipality ',
                                    'name_np'=> 'कृष्णपुर नगरपालिका ',
                                ],
                                [
                                    'name_en'=> 'Beldandi Rural Municipality',
                                    'name_np'=> 'बेलडाडी गाउँपालिका ',
                                ],
                                [
                                    'name_en'=> 'Laljhadi Rural Municipality',
                                    'name_np'=> 'लालझाँडी गाउँपालिका  ',
                                ],
                            ],
                        ],
                        [   'name_en'=> 'dadeldhura',
                            'name_np'=> 'डडेलधुरा',
                            'localGovt'=>[
                                [
                                    'name_en'=> 'Amargadhi Municipality',
                                    'name_np'=> 'अमरगढी नगरपालिका',
                                ],
                                [
                                    'name_en'=> 'Parshuram Municipality ',
                                    'name_np'=> 'परशुराम नगरपालिका ',
                                ],
                                [
                                    'name_en'=> 'Aalital Rural Municipality ',
                                    'name_np'=> 'आलिताल गाउँपालिका ',
                                ],
                                [
                                    'name_en'=> 'Bhageshwor Rural Municipality',
                                    'name_np'=> 'भागेश्वर गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Navadurga Rural Municipality',
                                    'name_np'=> 'नवदुर्गा गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Ajayameru Rural Municipality',
                                    'name_np'=> 'अजयमेरु गाउँपालिका',
                                ],
                                [
                                    'name_en'=> 'Ganyapadhura Rural Municipality',
                                    'name_np'=> 'गन्यापधुरा गाउँपालिका',
                                ],

                            ],
                        ],

                    ],
            ],
        ];

        foreach ($datas as $key=>$data) {
            $pro_id = \App\Models\Address\Province::create([
                'id'            => $key,
                'name_en'       => $data['name_en'],
                'name_np'       => $data['name_np'],
            ]);

            foreach($data['districts'] as $district)
            {
                $dis_id = \App\Models\Address\District::create([
                    'province_id' => $pro_id->id,
                    'name_en' => $district['name_en'],
                    'name_np' => $district['name_np'],
                ]);

                foreach ($district['localGovt'] as $mun) {
                    \App\Models\Address\LocalGovt::create([
                        'district_id' => $dis_id->id,
                        'name_en' => $mun['name_en'],
                        'name_np' => $mun['name_np'],
                    ]);
                }
            }
        }
    }
}
