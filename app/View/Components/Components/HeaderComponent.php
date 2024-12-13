<?php

namespace App\View\Components\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class HeaderComponent extends Component
{
    public ?User $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function render(): View|Closure|string
    {
        return view('components.components.header-component');
    }
}
