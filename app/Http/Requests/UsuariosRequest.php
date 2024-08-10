<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
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
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'username' => 'required|string|unique:usuarios,username|max:255',
            'password' => 'required|string|max:255',
            'telefono' => 'required|string',
            'correo' => 'required|string|unique:usuarios,correo|max:255',
            'roles_id' => 'required|exists:roles,id',
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
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no puede tener más de 255 caracteres.',
            'apellido.required' => 'El campo apellido es obligatorio.',
            'apellido.string' => 'El campo apellido debe ser una cadena de texto.',
            'apellido.max' => 'El campo apellido no puede tener más de 255 caracteres.',
            'username.required' => 'El campo username es obligatorio.',
            'username.string' => 'El campo username debe ser una cadena de texto.',
            'username.unique' => 'El username ya está en uso.',
            'username.max' => 'El campo username no puede tener más de 255 caracteres.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.string' => 'El campo contraseña debe ser una cadena de texto.',
            'password.max' => 'El campo contraseña no puede tener más de 255 caracteres.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.integer' => 'El campo teléfono debe ser un número entero.',
            'correo.required' => 'El campo correo electrónico es obligatorio.',
            'correo.email' => 'El campo correo electrónico debe ser una dirección de correo electrónico válida.',
            'correo.unique' => 'El correo electrónico ya está en uso.',
            'correo.max' => 'El campo correo electrónico no puede tener más de 255 caracteres.',
            'roles_id.required' => 'El campo rol es obligatorio.',
            'roles_id.exists' => 'El rol seleccionado no es válido.',
        ];
    }
}
