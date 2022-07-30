<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUser extends FormRequest
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
            'username' => [
                'required',
                Rule::unique('users')->ignore($this->user),
                'min:6',
                'max:15'
            ],
            'firstname' => ['required', 'min:2', 'max:15'],
            'lastname' => ['min:2', 'max:20'],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->user),
                'max:150'
            ],
            'password' => [
                'sometimes',
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

    protected function prepareForValidation()
    {
        if ($this->password == null) {
            $this->request->remove('password');
            $this->request->remove('password_confirmation');
        }
    }
}
