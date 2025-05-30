<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('contrataciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicio_id')->constrained('servicios')->onDelete('cascade');
            $table->foreignId('cliente_id')->constrained('usuarios')->onDelete('cascade');
            $table->date('fecha');
            $table->string('estado'); // pendiente, confirmado, completado
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('contrataciones');
    }
};
