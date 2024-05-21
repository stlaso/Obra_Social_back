<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DomicilioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Cambia esto a true para permitir la solicitud.
        // Puedes agregar lógica de autorización aquí si es necesario.
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
            'nombre' => 'required|string|max:255',
            'provincia_id' => 'required|integer|exists:provincia,id',
            'localidad_id' => 'required|integer|exists:localidad,id',
            'codigo_postal' => 'required|integer',
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
            'localidad_id.required' => 'El campo localidad es obligatorio.',
            'localidad_id.integer' => 'El campo localidad debe ser un número entero.',
            'localidad_id.exists' => 'La localidad seleccionada no es válida.',
            'codigo_postal.required' => 'El campo código postal es obligatorio.',
            'codigo_postal.integer' => 'El campo código postal debe ser un número entero.',
        ];
    }
}
