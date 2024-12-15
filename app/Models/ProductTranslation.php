<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'language_id',
        'product_id',
        'name',
        'summary',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
