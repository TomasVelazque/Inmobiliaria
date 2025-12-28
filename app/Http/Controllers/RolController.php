<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Support\Facades\DB;

class RolController
{
    public function cargarRoles(){
        $roles = DB::table('roles')
                ->select('id', 'nombre_rol')
                ->get();

        return response()->json([
            'success' => true,
            'roles' => $roles
        ]);
    }
}
