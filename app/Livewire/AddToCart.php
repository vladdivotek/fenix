<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Services\MultiLang;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class AddToCart extends Component
{
    public Product $product;
    public ProductTranslation $translation;
    public ?int $cart_id = null;

    public int $quantity = 1;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->translation = $this->product->translations()
            ->where('language_id', MultiLang::getCurrentLanguage()->id)
            ->first();
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

            $this->dispatch('set-cart-cookie', ['cartId' => $cart->id]);
        }

        $this->dispatch('product-added', ['name' => $this->translation->name]);
    }

    private function createProductEntry(): array
    {
        $product = $this->product->toArray();

        return [
            'product' => array_merge($product, ['name' => $this->translation->name]),
            'quantity' => $this->quantity,
        ];
    }

    private function addProductToCart(array &$products): void
    {
        $productExists = false;

        foreach ($products as &$item) {
            if ($item['product']['id'] === $this->product->id) {
                $item['quantity'] += $this->quantity;
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
