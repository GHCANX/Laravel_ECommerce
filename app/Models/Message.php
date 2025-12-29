<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Order;
use App\Models\User;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_id',
        'sender_id',
        'message',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Message belongs to an order
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Message sender (user or admin)
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
