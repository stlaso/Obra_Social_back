<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentacionRequest extends FormRequest
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
            'tipo_documento' => 'required|string|max:255',
            'archivo' => 'required|file|max:10240', 
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
            'tipo_documento.required' => 'El campo tipo de documento es obligatorio.',
            'tipo_documento.string' => 'El campo tipo de documento debe ser una cadena de texto.',
            'tipo_documento.max' => 'El campo tipo de documento no puede tener más de 255 caracteres.',
            'archivo.required' => 'El campo archivo es obligatorio.',
            'archivo.file' => 'El archivo debe ser un archivo válido.',
            'archivo.max' => 'El tamaño del archivo no puede ser mayor que :max kilobytes.',
            'persona_id.required' => 'El campo persona es obligatorio.',
            'persona_id.exists' => 'La persona seleccionada no es válida.',
        ];
    }
}
