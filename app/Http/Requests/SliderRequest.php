<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            //
            'image' => 'required|max:5048',
            'deskripsi' => 'sometimes'
        ];
    }

    public function messages()
    {
        return [
            'image.max' => 'Maksimal size adalah 5 mb'
        ];
    }
}
