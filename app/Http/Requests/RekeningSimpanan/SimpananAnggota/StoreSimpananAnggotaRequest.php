<?php

namespace App\Http\Requests\RekeningSimpanan\SimpananAnggota;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class StoreSimpananAnggotaRequest extends FormRequest
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

    public function prepareForValidation()
    {
        $this->merge([
            'saldo' => floatval(str_replace(',', '.', str_replace('.', '', preg_replace('(Rp)', '', $this->saldo)))),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
        return [
            'anggota_id'           => 'required',
            'rekening_simpanan_id' => 'required',
            'produk_simpanan_id'   => 'required',
            'tgl_transaksi'        => 'required',
            'transaksi'            => 'required',
            'saldo'                => 'required',
        ];
    }

    public function messages()
    {
        return [
            'produk_simpanan_id.required' => 'Produk simpanan harus dipilih',
            'tgl_transaksi.required'      => 'Tanggal transaksi harus diisi',
            'transaksi.required'          => 'Transaksi harus diisi',
            'saldo.required'              => 'Saldo harus diisi',
        ];
    }
}
