<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceTier extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'country_id',
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

    // The country this price tier applies to
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // The product this price tier is for
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
