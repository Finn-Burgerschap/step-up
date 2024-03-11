<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Home;
use App\Livewire\Overview;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home');

Route::middleware(RedirectIfAuthenticated::class)->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});

Route::middleware(Authenticate::class)->group(function () {
    Route::get('/home', Home::class)->name('home');
    Route::get('overview', Overview::class)->name('overview');

    Route::post('logout', LogoutController::class)->name('logout');
});
