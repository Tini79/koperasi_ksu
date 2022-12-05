<?php

namespace App\Http\Requests\Pegawai;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePegawaiRequest extends FormRequest
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
            'no_pegawai'    => 'required',
            'nama_pegawai'  => 'required',
            'nik'           => 'required|digits:16|unique:pegawais',
            'jenis_kelamin' => 'required',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'no_tlp'        => 'required|min:12|max:13',
            'alamat'        => 'required',
            'divisi'        => 'required',
        ];
    }

    public function messages()
    {
        return [
            'no_pegawai.required'    => 'No pegawai harus diisi',
            'no_pegawai.unique'      => 'No pegawai sudah terdaftar',
            'nama_pegawai.required'  => 'Nama pegawai harus diisi',
            'nik.required'           => 'NIK harus diisi',
            'nik.digits'             => 'NIK harus terdiri dari 16 digit',
            'nik.unique'             => 'NIK sudah terdaftar',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'tempat_lahir.required'  => 'Tempat lahir harus diisi',
            'tgl_lahir.required'     => 'Tanggal lahir harus diisi',
            'no_tlp.required'        => 'Nomor telepon harus diisi',
            'no_tlp.min'             => 'Nomor telepon harus terdiri dari 12 sampai 13 digit',
            'no_tlp.max'             => 'Nomor telepon harus terdiri dari 12 sampai 13 digit',
            'alamat.required'        => 'Alamat harus diisi',
            'divisi.required'        => 'Divisi harus diisi',
        ];
    }
}
