<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect('/login');
})->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'totalProductos' => Producto::count()
        ]);
    })->name('dashboard');

    Route::get('/settings/profile', function () {
        return Inertia::render('settings/Profile');
    });

    Route::post('/profile/update', [ProfileController::class, 'update']);

    Route::resource('productos', ProductoController::class);

});

require __DIR__.'/settings.php';