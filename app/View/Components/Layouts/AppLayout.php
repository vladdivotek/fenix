<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppLayout extends Component
{
    public ?string $title;
    public ?string $description;
    public ?string $keywords;

    public function __construct(?string $title = '', ?string $description = '', ?string $keywords = '')
    {
        $this->title = $title;
        $this->description = $description;
        $this->keywords = $keywords;
    }

    public function render(): View|Closure|string
    {
        return view('components.layouts.app-layout');
    }
}
