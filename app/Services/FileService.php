<?php

namespace App\Services;
use App\Models\Documentacion;
use App\Models\File;

class FileService
{
    public function FileCrear($request)
    {

        $ids = [];

        $data=$request['documentacion'];

        foreach ($data as $doc) {
            // Crear un nuevo documento
            $documento = new Documentacion();

            $documento->tipo_documento_id = $doc['tipo_documento_id'];

            // Verificar si el archivo es válido y guardarlo
            if (isset($doc['archivo']) && $doc['archivo']->isValid()) {
                $path = $doc['archivo']->store('documentacion', 'public');
                $documento->archivo = $path;
            }

            // Guardar el documento en la base de datos
            $documento->save();

            // Agregar el ID del documento guardado al array de IDs
            $ids[] = $documento->id;
        }

        // Retornar los IDs de los documentos creados
        return $ids;
    }
}
