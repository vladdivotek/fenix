<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductTranslation;
use App\Services\MultiLang;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $languages = MultiLang::getActiveLanguages();

        for ($i = 0; $i < 10; $i++) {
            $product = Product::query()->create([
                'price' => $faker->randomFloat(2, 10, 1000),
                'image' => $faker->imageUrl(640, 480, 'products'),
            ]);

            foreach ($languages as $language) {
                ProductTranslation::query()->create([
                    'language_id' => $language->id,
                    'product_id' => $product->id,
                    'name' => $faker->word,
                    'summary' => $faker->sentence,
                ]);
            }
        }
    }
}
