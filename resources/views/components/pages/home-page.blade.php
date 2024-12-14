<x-layouts.app-layout :title="__('Title')" :description="__('Description')" :keywords="__('Keywords')">
    <div class="row">
        <div class="col-lg-9">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-md-4 g-4">
                @if($products->count() > 0)
                    @foreach($products as $product)
                        <div class="col">
                            <x-cards.product-card :product="$product" />
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-lg-3">
            @livewire('cart-component')
        </div>
    </div>
</x-layouts.app-layout>
