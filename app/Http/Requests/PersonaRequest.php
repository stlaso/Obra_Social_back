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
            //PERSONA
            'persona.legajo' => 'required|string|unique:persona',
            'persona.fecha_afiliacion' => 'nullable|date',
            'persona.nombre' => 'required|string',
            'persona.apellido' => 'required|string',
            'persona.sexo_id' => 'nullable|exists:sexo,id',
            'persona.fecha_nacimiento' => 'nullable|date',
            'persona.estado_civil_id' => 'nullable|exists:estado_civil,id',
            'persona.tipo_documento' => 'nullable|string',
            'persona.dni' => 'required|string|unique:persona',
            'persona.cuil' => 'nullable|string|unique:persona',
            'persona.email' => 'nullable|email',
            'persona.telefono' => 'nullable|string',
            'persona.nacionalidad_id' => 'nullable|exists:nacionalidad,id',
            'persona.users_id'=>'required|integer',

            //DOMICILIO
            'domicilio.provincia_id'=>'nullable|integer',
            'domicilio.localidad_id'=>'nullable|integer',
            'domicilio.domicilio' => 'nullable|string',
            'domicilio.codigo_postal' => 'nullable|integer',
            'domicilio.users_id'=>'nullable|integer',

            //DATOS LABORALES

            'datos_laborales.carga_horaria' => 'nullable|string',
            'datos_laborales.fecha_ingreso' => 'nullable|date',
            'datos_laborales.email_laboral' => 'nullable|email',
            'datos_laborales.tramo_id' => 'nullable|integer',
            'datos_laborales.agrupamiento_id' => 'nullable|integer',
            'datos_laborales.seccional_id' => 'nullable|exists:seccional,id',
            'datos_laborales.agencia_id'=>'nullable|integer',
            'datos_laborales.tipo_contrato_id' => 'nullable|integer',
            'datos_laborales.users_id'=>'nullable|integer',

            //OBRA SOCIAL
            'obra_social.tipo_obra' => 'nullable|string',
            'obra_social.obra_social' => 'nullable|string',
            'obra_social.users_id'=>'nullable|integer',

            //Familiares

            'familiares' => 'array',
            'familiares.*.nombre_familiar' => 'nullable|string|max:255',
            'familiares.*.fecha_nacimiento_familiar' => 'nullable|date',
            'familiares.*.tipo_documento_familiar' => 'nullable|string|max:255',
            'familiares.*.documento' => 'nullable|string',
            'familiares.*.parentesco_id' => 'nullable|exists:parentesco,id',
            'familiares.*.users_id'=>'nullable|integer',

            //SUBSIDIOS
            'subsidios' => 'array',
            'subsidios.*.tipo_subsidio_id' => 'nullable|exists:tipo_subsidio,id',
            'subsidios.*.fecha_solicitud' => 'nullable|date',
            'subsidios.*.fecha_otorgamiento' => 'nullable|date|after_or_equal:subsidios.*.fecha_solicitud',
            'subsidios.*.observaciones' => 'nullable|string|max:255',
            'subsidios.*.users_id'=>'nullable|integer',

            //DOCUMENTACION
            'documentacion' => 'array',
            'documentacion.*.tipo_documento_id' => 'nullable|exists:tipo_documento,id',
            'documentacion.*.archivo' => 'nullable|string|max:2048',
            'documentacion.*.users_id'=>'nullable|integer'

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
            // PERSONA
            'persona.legajo.required' => 'El legajo es obligatorio.',
            'persona.legajo.unique' => 'El legajo ya está registrado.',
            'persona.fecha_afiliacion.date' => 'La fecha de afiliación debe ser una fecha válida.',
            'persona.nombre.required' => 'El nombre es obligatorio.',
            'persona.apellido.required' => 'El apellido es obligatorio.',
            'persona.sexo_id.exists' => 'El sexo seleccionado no es válido.',
            'persona.fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'persona.estado_civil_id.exists' => 'El estado civil seleccionado no es válido.',
            'persona.dni.required' => 'El DNI es obligatorio.',
            'persona.dni.integer' => 'El DNI debe ser un número entero.',
            'persona.dni.unique' => 'El DNI ya está registrado.',
            'persona.cuil.integer' => 'El CUIL debe ser un número entero.',
            'persona.cuil.unique' => 'El CUIL ya está registrado.',
            'persona.email.email' => 'El correo electrónico debe ser una dirección válida.',
            'persona.email.unique' => 'El correo electrónico ya está registrado.',
            'persona.telefono.string' => 'El teléfono debe ser un número entero.',
            'persona.nacionalidad_id.exists' => 'La nacionalidad seleccionada no es válida.',
            'persona.estados_id.required' => 'El estado es obligatorio.',
            'persona.estados_id.exists' => 'El estado seleccionado no es válido.',

            // DOMICILIO
            'domicilio.provincia_id.integer' => 'La provincia debe ser un número entero.',
            'domicilio.localidad_id.integer' => 'La localidad debe ser un número entero.',
            'domicilio.calle.string' => 'La calle debe ser una cadena de texto.',
            'domicilio.numero.string' => 'El número debe ser una cadena de texto.',
            'domicilio.piso.string' => 'El piso debe ser una cadena de texto.',
            'domicilio.codigo_postal.integer' => 'El código postal debe ser un número entero.',

            // DATOS LABORALES
            'datos_laborales.carga_horaria.string' => 'La carga horaria debe ser una cadena de texto.',
            'datos_laborales.telefono_laboral.integer' => 'El teléfono laboral debe ser un número entero.',
            'datos_laborales.fecha_ingreso.date' => 'La fecha de ingreso debe ser una fecha válida.',
            'datos_laborales.email_laboral.email' => 'El correo electrónico laboral debe ser una dirección válida.',
            'datos_laborales.tramo_id.integer' => 'El tramo debe ser un número entero.',
            'datos_laborales.agrupamiento_id.integer' => 'El agrupamiento debe ser un número entero.',
            'datos_laborales.seccional_id.exists' => 'La seccional seleccionada no es válida.',
            'datos_laborales.agencia_id.integer' => 'La agencia debe ser un número entero.',
            'datos_laborales.ugl_id.exists' => 'La UGL seleccionada no es válida.',
            'datos_laborales.tipo_contrato_id.integer' => 'El tipo de contrato debe ser un número entero.',

            // OBRA SOCIAL
            'obra_social.nombre.string' => 'El nombre de la obra social debe ser una cadena de texto.',
            'obra_social.tipo.string' => 'El tipo de obra social debe ser una cadena de texto.',

            // FAMILIARES
            'familiares.*.nombre_familiar.required' => 'El nombre del familiar es obligatorio.',
            'familiares.*.nombre_familiar.string' => 'El nombre del familiar debe ser una cadena de texto.',
            'familiares.*.nombre_familiar.max' => 'El nombre del familiar no puede tener más de 255 caracteres.',
            'familiares.*.fecha_nacimiento_familiar.date' => 'La fecha de nacimiento del familiar debe ser una fecha válida.',
            'familiares.*.tipo_documento_familiar.string' => 'El tipo de documento del familiar debe ser una cadena de texto.',
            'familiares.*.tipo_documento_familiar.max' => 'El tipo de documento del familiar no puede tener más de 255 caracteres.',
            'familiares.*.documento.integer' => 'El documento del familiar debe ser un número entero.',
            'familiares.*.parentesco_id.required' => 'El parentesco del familiar es obligatorio.',
            'familiares.*.parentesco_id.exists' => 'El parentesco del familiar seleccionado no es válido.',

            // DOCUMENTACION
            'documentacion.*.tipo_documento_id.exists' => 'El tipo de documento seleccionado no es válido.',
            'documentacion.*.archivo.file' => 'El archivo debe ser un archivo válido.',
            'documentacion.*.archivo.mimes' => 'El archivo debe ser de tipo: jpg, jpeg, png, docx, pdf o xlsx.',
            'documentacion.*.archivo.max' => 'El archivo no puede superar los 2MB.',
        ];
    }
}
