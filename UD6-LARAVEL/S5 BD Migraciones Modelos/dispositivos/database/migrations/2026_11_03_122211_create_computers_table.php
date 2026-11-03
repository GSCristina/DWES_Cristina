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
        Schema::create('computers', function (Blueprint $table) {
            $table->unsignedBigInteger('codigo')->primary();
            $table->timestamps();
            $table->string('marca', 30);
            $table->string('modelo', 180);
            $table->string('procesador', 100);
            $table->unsignedSmallInteger('ram_gb');
            $table->decimal('precio', 9, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
