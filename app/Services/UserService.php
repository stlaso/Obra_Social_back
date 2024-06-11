<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserService
{
    public function UserLista()
    {
        $User=User::all()->paginate(10);
        return $User;
    }

    public function verUser($id)
    {
        $User = User::where('id', $id)->first();
        return $User;
    }



    public function UserActualizar($id, $data)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $user->nombre = $data['nombre'] ?? $user->nombre;
        $user->apellido = $data['apellido'] ?? $user->apellido;
        $user->username = $data['username'] ?? $user->username;
        if (isset($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->telefono = $data['telefono'] ?? $user->telefono;
        $user->correo = $data['correo'] ?? $user->correo;
        $user->roles_id = $data['roles_id'] ?? $user->roles_id;
        $user->estados_id = $data['estados_id'] ?? $user->estados_id;
        $user->seccional_id = $data['seccional_id'] ?? $user->seccional_id;

        $user->save();

        return $user;
    }


    public function eliminarUser($id)
    {
        $User=User::findOrFail($id);
        if($User->estados_id==1)
        {
            $User->estados_id=2;
        }
        else
        {
            $User->estados_id=1;
        }
        $User->save();
        return $User;
    }


}
