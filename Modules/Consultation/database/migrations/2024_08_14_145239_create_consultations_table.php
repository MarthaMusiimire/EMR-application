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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('symptoms');
            $table->string('duration');
            $table->string('primary_diagnosis');
            $table->string('other_diagnoses')->nullable();;       
            $table->timestamps();
        });
    }

    
    
     public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
