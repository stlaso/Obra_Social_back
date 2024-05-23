<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaRequest extends FormRequest
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
            'legajo' => 'required|integer',
            'fecha_afiliacion' => 'required|date',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'sexo' => 'integer',
            'fecha_nacimiento' => 'date',
            'estado_civil' => 'integer',
            'tipo_documento' => 'required|string|max:255',
            'dni' => ['required', 'integer', Rule::unique('persona', 'dni')->ignore($personaId)],
            'cuil' => 'integer',
            'email' => 'email|max:255',
            'caracteristica_telefono' => 'integer',
            'telefono' => 'integer',
            'nacionalidad_id' => 'required|exists:nacionalidad,id',
            'domicilio_id' => 'required|exists:domicilio,id',
            'datos_laborales_id' => 'exists:datos_laborales,id',
            'obra_social_id' => 'exists:obra_social,id',
            'estados_id' => 'required|exists:estados,id',
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
            'legajo.required' => 'El campo legajo es obligatorio.',
            'legajo.integer' => 'El campo legajo debe ser un número entero.',
            'fecha_afiliacion.required' => 'El campo fecha de afiliación es obligatorio.',
            'fecha_afiliacion.date' => 'El campo fecha de afiliación debe ser una fecha válida.',
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no puede tener más de 255 caracteres.',
            'apellido.required' => 'El campo apellido es obligatorio.',
            'apellido.string' => 'El campo apellido debe ser una cadena de texto.',
            'apellido.max' => 'El campo apellido no puede tener más de 255 caracteres.',
            'sexo.integer' => 'El campo sexo debe ser un número entero.',
            'fecha_nacimiento.date' => 'El campo fecha de nacimiento debe ser una fecha válida.',

        ];
    }
}
