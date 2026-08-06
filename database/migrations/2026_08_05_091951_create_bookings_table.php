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
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email');
        $table->string('phone', 15);
        $table->enum('room_type', ['Deluxe', 'Premium', 'Classic', 'Budget']);
        $table->date('check_in_date');
        $table->date('check_out_date');
        $table->unsignedTinyInteger('adults')->default(1);
        $table->unsignedTinyInteger('children')->default(0);
        $table->text('message')->nullable();
        $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('bookings');
}

};