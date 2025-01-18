<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'field_name' => ['required', 'min:3', 'max:100', Rule::unique('settings')->ignore($this?->setting?->id)],
            'field_value' => ['nullable'],
            'url' => ['nullable'],
            'description' => ['nullable'],

        ];
    }
}
