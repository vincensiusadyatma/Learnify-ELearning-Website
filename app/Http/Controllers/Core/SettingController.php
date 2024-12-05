<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function showSetting()
    {
        return view('core.setting');
    }

    public function showProfile()
    {
        return view('core.profile');
    }
}
