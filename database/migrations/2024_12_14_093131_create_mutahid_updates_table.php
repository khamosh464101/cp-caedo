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
        Schema::create('mutahid_updates', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->string('file');
            $table->string('is_mutahid_dfi')->default(true);
            $table->string('image');
            $table->boolean('published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutahid_updates');
    }
};
