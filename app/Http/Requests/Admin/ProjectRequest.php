<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
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
            'title' => ['required', 'min:3'],
            'content' => ['required', 'min:20'],
            'tp' => ['nullable', 'min:20'],
            'category_id' => ['required', 'exists:project_categories,id'],
            'slug' => ['required', Rule::unique('projects')->ignore($this?->project?->id)],
            'status' => ['required', 'boolean'],
            'image' => ['image', 'mimes:webp', 'max:600', Rule::requiredIf(!$this?->project?->id)],
            'thumpnail1' => ['image', 'mimes:webp', 'max:400', Rule::requiredIf(!$this?->project?->id)],
            'date' => ['required', 'date'],
            'user_id' => ['required', 'exists:users,id']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->id()
        ]);
    }
}
