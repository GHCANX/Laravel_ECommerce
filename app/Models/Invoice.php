<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Order;
use App\Models\Payment;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'order_id',
        'status',
        'deposit_address',
        'total_usd',
        'total_xmr',
    ];

    protected $casts = [
        'total_usd' => 'decimal:2',
        'total_xmr' => 'decimal:12',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Invoice belongs to a single order
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Invoice can have many payments (partial payments allowed)
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
