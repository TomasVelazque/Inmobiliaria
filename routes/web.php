<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;

//RUTAS PARA LAS VISTAS

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function() {
    return view('login');
});

Route::get('/register', function(){
    return view('register');
});

Route::get('/admin_panel', function(){
    return view('adm_Usuarios');
});

// RUTA PARA CERRAR SESSION
Route::post('/logout', function(){
    session()->flush();
    return redirect('/');
});

//RUTAS DE USUARIO
Route::post("/registrarUsuario", [UsuarioController::class, 'registrarUsuario']);
Route::post("/iniciarSession", [UsuarioController::class, 'iniciarSession']);
Route::post("/crearUsuario", [UsuarioController::class, 'crearUsuario']);


//RUTAS DE ROLES
Route::get("/cargarRoles", [RolController::class, 'cargarRoles']);