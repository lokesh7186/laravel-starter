<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class StoreUser extends FormRequest
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
            'username' => 'required|unique:users|min:6|max:15',
            'firstname' => 'required|min:2|max:15',
            'lastname' => 'min:2|max:20',
            'email' => 'required|email|unique:users|max:150',
            'password' => [
                'required',
                'max:25',
                'string',
                Password::min(5)
                // ->mixedCase()
                // ->numbers()
                // ->symbols()
                // ->uncompromised(),
                , 'confirmed'
            ],
            'role' => 'exists:roles,name'
        ];
    }
}
