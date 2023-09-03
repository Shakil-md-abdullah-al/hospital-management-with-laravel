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
        Schema::create('medi_carts', function (Blueprint $table) {
            $table->id();
            $table->string('m_name');
            $table->string('m_id');
            $table->string('price');
            $table->string('quantity');
            $table->text('description');
//            $table->text('image');
            $table->string('vendor');
            $table->string('u_name');
            $table->string('email');
            $table->string('phone');
            $table->string('date');
            $table->string('payment_status')->nullable();
            $table->string('user_id');
            $table->string('delivery_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medi_carts');
    }
};
