<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StarController;
use App\Models\Star;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'stars' => Star::all()
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Stars
    Route::get('/stars', [StarController::class, 'show'])->name('stars.show');
    Route::get('/stars/create', [StarController::class, 'edit'])->name('stars.create');
    Route::post('/stars/create', [StarController::class, 'store'])->name('stars.store');

    Route::get('/stars/{star}', [StarController::class, 'edit'])->name('stars.edit');
    Route::patch('/stars/{star}', [StarController::class, 'update'])->name('stars.update');
    Route::delete('/stars/{star}', [StarController::class, 'destroy'])->name('stars.destroy');
});

require __DIR__.'/auth.php';
