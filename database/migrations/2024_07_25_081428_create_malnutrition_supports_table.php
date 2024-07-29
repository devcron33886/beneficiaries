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
        Schema::create('malnutrition_supports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('malnutrition_id')->constrained('malnutritions')->onDelete('cascade');
            $table->date('package_receiving_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('malnutrition_supports');
    }
};
