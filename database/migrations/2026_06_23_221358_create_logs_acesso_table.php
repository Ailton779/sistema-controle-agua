<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('logs_acesso', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('consumidor_id')->constrained('consumidores');
            $table->string('acao');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('logs_acesso');
    }
};
