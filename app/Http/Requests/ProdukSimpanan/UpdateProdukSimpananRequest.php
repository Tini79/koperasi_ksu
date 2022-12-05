<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdukSimpananRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'no_produk' => 'required',
            'produk'    => 'required',

        ];
    }

    public function messages()
    {
        return [
            'no_produk.required' => 'Nomor produk harus diisi',
            'produk.required'    => 'Nama produk harus diisi',
        ];
    }
}
