<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('api_tokens_usage', function (Blueprint $table) {
            $table->foreignId('token_id');
            $table->foreign('token_id')->references('id')->on('api_tokens');
            $table->string('query');
            $table->integer('response_status');
            $table->timestamp('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('api_tokens_usage');
    }
};
