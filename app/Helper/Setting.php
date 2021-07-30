<?php

namespace App\Helper;

use App\Models\Setting as M_Setting;

class Setting
{
    public static function get(String $key)
    {
        return M_Setting::get($key);
    }
}
