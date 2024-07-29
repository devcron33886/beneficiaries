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
        Schema::create('toolkits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender')->nullable();
            $table->string('identification_number')->nullable()->unique();
            $table->string('phone_number')->nullable();
            $table->string('tvet_attended')->nullable();
            $table->string('option')->nullable();
            $table->string('level')->nullable();
            $table->boolean('toolkit_received')->nullable();
            $table->decimal('toolkit_cost', 8, 2)->nullable();
            $table->decimal('subsidized_percent', 5, 2)->nullable();
            $table->decimal('loan_recommended', 8, 2)->nullable();
            $table->decimal('total', 8, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toolkits');
    }
};
