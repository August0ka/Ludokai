<?php

namespace App\Modules\admin\Http\Requests;

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
            'name' => 'required|string',
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
            'value' => 'required|numeric',
            'quantity' => 'required|integer',
            'total' => 'required|numeric',
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('value')) {
            $this->merge([
                'value' => str_replace(',', '.', str_replace('.', '', $this->input('value'))),
            ]);
        }
        if ($this->has('total')) {
            $this->merge([
                'total' => str_replace(',', '.', str_replace('.', '', $this->input('total'))),
            ]);
        }
    }
}
