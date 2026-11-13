<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fichas_tecnicas', function (Blueprint $table) {
            $table->id();
            $table->string('plataforma', 150);
            $table->string('motor_grafico', 150);
            $table->unsignedTinyInteger('edad_recomendada');
            $table->unsignedInteger('espacio_gb');
            $table->string('modo_juego', 100);

            $table->foreignId('videojuego_id')
                ->unique()
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ficha_tecnicas');
    }
};
