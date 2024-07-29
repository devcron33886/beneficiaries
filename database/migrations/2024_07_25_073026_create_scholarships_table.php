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
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender')->nullable();
            $table->string('id_number')->nullable()->unique();
            $table->foreignId('district_id')->nullable()->constrained('districts')->onDelete('cascade');
            $table->foreignId('sector_id')->nullable()->constrained('sectors')->onDelete('cascade');
            $table->foreignId('cell_id')->nullable()->constrained('cells')->onDelete('cascade');
            $table->foreignId('village_id')->nullable()->constrained('villages')->onDelete('cascade');
            $table->string('mobile')->nullable();
            $table->string('university_attended')->nullable();
            $table->string('faculty')->nullable();
            $table->string('program_duration')->nullable();
            $table->string('budget_to_complete')->nullable();
            $table->string('year_of_entrance')->nullable();
            $table->string('school_contact')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};
