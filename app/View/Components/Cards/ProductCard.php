<?php

namespace App\View\Components\Cards;

use App\Models\Product;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('components.cards.product-card');
    }
}
