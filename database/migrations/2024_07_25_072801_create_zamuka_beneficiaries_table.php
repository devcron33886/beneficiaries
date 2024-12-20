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
        Schema::create('zamuka_beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string('head_of_household_name');
            $table->string('household_id_number')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_id_number')->nullable();
            $table->string('sector')->nullable();
            $table->string('cell')->nullable();
            $table->string('village')->nullable();
            $table->string('house_hold_phone')->nullable();
            $table->integer('family_size')->nullable();
            $table->string('main_source_of_income')->nullable();
            $table->string('entrance_year')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zamuka_beneficiaries');
    }
};
