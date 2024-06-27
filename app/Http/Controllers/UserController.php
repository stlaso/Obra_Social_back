<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomizeException;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Response;

class UserController extends Controller
{
    protected $UserService;

    public function __construct(UserService $UserService)
    {
        $this->UserService = $UserService;
    }

    public function index()
    {
        $User=$this->UserService->UserLista();
        return UserResource::collection($User);
    }
    public function update(UserRequest $request, $UserId)
    {
        try {
            $validated = $request->validated();
            $User = $this->UserService->UserActualizar($UserId, $validated);

            if (!$User) {
                return response()->json([
                    "message" => "User no encontrado",
                ], 404);
            }

            return response()->json([
                "message" => "User actualizado exitosamente",
            ], 200);

        } catch (\Exception $e) {
            throw new CustomizeException($e->getMessage(), \Illuminate\Http\Response::HTTP_INTERNAL_SERVER_ERROR, $e);
        }
    }

    public function show($id)
    {
        $User=$this->UserService->verUser($id);
        return new UserResource($User);
    }

    public function destroy(string $id)
    {
        try {
            $User = $this->UserService->eliminarUser($id);

            return response()->json([
                "message" => "Estado actualizado",
            ], 200);
        } catch (\Exception $e) {
            throw new CustomizeException('No se pudo eliminar la prioridad', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
