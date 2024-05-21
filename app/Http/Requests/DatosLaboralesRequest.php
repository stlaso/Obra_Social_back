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
            'tipo_contrato' => 'required|integer',
            'ugl_id' => 'required|exists:tipo_ugl,id',
            'agencia_id' => 'required|exists:agencia,id',
            'seccional_id' => 'required|exists:seccional,id',
            'agrupamiento' => 'required|string|max:255',
            'tramo' => 'required|integer',
            'carga_horaria' => 'required|string|max:255',
            'telefono_laboral' => 'required|integer',
            'fecha_ingreso' => 'required|date',
            'email' => 'required|email|max:255',
            'telefono' => 'required|integer',
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
            'tipo_contrato.required' => 'El campo tipo de contrato es obligatorio.',
            'tipo_contrato.integer' => 'El campo tipo de contrato debe ser un número entero.',
            'ugl_id.required' => 'El campo UGL es obligatorio.',
            'ugl_id.exists' => 'La UGL seleccionada no es válida.',
            'agencia_id.required' => 'El campo agencia es obligatorio.',
            'agencia_id.exists' => 'La agencia seleccionada no es válida.',
            'seccional_id.required' => 'El campo seccional es obligatorio.',
            'seccional_id.exists' => 'La seccional seleccionada no es válida.',
            'agrupamiento.required' => 'El campo agrupamiento es obligatorio.',
            'agrupamiento.string' => 'El campo agrupamiento debe ser una cadena de texto.',
            'agrupamiento.max' => 'El campo agrupamiento no puede tener más de 255 caracteres.',
            'tramo.required' => 'El campo tramo es obligatorio.',
            'tramo.integer' => 'El campo tramo debe ser un número entero.',
            'carga_horaria.required' => 'El campo carga horaria es obligatorio.',
            'carga_horaria.string' => 'El campo carga horaria debe ser una cadena de texto.',
            'carga_horaria.max' => 'El campo carga horaria no puede tener más de 255 caracteres.',
            'telefono_laboral.required' => 'El campo teléfono laboral es obligatorio.',
            'telefono_laboral.integer' => 'El campo teléfono laboral debe ser un número entero.',
            'fecha_ingreso.required' => 'El campo fecha de ingreso es obligatorio.',
            'fecha_ingreso.date' => 'El campo fecha de ingreso debe ser una fecha válida.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El campo email debe ser una dirección de correo electrónico válida.',
            'email.max' => 'El campo email no puede tener más de 255 caracteres.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.integer' => 'El campo teléfono debe ser un número entero.',
        ];
    }
}
