<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('api_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->string('api_key');
            $table->string('secret');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('api_tokens');
    }
};
