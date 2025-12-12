<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function(Blueprint $tabla){
            $tabla->id();
            $tabla->string('nombre_rol')->unique();
            $tabla->text('descripcion_rol');
            $tabla->timestamp('fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
