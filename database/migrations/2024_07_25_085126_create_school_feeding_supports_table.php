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
        Schema::create('school_feeding_supports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_feeding_id')->constrained('school_feedings')->onDelete('cascade');
            $table->string('academic_year');
            $table->string('trimester');
            $table->string('current_grade');
            $table->string('support_given');
            $table->longText('notes');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_feeding_supports');
    }
};
