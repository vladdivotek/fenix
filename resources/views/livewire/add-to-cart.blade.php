<div class="d-flex align-items-center">
    <div class="ms-3 me-3">
        <input type="number" class="form-control" min="1" wire:model="quantity" value="{{ $quantity }}">
    </div>
    <button type="button"
            class="btn btn-outline-danger"
            aria-label="{{ __('Buy') }}"
            wire:click="addToCart()"
    >
        {{ __('Buy') }}
    </button>
</div>
