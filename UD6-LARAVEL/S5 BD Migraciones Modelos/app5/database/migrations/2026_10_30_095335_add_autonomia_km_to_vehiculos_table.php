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
    Schema::table('vehiculos', function (Blueprint $table) {
        $table->decimal('autonomia_km', 6, 2)->nullable();
    });
}

public function down(): void
{
    Schema::table('vehiculos', function (Blueprint $table) {
        $table->dropColumn('autonomia_km');
    });
}
};
