<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AkunRequest extends FormRequest
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
            'saldo' => floatval(str_replace(',', '.', str_replace('.', '', preg_replace('(Rp)', '', $this->saldo))))
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
            'akun_id' => 'nullable',
            'nama_akun' => 'required',
            'kategori' => 'required',
            'kode_akun' => 'required',
            'saldo' => 'required',
        ];
    }
}
