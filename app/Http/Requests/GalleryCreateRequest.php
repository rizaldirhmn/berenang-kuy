<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryCreateRequest extends FormRequest
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
            'name' => 'required|min:5',
            'image' => 'required|max:5048',
            'deskripsi' => 'sometimes'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama foto harus diisi',
            'name.min' => 'Nama minimal 5 karakter',
            'image.required' => 'Gambar harus diisi',
            'image.max' => 'Maksimal size adalah 5 mb'
        ];
    }
}
