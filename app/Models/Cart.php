<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'amount',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
