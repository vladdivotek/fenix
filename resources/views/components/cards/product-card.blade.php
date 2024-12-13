<div class="card shadow-sm">
    <div class="image">
        <img src="{{ $product->image }}" alt="{{ $product->name }}">
    </div>
    <div class="card-body">
        <b class="card-text d-block mb-3">{{ $product->name }}</b>
        <p class="card-text mb-3">{{ $product->summary ?? '' }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <b style="color: red;">{{ $product->price }}</b>
            <button type="button" class="btn btn-outline-danger" aria-label="{{ __('Buy') }}">{{ __('Buy') }}</button>
        </div>
    </div>
</div>
