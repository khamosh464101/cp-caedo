<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
            'title' => ['required', 'min:3'],
            'content' => ['required', 'min:20'],
            'tp' => ['nullable', 'min:20'],
            'category_id' => ['required', 'exists:categories,id'],
            'slug' => ['required', Rule::unique('posts')->ignore($this?->post?->id)],
            'status' => ['required', 'boolean'],
            'image' => ['image', 'mimes:webp', 'max:600', Rule::requiredIf(!$this?->post?->id)],
            'thumpnail1' => ['image', 'mimes:webp', 'max:400', Rule::requiredIf(!$this?->post?->id)],
            'thumpnail2' => ['image', 'mimes:webp', 'max:400', Rule::requiredIf(!$this?->post?->id)],
            'tags' => ['exists:tags,id'],
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
