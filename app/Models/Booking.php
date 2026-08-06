<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'room_type',
        'check_in_date',
        'check_out_date',
        'adults',
        'children',
        'message',
        'status',
    ];
}