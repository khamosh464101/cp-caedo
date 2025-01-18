<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PublicationRequest extends FormRequest
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
            'category' => ['required'],
            'year' => ['required'],
            'published' => ['required', 'boolean'],
            'image' => [ 'image', 'mimes:webp', 'max:500', Rule::requiredIf(!$this?->publication?->id)],
            'file' => [ 'file', 'mimes:pdf', 'max:10000', Rule::requiredIf(!$this?->publication?->id)],
            'user_id' => ['required', 'exists:users,id'],
            'custom1' => ['nullable']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->id()
        ]);
    }
}
