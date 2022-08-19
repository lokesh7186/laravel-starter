<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAppSettings extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('app_settings.manage');
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
                'required',
                Rule::unique('app_settings'),
                'min:2',
                'max:15'
            ],
            'value' => ['required', 'min:1', 'max:65000'],
            'sort_order' => ['required', 'min:-100', 'max:1000000'],
        ];
    }
}
