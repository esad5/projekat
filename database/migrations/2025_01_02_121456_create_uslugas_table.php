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
        Schema::create('uslugas', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->unique();
            $table->datetime('date');
            $table->integer('grade');
            $table->text('description')->nullable();
            $table->integer('majstor');
            $table->integer('car');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uslugas');
    }
};
