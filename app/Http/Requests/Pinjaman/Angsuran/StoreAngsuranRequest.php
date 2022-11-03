<?php

namespace App\Http\Requests\Pinjaman\Angsuran;

use Illuminate\Foundation\Http\FormRequest;

class StoreAngsuranRequest extends FormRequest
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
            'sisa_angsuran' => floatval(str_replace(',', '.', str_replace('.', '', preg_replace('(Rp)', '', $this->sisa_angsuran)))),
            'nominal_setoran' => floatval(str_replace(',', '.', str_replace('.', '', preg_replace('(Rp)', '', $this->nominal_setoran)))),
            'sisa_angsuran' => floatval(str_replace(',', '.', str_replace('.', '', preg_replace('(Rp)', '', $this->sisa_angsuran)))),
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
            'sisa_angsuran' => 'required',
            'nominal_setoran' => 'required',
            'sisa_angsuran' => 'required',
        ];
    }
}
