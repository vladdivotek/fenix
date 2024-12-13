<div>
    <button class="btn btn-primary" wire:click="login" aria-label="{{ __('Login') }}">{{ __('Login') }}</button>

    @if (session()->has('message'))
        <div class="alert alert-success mt-2">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger mt-2">
            {{ session('error') }}
        </div>
    @endif
</div>
