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
        Schema::create('zamuka_supports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zamuka_beneficiary_id')->constrained('zamuka_beneficiaries')->onDelete('cascade');
            $table->string('house');
            $table->string('home_equipments');
            $table->string('bicycle');
            $table->string('cowshed');
            $table->string('cow');
            $table->string('goats');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zamuka_supports');
    }
};
