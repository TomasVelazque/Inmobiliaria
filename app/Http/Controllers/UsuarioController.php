<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

use Illuminate\Http\Request;

class UsuarioController
{
    //FUNCION PARA INICIAR SESSION
    public function iniciarSession(Request $request){
        $validator = Validator::make($request->all(),[
            'gmail' => 'required|email',
            'clave' => 'required',
        ]);

        //SI EN EL VALIDATOR HAY ERRORES EL ESTADO DEL SUCCESS ES FALSO
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
        }

        //BUSCAMOS AL USUARIO INGRESADO
        $usuario = Usuario::where('gmail', $request->gmail)->first();
        
        //VALIDAMOS EL USUARIO Y LA CONTRASEÑA
        if(!$usuario || !Hash::check($request->clave, $usuario->clave)){
            return response()->json([
                'success' => false,
                'message' => '[SISTEMA]: El usuario o la contraseña son incorrectos.',
            ]);
        }

        //VALIDAMOS EL ESTADO DEL USUARIO
        if($usuario->estado !== 'Activo'){
            return response()-json([
                'success' => false,
                'message' => '[SISTEMA]: Tu cuenta esta deshabilitada. Contacta con un administrador.',
            ]);
        }

        //GUARDAMOS LOS VALORES DEL USUARIO EN LA SESSION
        session([
            'usuario_id' => $usuario->id,
            'nombre_apellido' => $usuario->nombre_apellido,
            'gmail' => $usuario->gmail,
            'telefono' => $usuario->telefono,
            'rol_id' => $usuario->rol_id
        ]);

        //SI TODO ESTA CORRECTO ENVIAMOS AL INICIO CON LA SESSION INICIADA
        return response()->json([
            'success' => true,
            'message' => '[SISTEMA]: ¡Bienvenido ' . $usuario->nombre_apellido
        ]);
    }

    //FUNCION PARA QUE UN USUARIO SE REGISTRE
    public function registrarUsuario(Request $request){
        
        //VALIDAMOS LOS CAMPOS
        $validator = Validator::make($request->all(),[
            'nombre_apellido' => 'required|min:5|max:100|regex:/^[\pL\s]+$/u',
            'gmail' => 'required|email|unique:usuarios,gmail',
            'telefono' => 'required|digits:10',
            'clave' => 'required|min:8|max:100',
            'rclave' => 'required|same:clave',
        ], [
            'nombre_apellido.required' => '[SISTEMA]: El campo nombre y apellido es requerido.',
            'nombre_apellido.min' => '[SISTEMA]: El campo nombre y apellido debe tener minimo 5 caracteres.',
            'nombre_apellido.max' => '[SISTEMA]: El campo nombre y apellido debe tener maximo 100 caracteres.',
            'nombre_apellido.regex' => '[SISTEMA]: El campo nombre y apellido puede contener: letras, numeros y espacios.',

            'gmail.required' => '[SISTEMA]: El campo gmail es requerido.',
            'gmail.email' => '[SISTEMA]: El campo gmail debe tener un formato valido.',
            'gmail.unique' => '[SISTEMA]: El gmail colocado ya esta siendo utilizado en otra cuenta.',

            'telefono.required' => '[SISTEMA]: El campo telefono es requerido.',
            'telefono.digits' => '[SISTEMA]: El campo telefono debe contener 10 digitos.',

            'clave.required' => '[SISTEMA]: La clave es requerida.',
            'clave.min' => '[SISTEMA]: La clave debe tener como minimo 8 caracteres.',
            'clave.max' => '[SISTEMA]: La clave debe tener como maximo 100 caracteres.',

            'rclave.required' => '[SISTEMA]: Debe repetir la clave.',
            'rclave.same' => '[SISTEMA]: Las constraseñas deben ser iguales.',
        ]);

        //SI OCURRE ALGUN ERROR MANDAMOS SUCCESS FALSE
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        //CREAMOS EL USUARIO EN CASO DE QUE ESTE TODO CORRECTO
        Usuario::create([
            'nombre_apellido' => $request->nombre_apellido,
            'gmail' => $request->gmail,
            'telefono' => $request->telefono,
            'clave' => Hash::make($request->clave),
            'estado' => 'Activo',
            'fecha_creacion' => now(),
            'rol_id' => 1
        ]);

        //UNA VEZ CREADO MANDAMOS EL SUCCESS TRUE
        return response()->json([
            'success' => true,
            'message' => '[SISTEMA]: Usuario creado exitosamente.'
        ]);
    }
}
