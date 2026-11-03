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
        Schema::create('mobiles', function (Blueprint $table) {
            $table->unsignedBigInteger('codigo')->primary();
            $table->string('marca', 160);
            $table->string('modelo', 40);
            $table->string('sistema_operativo', 40);
            $table->unsignedSmallInteger('almacenamiento_gb');
            $table->string('imei', 15)->unique();
            $table->decimal('precio', 9, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobiles');
    }
};
