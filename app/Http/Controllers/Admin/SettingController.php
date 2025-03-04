<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateSettingRequest;
use App\Models\Setting;
use App\Http\Requests\Admin\SettingRequest;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::paginate(50);

        return view('admin.setting.index', compact('settings'));
    }

    public function edit(Setting $setting) {
        return view('admin.setting.edit', compact('setting'));
    }


    public function update(SettingRequest $request, Setting $setting)
    {
        $setting_data = $request->safe();
        if ($setting->type == 'image') {
            $setting_data = $request->safe()->except('field_value');
            if ($request->hasfile('field_value')) {
                $get_file = $request->file('field_value')->store('images/setting');
                $setting_data['field_value'] = $get_file;
            }
            
        } 




        $setting->update([
            'field_value' => $setting_data['field_value']
        ]);

        return to_route('admin.setting.index')->with('message', trans('admin.data_updated'));
    }

}
