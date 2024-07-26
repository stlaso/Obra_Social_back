<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
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
        return [
            'documentacion' => 'array',
            'documentacion.*.tipo_documento_id' => 'nullable|exists:tipo_documento,id',
            'documentacion.*.archivo' => 'nullable|file',
            'documentacion.*.users_id'=>'nullable|integer'
        ];
    }
}
