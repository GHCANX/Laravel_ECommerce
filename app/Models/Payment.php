<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'uuid',
        'invoice_id',
        'status',
        'send_address',
        'deposit_address',
        'total_xmr',
    ];

    /**
     * Attribute casts
     */
    protected $casts = [
        'total_xmr' => 'decimal:12',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Relationships
     */

    // The invoice this payment belongs to
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
