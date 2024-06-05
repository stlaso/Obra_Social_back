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
            'domicilio' => 'string|max:255',
            'provincia_id' => 'integer|exists:provincia,id',
            'localidad_id' => 'integer|exists:localidad,id',
            'codigo_postal' => 'integer',
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
            'domicilio.string' => 'El campo domicilio debe ser una cadena de texto.',
            'domicilio.max' => 'El campo domicilio no puede tener más de 255 caracteres.',
            'provincia_id.integer' => 'El campo provincia debe ser un número entero.',
            'provincia_id.exists' => 'La provincia seleccionada no es válida.',
            'localidad_id.integer' => 'El campo localidad debe ser un número entero.',
            'localidad_id.exists' => 'La localidad seleccionada no es válida.',
            'codigo_postal.integer' => 'El campo código postal debe ser un número entero.',
        ];
    }
}
