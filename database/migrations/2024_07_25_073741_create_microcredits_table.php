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
        Schema::create('microcredits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vsla_id')->constrained('vslas')->onDelete('cascade');
            $table->string('name');
            $table->string('gender');
            $table->string('id_number')->nullable()->unique();
            $table->string('sector')->nullable();
            $table->string('cell')->nullable();
            $table->string('village')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('loan_one')->nullable();
            $table->integer('loan_two')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('microcredits');
    }
};
