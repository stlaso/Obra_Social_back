<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubsidiosRequest extends FormRequest
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
            'tipo_subsidio' => 'required|integer',
            'fecha_solicitud' => 'required|date',
            'fecha_otorgamiento' => 'required|date',
            'observaciones' => 'nullable|string|max:255',
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
            'tipo_subsidio.required' => 'El campo tipo de subsidio es obligatorio.',
            'tipo_subsidio.integer' => 'El campo tipo de subsidio debe ser un número entero.',
            'fecha_solicitud.required' => 'El campo fecha de solicitud es obligatorio.',
            'fecha_solicitud.date' => 'El campo fecha de solicitud debe ser una fecha válida.',
            'fecha_otorgamiento.required' => 'El campo fecha de otorgamiento es obligatorio.',
            'fecha_otorgamiento.date' => 'El campo fecha de otorgamiento debe ser una fecha válida.',
            'observaciones.string' => 'El campo observaciones debe ser una cadena de texto.',
            'observaciones.max' => 'El campo observaciones no puede tener más de 255 caracteres.',
            'persona_id.required' => 'El campo persona es obligatorio.',
            'persona_id.exists' => 'La persona seleccionada no es válida.',
        ];
    }
}
