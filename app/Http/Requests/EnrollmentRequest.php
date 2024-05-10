<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrollmentRequest extends FormRequest
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
            'courseId' => [
                'required',
            ],
            'batchId' => [
                'required',
            ],
            'studentId' => [
                'required',
            ],
            'studentEmail' => [
                'required',
            ],
            'enrollmentDate' => [
                'required',
            ],
            'enrollStatus' => [
                'required',
            ],  
           'contactStatus' => [
                'required',
            ],   
            'amount' => [
                'required',
            ],
        ];
    }
}
