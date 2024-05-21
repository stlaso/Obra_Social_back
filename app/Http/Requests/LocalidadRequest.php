<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalidadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {

        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'provincia_id' => 'required|integer|exists:provincia,id',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no puede tener más de 255 caracteres.',
            'provincia_id.required' => 'El campo provincia es obligatorio.',
            'provincia_id.integer' => 'El campo provincia debe ser un número entero.',
            'provincia_id.exists' => 'La provincia seleccionada no es válida.',
        ];
    }
}
