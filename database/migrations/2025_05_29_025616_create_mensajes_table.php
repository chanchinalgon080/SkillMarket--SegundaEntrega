<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emisor_id')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('receptor_id')->constrained('usuarios')->onDelete('cascade');
            $table->text('contenido');
            $table->timestamp('leido_en')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('mensajes');
    }
};
