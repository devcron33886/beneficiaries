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
        Schema::create('ecd_beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('grade')->nullable();
            $table->string('gender')->nullable();
            $table->string('birthday')->nullable();
            $table->string('academic_year')->nullable();
            $table->string('sector')->nullable();
            $table->string('cell')->nullable();
            $table->string('village')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_id_number')->nullable()->unique();
            $table->string('mother_name')->nullable();
            $table->string('home_phone_number')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecd_beneficiaries');
    }
};
