<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('artist', 150);
            $table->string('album', 150)->nullable();
            $table->enum('genre', [
                'rock', 'pop', 'electronic', 'hip-hop',
                'jazz', 'classical', 'other',
            ])->default('other');
            $table->unsignedInteger('duration_seconds');
            $table->unsignedSmallInteger('release_year')->nullable();
            $table->unsignedBigInteger('plays')->default(0);
            $table->decimal('price', 6, 2)->default(0);
            $table->boolean('published')->default(true);
            $table->json('extra_data')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('genre');
            $table->index(['published', 'genre']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};