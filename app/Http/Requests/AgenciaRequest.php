<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgenciaRequest extends FormRequest
{
    public function authorize()
    {
        return true;  // Cambiar según la lógica de autorización
    }

    public function rules()
    {
        return [
            'ugl_id' => 'required|exists:tipo_ugl,id',
            'nombre' => 'required|string|max:255',
            'domicilio_trabajo' => 'nullable|string|max:255',
            'telefono_laboral' => 'nullable|string|max:255',
        ];
    }
}
