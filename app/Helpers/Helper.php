<?php

namespace App\Helpers;

class Helper
{
    public static function getSessionFlashMsg($message, $status)
    {
        session()->flash('msg', $message);
        session()->flash('alert_status', $status);
        return true;
    }
    public static function parse_size($size)
    {
        $unit = preg_replace('/[^kmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
        $size = preg_replace('/[^0-9\.]/', '', $size); // Remove the non-numeric characters from the size.
        if ($unit) {
        // Find the position of the unit in the ordered string which is the power of magnitude to multiply a kilobyte by.
        return round($size * pow(1024, stripos('kmgtpezy', $unit[0])));
        }
        else {
        return round($size);
        }
    }
}

