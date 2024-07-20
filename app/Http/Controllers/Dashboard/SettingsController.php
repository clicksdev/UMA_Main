<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\CreateUpdateSettingRequest;
use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;

class SettingsController extends Controller
{
    public function index()
    {
        return view('backend.modules.settings.index');
    }

    public function store(CreateUpdateSettingRequest $request)
    {
        foreach ($request->except('_token', 'logo', 'shape_section_image', 'partners_image') as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        if ($request->hasFile('logo')) {
            $logoSetting = Setting::updateOrCreate(['key' => 'logo']);
            $logoSetting->clearMediaCollection('logo');
            $logoSetting->addMedia($request->file('logo'))->toMediaCollection('logo');
        }

        if ($request->hasFile('shape_section_image')) {
            $shapeImageSetting = Setting::updateOrCreate(['key' => 'shape_section_image']);
            $shapeImageSetting->clearMediaCollection('shape_section_image');
            $shapeImageSetting->addMedia($request->file('shape_section_image'))->toMediaCollection('shape_section_image');
        }

        if ($request->hasFile('partners_image')) {
            $shapeImageSetting = Setting::updateOrCreate(['key' => 'partners_image']);
            $shapeImageSetting->clearMediaCollection('partners_image');
            $shapeImageSetting->addMedia($request->file('partners_image'))->toMediaCollection('partners_image');
        }

        Toastr::success('settings updated successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully');
    }
}
