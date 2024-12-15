<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Language::LANGUAGES as $language) {
            Language::query()->create([
                'name' => $language['name'],
                'slug' => $language['slug'],
            ]);
        }
    }
}
