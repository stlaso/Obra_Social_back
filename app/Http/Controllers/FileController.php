<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FileService;
use App\Http\Requests\FileRequest;
use App\Exceptions\CustomizeException;
use Illuminate\Http\Response;

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
            throw new CustomizeException('No se pudo eliminar el archivo', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(string $id)
    {
        try {
        $File=$this->FileService->FileMostrar($id);
        return $File;
        }
     catch (\Exception $e) {
        throw new CustomizeException('No se pudo encontrar el archivo', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
    }
}
