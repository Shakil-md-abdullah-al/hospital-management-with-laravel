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
        Schema::create('appointment_histories', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email');
            $table->string('phone');
            $table->unsignedBigInteger('user_id');

            $table->string('doctor');
            $table->unsignedBigInteger('doctor_id');
            $table->string('fee');

            $table->string('message');
            $table->string('status');
            $table->unsignedBigInteger('appointment_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_histories');
    }
};
