<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'name' => 'required',
            'surnames' => 'required',
            'email' => 'required|unique:suppliers,email',
            'company' => 'nullable|string',
            'birthday' => 'required|date',
            'phone' => 'required|unique:suppliers,phone',
            'address' => 'required',
            'rfc' => 'required|max:13',
            'created_by' => 'required|uuid',
        ];
    }
}
