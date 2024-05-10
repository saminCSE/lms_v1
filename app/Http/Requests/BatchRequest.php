<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BatchRequest extends FormRequest
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
            //  'batchName' => [
            //     'required',
            //     Rule::unique('courses')->ignore($this->route('id') ?? 0),
            // ],
            'courseId' => [
                'required',
            ],
            'courseStartDate' => [
                'required',
            ],
            'courseEndDate' => [
                'required',
            ],
            'publishDate' => [
                'required',
            ],
            'price' => [
                'required',
            ],
            'seatNo' => [
                'required',
            ],
            'enrollmentDate' => [
                'required',
            ],
        ];
    }
}