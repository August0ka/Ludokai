<?php

namespace App\Modules\site\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteUserRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string',
            'cpf' => 'required|string',
            'phone' => 'required|string',
            'cep' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'password' => 'required|string'
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('cpf')) {
            $this->merge([
                'cpf' => preg_replace('/[\.\-]/', '', $this->input('cpf')),

            ]);
        }
        if ($this->has('cep')) {
            $this->merge([
                'cep' => preg_replace('/[\-]/', '', $this->input('cep')),

            ]);
        }
        if ($this->has('phone')) {
            $this->merge([
                'phone' => '55' . preg_replace('/[\s\(\)\-]/', '', $this->input('phone')),
            ]);
        }
    }
}
