<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('travel_queries', function (Blueprint $table) {
            $table->id();

            // Stay Details
            $table->string('room_type');          // BestRoom / BudgetRoom / ClassicRoom / DobuleRoom / LuxuryRoom
            $table->date('check_in');
            $table->date('check_out');
            $table->unsignedInteger('rooms')->default(1);
            $table->unsignedInteger('adults')->default(1);
            $table->unsignedInteger('children')->default(0);

            // Customer Basic Info
            $table->string('name');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->text('message')->nullable();

            // Status handled by admin
            $table->enum('status', ['pending', 'contacted', 'confirmed', 'cancelled'])
                  ->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('travel_queries');
    }
};