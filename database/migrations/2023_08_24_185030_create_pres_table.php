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
        Schema::create('pres', function (Blueprint $table) {
            $table->id();
            $table->string("p_name");
            $table->string("sex");
            $table->string("d_phone");
            $table->string("email");
            $table->string("d_name");
            $table->text("medicines")->nullable();
            $table->text("tests")->nullable();
            $table->string("advice")->nullable();
            $table->string("age");
            $table->string("appointment_id");
            $table->string("doctor_id");
            $table->string("appointmenthistory_id");
            $table->string("user_id");
            $table->string("fee");
            $table->string("current_datetime");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pres');
    }
};
