<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PersonaEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        $id = $this->route('persona'); // Directamente obtener el ID de la ruta

        return [
            'persona.legajo' => [
                'required',
                'integer',
                Rule::unique('persona')->ignore($id)
            ],
            'persona.fecha_afiliacion' => 'nullable|date',
            'persona.nombre' => 'required|string',
            'persona.apellido' => 'required|string',
            'persona.sexo_id' => 'nullable|exists:sexo,id',
            'persona.fecha_nacimiento' => 'nullable|date',
            'persona.estado_civil_id' => 'nullable|exists:estado_civil,id',
            'persona.tipo_documento' => 'nullable|string',
            'persona.dni' => [
                'required',
                'integer',
                Rule::unique('persona')->ignore($id)
            ],
            'persona.cuil' => [
                'nullable',
                'string',
                Rule::unique('persona')->ignore($id)
            ],
            'persona.email' => 'nullable|email',
            'persona.telefono' => 'nullable|integer',
            'persona.nacionalidad_id' => 'nullable|exists:nacionalidad,id',
            'persona.estados_id' => 'required|exists:estados,id',

              //DOMICILIO
              'domicilio.provincia_id'=>'nullable|integer',
              'domicilio.localidad_id'=>'nullable|integer',
              'domicilio.calle' => 'nullable|string',
              'domicilio.numero' => 'nullable|string',
              'domicilio.piso' => 'nullable|string',
              'domicilio.codigo_postal' => 'nullable|integer',

              //DATOS LABORALES

              'datos_laborales.carga_horaria' => 'nullable|string',
              'datos_laborales.fecha_ingreso' => 'nullable|date',
              'datos_laborales.email' => 'nullable|email',
              'datos_laborales.tramo_id' => 'nullable|integer',
              'datos_laborales.agrupamiento_id' => 'nullable|integer',
              'datos_laborales.seccional_id' => 'nullable|exists:seccional,id',
              'datos_laborales.agencia_id'=>'nullable|integer',
              'datos_laborales.tipo_contrato_id' => 'nullable|integer',


              //OBRA SOCIAL
              'obra_social.tipo_obra' => 'nullable|string',
              'obra_social.obra_social' => 'nullable|string',

              //Familiares

              'familiares' => 'array',
              'familiares.*.nombre' => 'nullable|string|max:255',
              'familiares.*.fecha_nacimiento' => 'nullable|date',
              'familiares.*.tipo_documento' => 'nullable|string|max:255',
              'familiares.*.documento' => 'nullable|integer',
              'familiares.*.parentesco_id' => 'nullable|exists:parentesco,id',

              //SUBSIDIOS
              'subsidios' => 'array',
              'subsidios.*.tipo_subsidio_id' => 'nullable|exists:tipo_subsidio,id',
              'subsidios.*.fecha_solicitud' => 'nullable|date',
              'subsidios.*.fecha_otorgamiento' => 'nullable|date|after_or_equal:subsidios.*.fecha_solicitud',
              'subsidios.*.observaciones' => 'nullable|string|max:255',

              //DOCUMENTACION
              'documentacion' => 'array',
              'documentacion.*.tipo_documento_id' => 'nullable|exists:tipo_documento,id',
              'documentacion.*.archivo' => 'nullable|string|max:2048',

        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages()
    {
        return [
            'persona.legajo.unique' => 'El legajo ya está registrado.',
            'persona.dni.unique' => 'El DNI ya está registrado.',
            'persona.cuil.unique' => 'El CUIL ya está registrado.',
            'persona.email.unique' => 'El correo electrónico ya está registrado.',
        ];
    }
}
