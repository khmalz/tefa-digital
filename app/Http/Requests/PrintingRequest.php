<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PrintingRequest extends FormRequest
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
            'name_customer' => ['required', 'string', 'max:191'],
            'number_customer' => ['required', 'numeric', 'regex:/^(\+628|628|08*)[2-9]{1}[0-9]{5,20}$/'],
            'email_customer' => ['required', 'email'],
            'material' => ['required', 'string', 'max:191'],
            'scale' => ['required', 'string', 'max:191'],
            'file' => [Rule::requiredIf(!empty($this->ulid)), 'file', 'mimes:stl,obj,zip'],
            'description' => ['nullable', 'string', 'max:191'],
        ];
    }
}
