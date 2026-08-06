<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelQuery extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_type',
        'check_in',
        'check_out',
        'rooms',
        'adults',
        'children',
        'name',
        'mobile',
        'email',
        'message',
        'status',
    ];

    protected $casts = [
        'check_in'  => 'date',
        'check_out' => 'date',
    ];

    // Badge color helper for admin panel
    public function statusColor(): string
    {
        return match ($this->status) {
            'pending'   => 'warning',
            'contacted' => 'info',
            'confirmed' => 'success',
            'cancelled' => 'danger',
            default     => 'secondary',
        };
    }
}