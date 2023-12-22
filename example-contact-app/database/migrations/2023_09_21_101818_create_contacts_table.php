<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('username', 20);

            // $table->string('tel')->unique();
            $table->string('tel');

            // $table->string('email')->unique();
            $table->string('email');

            // checkbox
            $table->boolean('type_design')->default(false)->comment('お問い合わせの種類');
            $table->boolean('type_frontend')->default(false)->comment('お問い合わせの種類');
            $table->boolean('type_backend')->default(false)->comment('お問い合わせの種類');

            // select
            // UNSIGNED BIGINT,
            $table->foreignId('prefecture_id')->constrained()->comment('都道府県ID');

            // radio
            $table->boolean('receive_notification')->default(true)->comment('お知らせの受信');

            // textarea
            $table->string('contact_detail')->comment('詳細');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
