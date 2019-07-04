<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtikelRequest extends FormRequest
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
            'judul' => 'required|min:10',
            'deskripsi' => 'required|min:10',
            'caption' => 'required|min:10',
            'id_kategori' => 'required',
            'image' => 'required',
            'video' => 'sometimes'
        ];
    }
}
