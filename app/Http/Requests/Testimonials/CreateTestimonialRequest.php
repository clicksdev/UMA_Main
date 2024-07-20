<?php

namespace App\Http\Requests\Testimonials;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateTestimonialRequest extends FormRequest
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
            'username'    => ['required', 'string','min:2','max:255'],
            'major_name'  => ['required', 'string','min:2','max:255'],
            'title'       => ['required', 'string','min:2','max:255'],
            'description' => ['required', 'string','min:2'],
            'image'      => ['required','image','mimes:jpg,png,jpeg','max:10240'],
        ];
    }

}
