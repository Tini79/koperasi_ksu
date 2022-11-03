<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * The key to be used for the view error bag.
     *
     * @var string
     */
    protected $errorBag = 'login';

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
            'username' => 'required',
            'password' => 'required|between:5,15',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
            'password.between'  => 'Password harus terdiri dari 5 sampai 15 digit',
        ];
    }
}
