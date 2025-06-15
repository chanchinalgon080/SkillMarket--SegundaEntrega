<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });

        if (!Schema::hasTable('categoria_servicio')) { 
            Schema::create('categoria_servicio', function (Blueprint $table) {
                $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
                $table->foreignId('servicio_id')->constrained('servicios')->onDelete('cascade');
                $table->primary(['categoria_id', 'servicio_id']); 
                $table->timestamps();
            });
        }
    }

    public function down(): void {
        Schema::dropIfExists('categoria_servicio');
        Schema::dropIfExists('categorias');
    }
};
