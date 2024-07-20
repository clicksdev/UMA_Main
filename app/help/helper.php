<?php

use App\Models\Setting;

function loadOption($key)
{
    $setting = Setting::getOption($key);

    return ($setting) ? $setting->value : '';
}
