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


    public function eliminarFile($id)
    {
        // Encontrar el registro en la base de datos
        $file = Documentacion::findOrFail($id);

        // Ruta del archivo en el sistema de archivos
        // Aquí debes ajustar la ruta según cómo almacenes los archivos en tu aplicación
        $filePath = storage_path('app/public/' . $file->ruta_archivo);

        // Verificar si el archivo físico existe y eliminarlo
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Eliminar el registro de la base de datos
        $file->delete();

        // Opcional: retornar una respuesta
        return response()->json(['message' => 'Archivo eliminado correctamente.']);
    }
}
