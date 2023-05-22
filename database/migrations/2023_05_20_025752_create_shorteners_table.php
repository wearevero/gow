<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shorteners', function (Blueprint $table) {
            $table->id();
            $table->string('original');
            $table->string('short')->unique();
            $table->string('unique_key')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shorteners');
    }
};
