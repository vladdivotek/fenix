<header class="header">
    <div class="container">
        <div class="header-actions">
            @if(!$user)
                @livewire('login-button')
            @endif
        </div>
    </div>
</header>
