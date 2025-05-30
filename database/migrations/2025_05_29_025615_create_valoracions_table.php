<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('valoracions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicio_id')->constrained('servicios')->onDelete('cascade');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade'); // quien valora
            $table->tinyInteger('calificacion'); // 1 a 5 estrellas
            $table->text('comentario')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('valoracions');
    }
};
