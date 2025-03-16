<?php

namespace App\Modules\site\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Http;

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
        if ($this->method('PUT')) {
            $rules = [
                'name' => 'nullable|string',
                'email' => 'nullable|string',
                'cpf' => ['nullable', 'string', function ($attribute, $value, $fail) {
                    if (!validateCPF($value)) {
                        $fail('O CPF informado não é válido.');
                    }
                }],
                'cep' => ['nullable', 'string', function ($attribute, $value, $fail) {
                    if (!$this->validateCEP($value)) {
                        $fail('O CEP informado não é válido.');
                    }
                }],
                'phone' => 'nullable|string',
                'address' => 'nullable|string',
                'city' => 'nullable|string',
                'state' => 'nullable|string',
                'password' => 'nullable|string'
            ];
            return $rules;
        }
        $rules = [
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'cpf' => ['required', 'string', function ($attribute, $value, $fail) {
                if (!validateCPF($value)) {
                    $fail('O CPF informado não é válido.');
                }
            }],
            'cep' => ['required', 'string', function ($attribute, $value, $fail) {
                if (!$this->validateCEP($value)) {
                    $fail('O CEP informado não é válido.');
                }
            }],
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'password' => 'required|string'
        ];

        return $rules;
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
                'phone' => preg_replace('/[\s\(\)\-]/', '', $this->input('phone')),
            ]);
        }
    }

    protected function failedValidation(Validator $validator)
    {
        $errorMessage = $validator->errors()->first();
        throw new ValidationException($validator, back()->with('error', $errorMessage));
    }

    private function validateCEP($cep)
    {
        $response = Http::get("https://viacep.com.br/ws/$cep/json/")->json();

        if (isset($response['erro']) && $response['erro']) {
            return false;
        }
        return true;
    }
}
