<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'fecha_afiliacion' => 'date',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'sexo' => 'integer',
            'fecha_nacimiento' => 'date',
            'estado_civil' => 'integer',
            'tipo_documento' => 'string|max:255',
            'dni' => ['required', 'integer','unique:persona'],
            'cuil' => 'integer',
            'email' => 'email|max:255',
            'caracteristica_telefono' => 'integer',
            'telefono' => 'integer',
            'nacionalidad_id' => 'exists:nacionalidad,id',
            'domicilio_id' => '|exists:domicilio,id',
            'datos_laborales_id' => 'exists:datos_laborales,id',
            'obra_social_id' => 'exists:obra_social,id',
            'estados_id' => 'required|exists:estados,id',
            'domicilio' => 'string|max:255',
            'provincia_id' => 'integer|exists:provincia,id',
            'localidad_id' => 'integer|exists:localidad,id',
            'codigo_postal' => 'integer',
            'tipo_contrato' => 'integer',
            'ugl_id' => 'exists:tipo_ugl,id',
            'agencia_id' => 'exists:agencia,id',
            'seccional_id' => 'exists:seccional,id',
            'agrupamiento' => '|string|max:255',
            'tramo' => 'integer',
            'carga_horaria' => 'string|max:255',
            'telefono_laboral' => 'integer',
            'fecha_ingreso' => 'date',
            'email' => 'email|max:255',
            'telefono' => 'integer',
            'tipo_obra' => '|string|max:255',
            'obra_social' => '|string|max:255',

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
            'fecha_afiliacion.date' => 'El campo fecha de afiliación debe ser una fecha válida.',
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no puede tener más de 255 caracteres.',
            'apellido.required' => 'El campo apellido es obligatorio.',
            'apellido.string' => 'El campo apellido debe ser una cadena de texto.',
            'apellido.max' => 'El campo apellido no puede tener más de 255 caracteres.',
            'sexo.integer' => 'El campo sexo debe ser un número entero.',
            'fecha_nacimiento.date' => 'El campo fecha de nacimiento debe ser una fecha válida.',
            'dni.unique'=>'El DNI es unico',
            'domicilio.string' => 'El campo domicilio debe ser una cadena de texto.',
            'domicilio.max' => 'El campo domicilio no puede tener más de 255 caracteres.',
            'provincia_id.integer' => 'El campo provincia debe ser un número entero.',
            'provincia_id.exists' => 'La provincia seleccionada no es válida.',
            'localidad_id.integer' => 'El campo localidad debe ser un número entero.',
            'localidad_id.exists' => 'La localidad seleccionada no es válida.',
            'codigo_postal.integer' => 'El campo código postal debe ser un número entero.',
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
            'telefono.integer' => 'El campo teléfono debe ser un número entero.',
            'tipo_obra.string' => 'El campo tipo de obra social debe ser una cadena de texto.',
            'tipo_obra.max' => 'El campo tipo de obra social no puede tener más de 255 caracteres.',
            'obra_social.string' => 'El campo obra social debe ser una cadena de texto.',
            'obra_social.max' => 'El campo obra social no puede tener más de 255 caracteres.',
            'familiar.string' => 'El campo familiar debe ser una cadena de texto.',
            'familiar.max' => 'El campo familiar no puede tener más de 255 caracteres.',
            'fecha_nacimiento.date' => 'El campo fecha de nacimiento debe ser una fecha válida.',
            'parentesco.string' => 'El campo parentesco debe ser una cadena de texto.',
            'parentesco.max' => 'El campo parentesco no puede tener más de 255 caracteres.',
            'tipo_documento.string' => 'El campo tipo de documento debe ser una cadena de texto.',
            'tipo_documento.max' => 'El campo tipo de documento no puede tener más de 255 caracteres.',
            'documento.integer' => 'El campo documento debe ser un número entero.',
            'persona_id.exists' => 'La persona seleccionada no es válida.',
        ];
    }
}
