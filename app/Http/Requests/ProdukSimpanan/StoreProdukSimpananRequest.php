<?php

namespace App\Http\Requests\ProdukSimpanan;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdukSimpananRequest extends FormRequest
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
            'no_produk' => 'required',
            'produk'    => 'required|unique:produk_simpanans',
            'bunga'     => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'no_produk.required' => 'Nomor produk harus diisi',
            'produk.required'    => 'Nama produk harus diisi',
            'produk.unique'      => 'Nama produk sudah terdaftar',
            'bunga.required'     => 'Bunga harus diisi',
            'bunga.numeric'      => 'Bunga harus berupa angka',
        ];
    }
}
