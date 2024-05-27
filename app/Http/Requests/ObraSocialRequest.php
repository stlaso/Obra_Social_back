<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObraSocialRequest extends FormRequest
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
            'tipo_obra_id' => '|string|max:255',
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
            'tipo_obra.string' => 'El campo tipo de obra social debe ser una cadena de texto.',
            'tipo_obra.max' => 'El campo tipo de obra social no puede tener más de 255 caracteres.',
            'obra_social.string' => 'El campo obra social debe ser una cadena de texto.',
            'obra_social.max' => 'El campo obra social no puede tener más de 255 caracteres.',
        ];
    }
}
