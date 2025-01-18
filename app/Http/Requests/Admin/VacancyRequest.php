<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VacancyRequest extends FormRequest
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
            'vacancy_number' => ['required'],
            'title' => ['required'],
            'post_date' => ['required', 'date'],
            'close_date' => ['required', 'date'],
            'file' => [ 'file', 'mimes:pdf', 'max:10000', Rule::requiredIf(!$this?->vacancy?->id)],
            'user_id' => ['required', 'exists:users,id'],
            'is_vacancy' => ['required', 'boolean'],
            'published' => ['required', 'boolean']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->id()
        ]);
    }

}
