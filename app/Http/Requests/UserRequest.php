<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('user');

        return [
            'nombre' => 'sometimes|nullable|string|max:255',
            'apellido' => 'sometimes|nullable|string|max:255',
            'username' => ['sometimes','nullable','string','max:255', Rule::unique('users')->ignore($id)],
            'password' => ['sometimes','nullable','string','min:6', Rule::unique('users')->ignore($id)],
            'telefono' => 'sometimes|nullable|string',
            'correo' =>  ['sometimes','nullable','email','string','max:255', Rule::unique('users')->ignore($id)],
            'roles_id' => 'sometimes|nullable|exists:roles,id',
            'estados_id' => 'sometimes|nullable',
            'seccional_id' => 'sometimes|nullable|exists:seccional,id',

        ];
    }
}
