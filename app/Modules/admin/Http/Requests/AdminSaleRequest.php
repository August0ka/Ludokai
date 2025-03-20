<?php

namespace App\Modules\admin\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;

class AdminSaleRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
            'value' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
            'total' => 'required|numeric',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'user_id' => 'usuário',
            'product_id' => 'produto',
            'value' => 'valor',
            'quantity' => 'quantidade',
            'total' => 'total',
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('value')) {
            $this->merge([
                'value' => (float)str_replace(',', '.', str_replace('.', '', $this->input('value'))),
            ]);
        }
        if ($this->has('total')) {
            $this->merge([
                'total' => (float)str_replace(',', '.', str_replace('.', '', $this->input('total'))),
            ]);
        }
        if ($this->has('user_id')) {
            $this->merge([
                'user_id' => (int)$this->input('user_id'),
            ]);
        }
        if ($this->has('product_id')) {
            $this->merge([
                'product_id' => (int)$this->input('product_id'),
            ]);
        }
        if ($this->has('quantity')) {
            $this->merge([
                'quantity' => (int)$this->input('quantity'),
            ]);
        }
    }

    protected function failedValidation(Validator $validator)
    {
        $errorMessage = $validator->errors()->first();
        throw new ValidationException($validator, back()->with('error', $errorMessage));
    }
}
