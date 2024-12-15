<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    public const LANGUAGES = [
        'English' => [
            'name' => 'English',
            'slug' => 'en',
        ],
        'Українська' => [
            'name' => 'Українська',
            'slug' => 'uk',
        ],
    ];

    protected $fillable = [
        'name',
        'slug',
    ];
}
