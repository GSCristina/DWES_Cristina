<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // No se exige autenticación en esta práctica.
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
            'precio.required' => 'Introduce el precio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'precio.min' => 'El precio no puede ser negativo.',
            'precio.decimal' => 'El precio puede tener como máximo dos decimales.',
            'stock.required' => 'Introduce las unidades disponibles.',
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