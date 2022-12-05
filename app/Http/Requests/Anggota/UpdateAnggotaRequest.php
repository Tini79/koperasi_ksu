<?php

namespace App\Http\Requests\Anggota;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnggotaRequest extends FormRequest
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
            'tgl_daftar'        => 'nullable',
            'nama_anggota'      => 'required',
            'nik'               => 'required|digits:16',
            'jenis_kelamin'     => 'required',
            'tempat_lahir'      => 'required',
            'tgl_lahir'         => 'required',
            'pekerjaan'         => 'required',
            'agama'             => 'required',
            'status_perkawinan' => 'required',
            'no_tlp'            => 'required|min:12|max:13',
            'alamat'            => 'required',
        ];
    }

    public function messages()
    {
        return [
            'no_anggota.unique'          => 'No anggota sudah terdaftar',
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
        ];
    }
}
