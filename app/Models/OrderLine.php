<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderLine extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'uuid',
        'order_id',
        'product_id',
        'quantity',
        'rate',
        'subtotal',
    ];

    /**
     * Attribute casts
     */
    protected $casts = [
        'quantity' => 'decimal:3',
        'rate' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Relationships
     */

    // The order this line belongs to
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // The product this line refers to
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
