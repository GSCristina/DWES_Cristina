<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:100'],
            'precio' => ['required', 'numeric', 'min:0', 'decimal:0,2'],
            'stock' => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'Introduce el nombre del producto.',
            'precio.min' => 'El precio no puede ser negativo.',
            'precio.decimal' => 'El precio puede tener como máximo dos decimales.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'stock.min' => 'El stock no puede ser negativo.',
        ];
    }

    public function attributes(): array
    {
        return [
            'nombre' => 'nombre del producto',
            'precio' => 'precio del producto',
            'stock' => 'unidades en stock',
        ];
    }
}
