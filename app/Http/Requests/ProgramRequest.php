<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProgramRequest extends FormRequest
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
    // public function rules()
    // {
    //     return [
    //       'name' => [
    //             'required',
    //             Rule::unique('programs')->ignore($this->route('id') ?? 0),
    //         ],
    //         'description' => [
    //             'required',
    //         ],
    //     ];
    // }

    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('programs')->ignore($this->route('program')->id ?? 0),
            ],
            'description' => [
                'required',
            ],
        ];
    }

}
