<?php

use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePageController::class)->name('home');
