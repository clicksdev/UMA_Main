<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class CreateUpdateSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'site_name'                 => 'required|string|max:255',
            'logo'                      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_section_title'       => 'nullable|string|max:255',
            'shape_section_description' => 'nullable|string',
            'shape_section_image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
