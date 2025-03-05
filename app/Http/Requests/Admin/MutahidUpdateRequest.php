<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MutahidUpdateRequest extends FormRequest
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
            'year' => ['required', 'integer'],
            'file' => [ 'file', 'mimes:pdf', 'max:100000', Rule::requiredIf(!$this?->mutahid?->id)],
            'image' => [ 'image', 'mimes:jpg,png,jpeg,webp', 'max:400', Rule::requiredIf(!$this?->mutahid?->id)],
            'is_mutahid_dfi' => ['boolean'],
            'user_id' => ['required', 'exists:users,id'],
            'published' => ['required', 'boolean'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->id()
        ]);
    }
}
