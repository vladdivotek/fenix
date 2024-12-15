<?php

namespace App\Services;

use App\Models\Language;
use Illuminate\Database\Eloquent\Collection;

class MultiLang
{
    public static function getActiveLanguages(): Collection
    {
        return Language::all();
    }

    public static function getCurrentLanguage(): Language
    {
        return Language::first();
    }
}
