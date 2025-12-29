<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\PriceTier;
use App\Models\Image;
use App\Models\OrderLine;
class Product extends Model
{
    use HasFactory, SoftDeletes;

    // Columns that can be mass-assigned
    protected $fillable = [
        'name',
        'active',
        'description',
    ];

    // Casts
    protected $casts = [
        'active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Relationships
    public function priceTiers()
    {
        return $this->hasMany(PriceTier::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function orderLines()
    {
        return $this->hasMany(OrderLine::class);
    }
}
