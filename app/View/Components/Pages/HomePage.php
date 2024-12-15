<?php

namespace App\View\Components\Pages;

use App\Models\Product;
use App\Services\MultiLang;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class HomePage extends Component
{
    public ?Collection $products;

    public function __construct()
    {
        $this->products = Product::query()
            ->with(['translations' => function ($query) {
                $query->where('language_id', MultiLang::getCurrentLanguage()->id);
            }])
            ->get();
    }

    public function render()
    {
        return view('components.pages.home-page');
    }
}
