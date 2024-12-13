<?php

namespace App\View\Components\Pages;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class HomePage extends Component
{
    public ?Collection $products;

    public function __construct()
    {
        $this->products = Product::all();
    }

    public function render()
    {
        return view('components.pages.home-page');
    }
}
