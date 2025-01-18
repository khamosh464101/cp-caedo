<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Traits\ApiResponse;

class SettingController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $settings = Setting::get();

        return response($settings);
    }
}
