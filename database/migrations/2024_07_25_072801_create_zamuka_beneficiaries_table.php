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
            $table->foreignId('district_id')->nullable()->constrained('districts')->onDelete('cascade');
            $table->foreignId('sector_id')->nullable()->constrained('sectors')->onDelete('cascade');
            $table->foreignId('cell_id')->nullable()->constrained('cells')->onDelete('cascade');
            $table->foreignId('village_id')->nullable()->constrained('villages')->onDelete('cascade');
            $table->string('house_hold_phone');
            $table->integer('family_size');
            $table->string('main_source_of_income');
            $table->string('entrance_year');
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
