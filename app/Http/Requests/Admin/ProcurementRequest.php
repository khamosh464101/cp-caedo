<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProcurementRequest extends FormRequest
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
            'announcement_date' => ['required', 'date'],
            'reference_number' => ['required'],
            'description' => ['required'],
            'deadline' => ['required', 'date'],
            'itb_noa' => ['required', 'boolean'],
            'file' => [ 'file', 'mimes:pdf', 'max:10000', Rule::requiredIf(!$this?->procurement?->id)],
            'user_id' => ['required', 'exists:users,id'],
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
