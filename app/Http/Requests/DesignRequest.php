<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesignRequest extends FormRequest
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
            'design_plan_id' => ['required'],
            'name_customer' => ['required', 'string', 'max:191'],
            'number_customer' => ['required', 'numeric', 'regex:/^(\+62|62|0*)[2-9]{1}[0-9]{5,20}$/'],
            'email_customer' => ['required', 'email'],
            'slogan' => ['nullable', 'string', 'max:191'],
            'color' => ['required', 'string', 'max:191'],
            'description' => ['nullable', 'string', 'max:191'],
            'gambar' => ['nullable', 'array'],
            'gambar.*' => ['file', 'image', 'mimes:png,jpg,jpeg,webp', 'max:10240'],
        ];
    }
}
