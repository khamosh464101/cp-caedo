<?php

namespace App\Http\Requests\Admin;

use App\Rules\Authcheck;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectCategoryRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:25', Rule::unique('project_categories')->ignore($this?->project_category?->id)],
            'slug' => ['required', Rule::unique('project_categories')->ignore($this?->project_category?->id)],
            'user_id' => ['required', 'exists:users,id', new Authcheck]
        ];
    }
}
