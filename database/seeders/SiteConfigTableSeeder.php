<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class SiteConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'office_name_en' => 'Sahakari Docs',
            'office_address_en' => 'Pokhara, Nepal',
            'domain' => '##',
            'email' => '##',
            'logo' => '16300370725577_16245304436090_logo.png',
            'favicon' => '',
            'phone_en' => '',
            'fax_en' => '',
            'meta_title' => '',
            'meta_discription' => '',
            'meta_keywords' => '',

        ];

        foreach ($data as $key => $value) {

            $site_config = new \App\Models\Admin\SiteConfig();
            $site_config->config_keys = $key;

            if(is_array($value)){
                $site_config->config_values = json_encode($value);
            }else{
                $site_config->config_values = $value;
            }

            $site_config->save();
        }
    }
}
