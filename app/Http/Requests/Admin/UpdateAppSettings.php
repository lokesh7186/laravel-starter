<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAppSettings extends FormRequest
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
            'key' => [
                'sometimes',
                Rule::unique('app_settings')->ignore($this->setting),
                'min:2',
                'max:15'
            ],
            'value' => ['required', 'min:1', 'max:65000'],
            'sort_order' => ['required', 'min:-100', 'max:1000000'],
        ];
    }
}
