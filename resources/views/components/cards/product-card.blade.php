<div class="card shadow-sm">
    <div class="image">
        <img src="{{ $product->image }}" alt="{{ $product->translations->first()?->name }}">
    </div>
    <div class="card-body">
        <b class="card-text d-block mb-3">{{ $product->translations->first()?->name }}</b>
        <p class="card-text mb-3">{{ $product->translations->first()?->summary ?? '' }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <b style="color: red;">{{ $product->price }}</b>
            @livewire('add-to-cart', ['product' => $product])
        </div>
    </div>
</div>
