<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            // 'name' => [
            //     'required',
            //     Rule::unique('courses')->ignore($this->route('id') ?? 0),
            // ],
            'course_description' => [
                'required',
            ],
            'abstract' => [
                'required',
            ],
            'biblography' => [
                'required',
            ],
            'programsId' => [
                'required',
            ],
            'course_duration' => [
                'required',
            ],
            'start_time' => [
                'required',
            ],
            'end_time' => [
                'required',
            ],
        ];
    }
}
