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
            $table->string('academic_year')->nullable();
            $table->foreignId('district_id')->nullable()->constrained('districts')->onDelete('cascade');
            $table->foreignId('sector_id')->nullable()->constrained('sectors')->onDelete('cascade');
            $table->foreignId('cell_id')->nullable()->constrained('cells')->onDelete('cascade');
            $table->foreignId('village_id')->nullable()->constrained('villages')->onDelete('cascade');
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
