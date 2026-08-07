<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {

            if (Schema::hasColumn('bookings', 'room_type')) {
                $table->dropColumn('room_type');
            }

            if (!Schema::hasColumn('bookings', 'service_id')) {
                $table->foreignId('service_id')
                    ->after('phone')
                    ->constrained('services')
                    ->cascadeOnDelete();
            }

            if (!Schema::hasColumn('bookings', 'price')) {
                $table->decimal('price', 10, 2)->default(0)->after('service_id');
            }

            if (!Schema::hasColumn('bookings', 'gst_amount')) {
                $table->decimal('gst_amount', 10, 2)->default(0)->after('price');
            }

            if (!Schema::hasColumn('bookings', 'total_amount')) {
                $table->decimal('total_amount', 10, 2)->default(0)->after('gst_amount');
            }
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {

            if (Schema::hasColumn('bookings', 'service_id')) {
                $table->dropForeign(['service_id']);
            }

            $table->dropColumn([
                'service_id',
                'price',
                'gst_amount',
                'total_amount'
            ]);

            if (!Schema::hasColumn('bookings', 'room_type')) {
                $table->enum('room_type', [
                    'Deluxe',
                    'Premium',
                    'Classic',
                    'Budget'
                ])->after('phone');
            }
        });
    }
};