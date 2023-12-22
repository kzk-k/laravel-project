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
        Schema::create('images', function (Blueprint $table) {
            $table->smallIncrements('id');
            // $table->string('title_ja', 100)->unique();
            // $table->string('title_en', 100)->unique();
            $table->string('title_ja', 100);
            $table->string('title_en', 100)->nullable();
            $table->boolean('is_hidden')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
