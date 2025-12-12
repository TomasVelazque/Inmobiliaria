<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function(Blueprint $tabla){
            $tabla->id();
            $tabla->string('nombre_apellido');
            $tabla->string('gmail')->unique();
            $tabla->string('telefono');
            $tabla->string('clave');
            $tabla->enum('estado', ['Activo', 'Inactivo'])->default('Activo');
            $tabla->timestamp('fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $tabla->foreignId('rol_id')->nullable()->constrained('roles')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
