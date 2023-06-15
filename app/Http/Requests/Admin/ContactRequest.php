<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'location' => ['required', 'max:191'],
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'numeric', 'regex:/^(\+62|62|0*)[2-9]{1}[0-9]{5,20}$/'],
        ];
    }
}
