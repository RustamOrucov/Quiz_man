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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained();
            $table->boolean('status')->default(0);
            $table->unsignedInteger('view_count')->default(1);
            $table->timestamps();
            $table->json('en')->nullable();  // İngilizce dil çevirileri
            $table->json('fr')->nullable();  // Fransızca dil çevirileri
            $table->json('az')->nullable();  // Azerice dil çevirileri
            $table->json('ru')->nullable();  // Rusça dil çevirileri
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
