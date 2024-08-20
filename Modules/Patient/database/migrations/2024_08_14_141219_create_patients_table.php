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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('file_number')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender', ['M', 'F'])->comment('M is male and F is female');
            $table->date('date_of_birth');
            $table->string('phone_number');
            $table->string('next_of_kin_name');
            $table->enum('relationship', ['1','2','3','4','5'])->comment('1 is father, 2 is mother,3 is spouce,4 is brother,5 is sister');
            $table->string('next_of_kin_phone_number');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
