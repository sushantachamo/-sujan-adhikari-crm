<?php
namespace App\Libraries\HelperClass;

use App\Models\Admin\SiteConfig;
use App\Models\Address\District;
use App\Models\Address\Province;
use App\Models\Address\LocalGovt;


class ViewHelper
{

    public static function getAssetPath($path, $asset_type){

        $asset_path = config('myPath.assets.theme.panel.'.$asset_type);

        return asset($asset_path.$path);
    }

    public static function getFrontAssetPath($path, $asset_type){

        $asset_path = config('myPath.assets.theme.frontEnd.'.$asset_type);

        return asset($asset_path.$path);
    }

    public static function getImagePath($folder, $image_name)
    {

       // dd(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$folder.DIRECTORY_SEPARATOR.$image_name);
        if(file_exists(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$folder.DIRECTORY_SEPARATOR.$image_name) && !is_null($image_name))
        {
            return asset('images/'.$folder.'/'.$image_name);
        }
        return asset('images/no_image.png');
    }

    public static function convertNumberEnToNp($english_number)
    {
        $english_number_array = str_split($english_number);
        $nepali_number = '';
        foreach ($english_number_array as  $num) {
            switch ($num) {
                case "0": $nepali_number .= "०"; break;
                case "1": $nepali_number .= "१"; break;
                case "2": $nepali_number .= "२"; break;
                case "3": $nepali_number .= "३"; break;
                case "4": $nepali_number .= "४"; break;
                case "5": $nepali_number .= "५"; break;
                case "6": $nepali_number .= "६"; break;
                case "7": $nepali_number .= "७"; break;
                case "8": $nepali_number .= "८"; break;
                case "9": $nepali_number .= "९"; break;
                default : $nepali_number .= $num; break;
            }
        }
        return $nepali_number;
    }

    public static function convertNumberNpToEn($nepali_number)
    {
        $nepali_number_array =[];
        preg_match_all('/./u', $nepali_number, $nepali_number_array);
        $english_number = '';
        foreach ($nepali_number_array[0] as  $num) {
            switch ($num) {
                case "०": $english_number .= "0"; break;
                case "१": $english_number .= "1"; break;
                case "२": $english_number .= "2"; break;
                case "३": $english_number .= "3"; break;
                case "४": $english_number .= "4"; break;
                case "५": $english_number .= "5"; break;
                case "६": $english_number .= "6"; break;
                case "७": $english_number .= "7"; break;
                case "८": $english_number .= "8"; break;
                case "९": $english_number .= "9"; break;
                default : $english_number .= $num; break;
            }
        }
        return $english_number;
    }


    public static function printLimitString($x, $length)
    {
      if(strlen($x)<=$length)
      {
        return $x;
      }
      else
      {
        $y=substr($x,0,$length) . '...';
        return $y;
      }
    }

    public static function getSiteInfo()
    {

        $site_info = SiteConfig::pluck('config_values', 'config_keys');
        $office_head = null;
        $spokesperson = null; 
        $information_officer = null; 

        if(isset($site_info['office_head']))
            $office_head = Staffs::where('id', $site_info['office_head'])->first();


        if(isset($site_info['spokesperson']))
            $spokesperson = Staffs::where('id', $site_info['spokesperson'])->first();

        if(isset($site_info['information_officer']))
            $information_officer = Staffs::where('id', $site_info['information_officer'])->first();

        return [
                    'general_info' => $site_info,
                    'office_head' => $office_head,
                    'spokesperson' => $spokesperson,
                    'information_officer' => $information_officer,
                ];
    }

    public static function getAddress($array, $format = 'permanent')
    {
        $address = '';
        if($format == 'permanent')
        {
            $local_govt = LocalGovt::getName($array['p_local_govt']);
            $district = District::getName($array['p_district']);
            $province = Province::getName($array['p_province']);
            $ward  = ViewHelper::convertNumberEnToNp($array['p_ward']);
            $tole  = $array['p_tole'];
        }
        else
        {
            $local_govt = LocalGovt::getName($array['t_local_govt']);
            $district = District::getName($array['t_district']);
            $province = Province::getName($array['t_province']);
            $ward  = ViewHelper::convertNumberEnToNp($array['t_ward']);
            $tole  = $array['t_tole'];
        }

        $address = ViewHelper::getAddressString($province, $district, $local_govt, $ward, $tole);

        return $address;
    }

    public static function getFullAddress($array, $format = 'permanent')
    {
        $local_govt = LocalGovt::getName($array['localgovt']);
        $district = District::getName($array['district']);
        $province = Province::getName($array['province']);
        $ward  = ViewHelper::convertNumberEnToNp($array['ward']);
        $tole  = $array['tole'];
        
        $address = '';
        if($local_govt && $ward)
            $address .= $local_govt.'- '.$ward;
        elseif($local_govt)
            $address .= $local_govt;

        if($tole && $tole != '-' )
            $address.= ', '.$tole;

        if($district)
            $address.=', '.$district;

        if($province)
            $address.=', '.$province;

        return $address;
    }


    public static function getAddressString($province=null, $district=null, $local_govt=null, $ward=null, $tole=null)
    {

        $local_govt = LocalGovt::getName($local_govt);
        $district = District::getName($district);
        $province = Province::getName($province);
        $ward  = ViewHelper::convertNumberEnToNp($ward);
        $tole  = $tole;

        $address = '';
        if($local_govt && $ward)
            $address .= $local_govt.'- '.$ward;
        elseif($local_govt)
            $address .= $local_govt;

        if($tole && $tole != '-' )
            $address.= ', '.$tole;

        if($district)
            $address.=', '.$district;

        if($province)
            $address.=', '.$province;

        return $address ;
    }

    public static function docsValueGenerator($data, $type, $foreign_key, $lang, $config=false)
    {
        if($type == 'number')
        {
            if($foreign_key== 'province')
            {
                $province = Province::where('id', $data)->first();
                return isset($province) && $province ? $province['name_'.$lang] : '-';
            }
            elseif($foreign_key== 'district')
            {
                $district = District::where('id', $data)->first();
                return isset($district) && $district ? $district['name_'.$lang] : '-' ;
            }
            elseif($foreign_key== 'localgovt')
            {
                $localgovt = LocalGovt::where('id', $data)->first();
                return isset($localgovt) && $localgovt ? $localgovt['name_'.$lang] : '-';
            }
            else
            {
                if($lang =='np')
                    return ViewHelper::convertNumberEnToNp($data);
                else
                    return ViewHelper::convertNumberNpToEn($data);
            }
        }
        elseif($type == 'datetime')
        {
            if($data!= null)
            {
                return \Carbon\Carbon::parse($data)->format('Y-m-d');
            }
            else
            return $data;

        }
        else
        {
            if($config)
            {
                return config($config.'.'.$data);
            }
            else
            {
                if($lang == 'np')
                    return ViewHelper::convertNumberEnToNp($data);
                else
                    return ViewHelper::convertNumberNpToEn($data);
            }

        }
    }

}