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

        $filePath = storage_path('app/public/' . $file->archivo);
        // Verificar si el archivo físico existe y eliminarlo
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Eliminar el registro de la base de datos
        $file->delete();

        // Opcional: retornar una respuesta
        return response()->json(['message' => 'Archivo eliminado correctamente.']);
    }

    public function FileMostrar($id)
{
    // Buscar el documento en la base de datos usando el ID
    $documento = Documentacion::find($id);

    if (!$documento) {
        // Si el documento no se encuentra, retorna un error 404
        abort(404, 'Documento no encontrado');
    }

    // Verificar que el archivo existe
    $path = storage_path('app/public/' . $documento->archivo);
    if (!file_exists($path)) {
        // Si el archivo no existe, retorna un error 404
        abort(404, 'Archivo no encontrado');
    }

    // Retornar el archivo para su visualización
    return response()->file($path);
}
}
