<?php

namespace App\Http\Requests\Courses;

use Illuminate\Foundation\Http\FormRequest;

class ApplyRequest extends FormRequest
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
            'course_patch'      => 'nullable|string',
            'course_type'      => 'nullable',
            'name'      => 'required|string',
            'phone'     => 'required|string',
            'email'     => 'required|email',
            'course'    => 'required',
            'gender'    => 'required',
            'country'    => 'required',
            'governante'    => 'required',
            'address'    => 'required',
            'qualification'    => 'required',
            'attended'    => 'required',
            'graduation'    => 'required',
            'prev_education'    => 'required',
            'job'    => 'required',
            'dob'    => 'required',
            'organization_name'    => 'required',
            'duration_of_employment'    => 'required',
            'subject_studied'    => 'nullable',
            'questions'    => 'required',
        ];
    }
}
