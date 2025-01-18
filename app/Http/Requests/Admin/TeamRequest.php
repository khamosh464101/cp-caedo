<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeamRequest extends FormRequest
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
            'is_board_member' => ['required', 'boolean'],
            'title' => ['required', 'min:2'],
            'name' => ['required', 'min:3'],
            'position' => ['required', 'min:3'],
            'about' => ['required', 'min:10'],
            'avatar' => [ 'image', 'mimes:webp', 'max:200', Rule::requiredIf(!$this?->team?->id)],
            'file' => [ 'image', 'mimes:webp', 'max:200', Rule::requiredIf(!$this?->team?->id)],
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
