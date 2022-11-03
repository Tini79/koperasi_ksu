<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemorialRequest extends FormRequest
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
            'dataMemorial' => collect($this->input('dataMemorial'))->map(function ($memorial) {
                $memorial['debet'] = floatval(str_replace(',', '.', str_replace('.', '', preg_replace('(Rp)', '', $memorial['debet']))));
                $memorial['kredit'] = floatval(str_replace(',', '.', str_replace('.', '', preg_replace('(Rp)', '', $memorial['kredit']))));
                return $memorial;
            })->toArray()
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
            'dataMemorial.*.akun_id' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required',
            'dataMemorial.*.debet' => 'nullable',
            'dataMemorial.*.kredit' => 'nullable',
        ];
    }
}
