<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin/dashboard', function () {
    return view('admin.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::middleware('role:1')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {
            Route::view('dashboard', 'admin.index')->name('dashboard');
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::resource('category', CategoryController::class);
            Route::resource('label', LabelController::class);
            Route::resource('status', StatusController::class);
            Route::resource('priority', PriorityController::class);
            Route::resource('user', UserController::class);
        });

    Route::middleware('role:2')
        ->prefix('agent')
        ->name('agent.')
        ->group(function () {
            Route::view('dashboard', 'admin.index')->name('dashboard');
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });


    Route::middleware('role:3')
        ->prefix('customer')
        ->name('customer.')
        ->group(function () {
            Route::view('dashboard', 'customer.index')->name('dashboard');
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
            Route::resource('ticket', TicketController::class);
        });
});

require __DIR__ . '/auth.php';
