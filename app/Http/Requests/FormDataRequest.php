<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FormDataRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|min:6',
            'date'      => 'required|date',
            'phone'     => 'required|min:11'
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Поле должно быть заполнено',
            'title.min'      => 'Название должно содержать как минимум 6 символов',
        ];
    }
}
