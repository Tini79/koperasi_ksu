<?php

namespace App\Http\Requests\Pinjaman;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StorePinjamanRequest extends FormRequest
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
            'jumlah_pinjaman' => floatval(str_replace(',', '.', str_replace('.', '', preg_replace('(Rp)', '', $this->jumlah_pinjaman)))),
            'nominal_jaminan' => floatval(str_replace(',', '.', str_replace('.', '', preg_replace('(Rp)', '', $this->nominal_jaminan)))),
            'provisi' => floatval(str_replace(',', '.', str_replace('.', '', preg_replace('(Rp)', '', $this->provisi)))),
            'materai' => floatval(str_replace(',', '.', str_replace('.', '', preg_replace('(Rp)', '', $this->materai)))),
            'notaris' => floatval(str_replace(',', '.', str_replace('.', '', preg_replace('(Rp)', '', $this->notaris)))),
            'simpanan_wajib' => floatval(str_replace(',', '.', str_replace('.', '', preg_replace('(Rp)', '', $this->simpanan_wajib)))),
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
            'anggota_id'            => 'required',
            'no_pinjaman'           => 'required|unique:pinjamans',
            'jumlah_pinjaman'       => 'required',
            'tgl_pinjaman'          => 'required',
            'jangka_waktu_pinjaman' => 'required',
            'agunan'                => 'required',
            'bunga'                 => 'required',
            'provisi'               => 'required',
            'materai'               => 'required',
            'notaris'               => 'required',
            'simpanan_wajib'        => Rule::requiredIf($request->agunan == 'Dengan Agunan'),

            'nominal_jaminan'       => Rule::requiredIf($request->agunan == 'Dengan Agunan'),
            'jaminan'               => Rule::requiredIf($request->agunan == 'Dengan Agunan'),
            'keterangan'            => Rule::requiredIf($request->agunan == 'Dengan Agunan'),

        ];
    }

    public function messages()
    {
        return [
            'no_pinjaman.required' => 'Nomor pinjaman harus diisi',
            'anggota_id.required' => 'Nama anggota harus dipilih',
            'produk_pinjaman_id.required' => 'Produk pinjaman harus dipilih',
            'tgl_pinjaman.required' => 'Tanggal pinjaman harus diisi',
            'agunan.required' => 'Agunan harus dipilih',
            'bunga.required' => 'Bunga harus diisi',
            'jangka_waktu_pinjaman.required' => 'Jangka waktu pinjaman harus diisi',
            'jumlah_pinjaman.required' => 'Jumlah pinjaman harus diisi',
            'nominal_jaminan.required' => 'Nominal jaminan harus diisi',
            'jaminan.required' => 'Jaminan harus diisi',
            'keterangan.required' => 'Keterangan harus diisi',
            'provisi.required' => 'Admin provisi harus diisi',
            'materai.required' => 'Materai harus diisi',
            'notaris.required' => 'Notaris harus diisi',
            'simpanan_wajib.required' => 'Simpanan wajib harus diisi',
        ];
    }
}
