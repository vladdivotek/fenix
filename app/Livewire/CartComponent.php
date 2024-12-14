<?php

namespace App\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class CartComponent extends Component
{
    public ?Cart $cart = null;

    protected $listeners = ['refreshCart' => 'loadCart'];

    public function mount(): void
    {
        $this->loadCart();
    }

    public function loadCart(): void
    {
        $cartId = Cookie::get('cart_id');
        $this->cart = $cartId ? Cart::find($cartId) : null;
    }

    public function removeProduct(int $productId): void
    {
        if ($this->cart) {
            $products = collect($this->cart->products);

            $updatedProducts = $products->reject(function ($product) use ($productId) {
                return $product['product']['id'] === $productId;
            })->values()->toArray();

            $this->cart->update(['products' => $updatedProducts]);

            $this->loadCart();
            $this->dispatch('refreshCart');
        }
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
