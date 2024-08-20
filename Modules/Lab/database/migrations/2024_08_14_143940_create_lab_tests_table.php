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
        Schema::create('lab_tests', function (Blueprint $table) {
            $table->id();
            $table->string('test_name');
            $table->unsignedInteger('duration');
            $table->string('results');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function authenticatedBy()
    {
        return $this->belongsTo(User::class, 'authenticated_by');
    }





    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_tests');
    }
};
