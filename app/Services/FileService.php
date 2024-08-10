<?php

namespace App\Services;

use App\Models\Documentacion;

class FileService
{
    public function FileCrear($request)
    {
        $ids = [];
        $data = $request['documentacion'];
    
        foreach ($data as $doc) {
            $documento = new Documentacion();
    
            $documento->tipo_documento_id = $doc['tipo_documento_id'] ?? null;
    
            if (isset($doc['archivo']) && $doc['archivo']->isValid()) {
                $path = $doc['archivo']->store('uploads', 'public');
                $documento->archivo = $path;
            }
    
            // $documento->persona_id = $doc['persona_id'] ?? 2227;
    
            $documento->save();
            $ids[] = $documento->id;
        }
    
        return $ids;
    }

    public function eliminarFile($id)
    {
        $file = Documentacion::findOrFail($id);
        $filePath = public_path('uploads/' . $file->archivo);
        
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $file->delete();

        return response()->json(['message' => 'Archivo eliminado correctamente.']);
    }

    public function FileMostrar($id)
    {
        $documento = Documentacion::find($id);
        
        if (!$documento) {
            abort(404, 'Documento no encontrado');
        }

        $path = public_path('uploads/' . $documento->archivo);

        if (!file_exists($path)) {
            abort(404, 'Archivo no encontrado');
        }

        return response()->file($path);
    }
}

