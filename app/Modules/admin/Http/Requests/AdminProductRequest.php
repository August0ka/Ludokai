<?php

namespace App\Modules\admin\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;

class AdminProductRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ];

        if ($this->method() == 'PUT') {
            return $rules;
        }

        $otherRules = [
            'main_image' => 'required|image|mimes:jpeg,png,jpg,svg,webp',
            'product_images' => 'required|array',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,svg,webp'
        ];

        $rules = array_merge($rules, $otherRules);

        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'nome',
            'description' => 'descrição',
            'price' => 'preço',
            'category_id' => 'categoria',
            'quantity' => 'quantidade',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'description.required' => 'O campo descrição é obrigatório',
            'price.required' => 'O campo preço é obrigatório',
            'category_id.required' => 'O campo categoria é obrigatório',
            'quantity.required' => 'O campo quantidade é obrigatório',
            'main_image.required' => 'O campo imagem principal é obrigatório',
            'product_images.required' => 'O campo imagens secundárias é obrigatório',
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('price')) {
            $this->merge([
                'price' => str_replace(',', '.', str_replace('.', '', $this->input('price'))),
            ]);
        }
    }

    protected function failedValidation(Validator $validator)
    {
        $errorMessage = $validator->errors()->first();
        throw new ValidationException($validator, back()->with('error', $errorMessage));
    }
}
