<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loan_distributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('microcredits');
            $table->integer('amount');
            $table->longText('notes');
            $table->foreignId('credit_top_up_id')->constrained('credit_top_ups');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loan_distributions');
    }
};
