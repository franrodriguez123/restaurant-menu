<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\UsersController;

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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Install Controller
Route::prefix('install')->group(function() {
    Route::get('index', [InstallController::class, 'index'])->name('install.index');
    Route::get('user', [InstallController::class, 'user'])->name('install.user');
    Route::get('finish', [InstallController::class, 'finish'])->name('install.finish');
});

// Admin
Route::middleware(['auth', 'access'])->prefix('admin')->group(function() {
    
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', UsersController::class);
    Route::resource('categories', CategoriesController::class);
});

require __DIR__.'/auth.php';
