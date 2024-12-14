<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class AddToCart extends Component
{
    public Product $product;
    public ?int $cart_id = null;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->cart_id = Cookie::has('cart_id') ? (int) Cookie::get('cart_id') : null;
    }

    public function addToCart(): void
    {
        if ($this->cart_id) {
            $cart = Cart::find($this->cart_id);
            $products = $cart->products;
            $this->addProductToCart($products);
            $cart->update(['products' => $products]);
        } else {
            $products[] = $this->createProductEntry();
            $cart = Cart::create(['products' => $products]);
            Cookie::queue('cart_id', $cart->id, 60);
        }

        $this->dispatch('product-added', ['name' => $this->product->name]);
    }

    private function createProductEntry(): array
    {
        return [
            'product' => $this->product->toArray(),
            'quantity' => 1,
        ];
    }

    private function addProductToCart(array &$products): void
    {
        $productExists = false;

        foreach ($products as &$item) {
            if ($item['product']['id'] === $this->product->id) {
                $item['quantity']++;
                $productExists = true;
                break;
            }
        }

        if (!$productExists) {
            $products[] = $this->createProductEntry();
        }
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
