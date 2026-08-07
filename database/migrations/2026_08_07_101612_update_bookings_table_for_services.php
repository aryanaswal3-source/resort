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
    Schema::table('bookings', function (Blueprint $table) {
        $table->dropColumn('room_type');

        $table->foreignId('service_id')->after('phone')->constrained('services')->onDelete('cascade');
        $table->decimal('price', 10, 2)->after('service_id');
        $table->decimal('gst_amount', 10, 2)->default(0)->after('price');
        $table->decimal('total_amount', 10, 2)->default(0)->after('gst_amount');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->dropForeign(['service_id']);
        $table->dropColumn(['service_id', 'price', 'gst_amount', 'total_amount']);

        $table->enum('room_type', ['Deluxe', 'Premium', 'Classic', 'Budget'])->after('phone');
    });
}
};
