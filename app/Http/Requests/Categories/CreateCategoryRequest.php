<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCategoryRequest extends FormRequest
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
            'name_ar'    => ['required', 'string','min:2','max:255'],
            'name_en'    => ['required', 'string','min:2','max:255'],
            'hex_color'  => ['required', 'string','min:2','max:255'],
            //'logo'       => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:10240'],
        ];
    }

}
