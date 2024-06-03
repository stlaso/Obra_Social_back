<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatosFamiliaresRequest extends FormRequest
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
            'familiar' => 'string|max:255',
            'fecha_nacimiento' => 'date',
            'parentesco' => 'string|max:255',
            'documentacion_documento' => 'string|max:255',
            'documento' => 'string',
            'persona_id' => 'required|exists:persona,id',
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
            'familiar.string' => 'El campo familiar debe ser una cadena de texto.',
            'familiar.max' => 'El campo familiar no puede tener más de 255 caracteres.',
            'fecha_nacimiento.date' => 'El campo fecha de nacimiento debe ser una fecha válida.',
            'parentesco.string' => 'El campo parentesco debe ser una cadena de texto.',
            'parentesco.max' => 'El campo parentesco no puede tener más de 255 caracteres.',
            'documentacion_documento.string' => 'El campo tipo de documento debe ser una cadena de texto.',
            'documentacion_documento.max' => 'El campo tipo de documento no puede tener más de 255 caracteres.',
            'documento.integer' => 'El campo documento debe ser un número entero.',
            'persona_id.exists' => 'La persona seleccionada no es válida.',
        ];
    }
}
