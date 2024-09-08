<?php

namespace App\Http\Requests\Majors;

use Illuminate\Foundation\Http\FormRequest;

class CreateUpdateMajorRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'                     => 'required|string|max:255',
            'brief'                     => 'max:255',
            'duration'                  => 'required|numeric',
            'patch'                  => 'required|numeric',
            'isReady'                   => 'required|boolean',
            'started_at'                => 'required_if:isReady,1',
            'overview'                  => ['required', 'string','min:2'],
            'image'                     => ['nullable','image','mimes:jpg,png,jpeg','max:10240'],
            "levels"                    => "required|min:1",
            'levels.*.title'            => 'required|string|max:255',
            'levels.*.overview'         => 'required|string',
            'levels.*.duration'         => 'required',
            'levels.*.num_sessions'     => 'required',
            // 'levels.*.image'            => 'required',
        ];
    }

    public function messages()
    {
        return [
            'started_at.required_if'        => 'started at is required if major is available',
        ];
    }
}
