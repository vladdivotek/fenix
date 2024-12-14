<div>
    @if ($cart && $cart->products)
        <h3>Cart</h3>
        @foreach ($cart->products as $product)
            <div class="d-flex align-items-center mb-2">
                <p class="me-2">{{ $product['product']['name'] }} ({{ $product['quantity'] }})</p>
                <button class="btn btn-danger btn-sm" wire:click="removeProduct('{{ $product['product']['id'] }}')">
                    {{ __('Remove') }}
                </button>
            </div>
        @endforeach
    @else
        <p>Cart is empty</p>
    @endif
</div>
