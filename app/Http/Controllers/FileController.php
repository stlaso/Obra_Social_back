<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FileService;
use App\Http\Requests\FileRequest;

class FileController extends Controller
{
    protected $FileService;

    public function __construct(FileService $FileService)
    {
        $this->FileService = $FileService;
    }

    public function store(FileRequest $request)
    {
        $validated = $request->validated();
        $File=$this->FileService->FileCrear($validated);
        return response()->json(['ids' => $File, 'message' => 'Documentos guardados exitosamente'], 201);
    }

    public function destroy(string $id)
    {
        try {
            $File = $this->FileService->eliminarFile($id);

            return response()->json([
                "message" => "Estado actualizado",
            ], 200);
        } catch (\Exception $e) {
            throw new CustomizeException('No se pudo eliminar la prioridad', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
