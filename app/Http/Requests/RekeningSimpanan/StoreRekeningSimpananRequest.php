<?php

namespace App\Http\Requests\RekeningSimpanan;

use Illuminate\Foundation\Http\FormRequest;

class StoreRekeningSimpananRequest extends FormRequest
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
            'no_rekening'           => 'required',
            'anggota_id'            => 'required',
            'tgl_daftar'            => 'required',
            'produk_simpanan_id'    => 'required',
            'saldo'                 => 'required',
        ];
    }

    public function messages()
    {
        return [
            'no_rekening.required'          => 'Nomor rekening harus diisi',
            'anggota_id.required'           => 'Nama anggota harus dipilih',
            'tgl_daftar.required'           => 'Tanggal daftar harus diisi',
            'produk_simpanan_id.required'   => 'Produk simpanan harus dipilih',
            'saldo.required'                => 'Saldo harus diisi',
        ];
    }
}
