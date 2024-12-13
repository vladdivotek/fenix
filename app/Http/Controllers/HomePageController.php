<?php

namespace App\Http\Controllers;

use App\View\Components\Pages\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class HomePageController extends Controller
{
    public function __invoke(Request $request): string
    {
        return Blade::renderComponent(new HomePage);
    }
}
