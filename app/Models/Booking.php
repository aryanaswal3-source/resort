<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'service_id',
        'price',
        'gst_amount',
        'total_amount',
        'check_in_date',
        'check_out_date',
        'adults',
        'children',
        'message',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}