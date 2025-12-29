<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PriceTier;
use App\Models\Order;

class Country extends Model
{
    use HasFactory;

    // Columns that can be mass-assigned
    protected $fillable = [
        'iso3',
        'name',
        'active',
    ];

    // Casts
    protected $casts = [
        'active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationships
    public function priceTiers()
    {
        return $this->hasMany(PriceTier::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
