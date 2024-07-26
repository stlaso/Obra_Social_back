<?php

namespace App\Services;
use App\Models\Documentacion;
use App\Models\File;

class FileService
{
    public function FileCrear($request)
    {

        $ids = []; // Array para almacenar los IDs de los documentos creados
        $documentos = $request->input('documentacion');

        foreach ($documentos as $doc) {
            // Crear un nuevo documento
            $documento = new Documento();
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
        return response()->json(['ids' => $ids, 'message' => 'Documentos guardados exitosamente'], 201);
    }
}
