<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'brand_id'      => ['required', 'exists:brands,id'],
            'name'          => ['required', 'string', 'min:3', 'max:255'],
            'description'   => ['nullable', 'string', 'max:2000'],
            'price'         => ['required', 'numeric', 'min:0', 'max:99999.99'],
            'stock'         => ['required', 'integer', 'min:0'],
            'is_available'  => ['nullable', 'boolean'],
            'ingredients'   => ['nullable', 'array'],
            'ingredients.*' => ['integer', 'exists:ingredients,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'brand_id.required'      => 'Debes elegir una marca.',
            'brand_id.exists'        => 'La marca seleccionada no existe.',
            'name.required'          => 'El nombre es obligatorio.',
            'name.min'               => 'El nombre debe tener al menos 3 caracteres.',
            'price.required'         => 'El precio es obligatorio.',
            'price.numeric'          => 'El precio debe ser un número.',
            'price.min'              => 'El precio no puede ser negativo.',
            'stock.required'         => 'El stock es obligatorio.',
            'stock.integer'          => 'El stock debe ser un número entero.',
            'ingredients.*.exists'   => 'Alguno de los ingredientes no existe.',
        ];
    }
}