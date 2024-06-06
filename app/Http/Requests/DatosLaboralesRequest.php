<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatosLaboralesRequest extends FormRequest
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
            'tipo_contrato' => 'integer',
            'ugl_id' => 'exists:tipo_ugl,id',
            'agencia_id' => 'exists:agencia,id',
            'seccional_id' => 'exists:seccional,id',
            'agrupamiento' => '|string|max:255',
            'tramo' => 'integer',
            'carga_horaria' => 'string|max:255',
            'telefono_laboral' => 'string',
            'fecha_ingreso' => 'date',
            'email' => 'email|max:255',

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
            'tipo_contrato.integer' => 'El campo tipo de contrato debe ser un número entero.',
            'ugl_id.exists' => 'La UGL seleccionada no es válida.',
            'agencia_id.exists' => 'La agencia seleccionada no es válida.',
            'seccional_id.exists' => 'La seccional seleccionada no es válida.',
            'agrupamiento.string' => 'El campo agrupamiento debe ser una cadena de texto.',
            'agrupamiento.max' => 'El campo agrupamiento no puede tener más de 255 caracteres.',
            'tramo.integer' => 'El campo tramo debe ser un número entero.',
            'carga_horaria.string' => 'El campo carga horaria debe ser una cadena de texto.',
            'carga_horaria.max' => 'El campo carga horaria no puede tener más de 255 caracteres.',
            'telefono_laboral.integer' => 'El campo teléfono laboral debe ser un número entero.',
            'fecha_ingreso.date' => 'El campo fecha de ingreso debe ser una fecha válida.',
            'email.email' => 'El campo email debe ser una dirección de correo electrónico válida.',
            'email.max' => 'El campo email no puede tener más de 255 caracteres.',
        ];
    }
}
