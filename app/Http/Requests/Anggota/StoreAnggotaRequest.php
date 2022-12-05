<?php

namespace App\Http\Requests\Anggota;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnggotaRequest extends FormRequest
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
            'simpanan_pokok' => floatval(str_replace(',', '.', str_replace('.', '', preg_replace('(Rp)', '', $this->simpanan_pokok)))),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tgl_daftar'         => 'required',
            'nama_anggota'       => 'required',
            'nik'                => 'required|digits:16|unique:anggotas',
            'jenis_kelamin'      => 'required',
            'tempat_lahir'       => 'required',
            'tgl_lahir'          => 'required',
            'pekerjaan'          => 'required',
            'agama'              => 'required',
            'status_perkawinan'  => 'required',
            'no_tlp'             => 'required|min:12|max:13',
            'alamat'             => 'required',
            'no_rekening'        => 'nullable',
            'anggota_id'         => 'nullable',
            'tgl_daftar'         => 'nullable',
            'produk_simpanan_id' => 'nullable',
            'saldo'              => 'nullable',
            'username'           => 'required',
            'password'           => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tgl_daftar.required'        => 'Tanggal daftar harus diisi',
            'nama_anggota.required'      => 'Nama anggota harus diisi',
            'nik.required'               => 'NIK harus diisi',
            'nik.digits'                 => 'NIK harus terdiri dari 16 digit',
            'nik.unique'                 => 'NIK sudah terdaftar',
            'jenis_kelamin.required'     => 'Jenis kelamin harus diisi',
            'tempat_lahir.required'      => 'Tempat lahir harus diisi',
            'tgl_lahir.required'         => 'Tanggal lahir harus diisi',
            'pekerjaan.required'         => 'Pekerjaan harus diisi',
            'agama.required'             => 'Agama harus diisi',
            'status_perkawinan.required' => 'Status perkawinan harus dipilih',
            'no_tlp.required'            => 'Nomor telepon harus diisi',
            'no_tlp.min'                 => 'Nomor telepon harus terdiri dari 12 sampai 13 digit',
            'no_tlp.max'                 => 'Nomor telepon harus terdiri dari 12 sampai 13 digit',
            'alamat.required'            => 'Alamat harus diisi',
            'saldo.required'             => 'saldo harus diisi',
            'username.required'          => 'Username harus diisi',
            'password.required'          => 'Password harus diisi',
        ];
    }
}
