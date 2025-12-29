<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'uuid',
        'user_id',
        'country_id',
        'status',
        'address_details',
        'subtotal',
    ];

    /**
     * Attribute casts.
     */
    protected $casts = [
        'subtotal' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Relationships
     */
    
    // The user who owns the order
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // The country associated with the order
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // The order lines for this order
    public function orderLines()
    {
        return $this->hasMany(OrderLine::class);
    }

    // The invoice for this order
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    // Messages related to this order
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    // Notifications related to this order (if applicable)
    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }
}
