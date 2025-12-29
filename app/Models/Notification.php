<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\DatabaseNotification;

class Notification extends DatabaseNotification
{
    use HasFactory;

    /**
     * The primary key type and incrementing settings.
     */
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id',            // UUID
        'type',
        'notifiable_id',
        'notifiable_type',
        'source',        // e.g., message, order, payment
        'source_uuid',   // optional public-safe reference
        'data',
        'read_at',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'data' => 'array',
        'read_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
