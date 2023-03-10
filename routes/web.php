<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MealsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\QrcodeController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\AllergensController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\SortablelistController;

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

Route::middleware(['check_app_installation'])->get('/', [FrontendController::class, 'index']);

Route::middleware(['check_app_installation', 'auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Install Controller
Route::prefix('install')->group(function() {
    Route::get('index', [InstallController::class, 'index'])->name('install.index');
    Route::get('company', [InstallController::class, 'company'])->name('install.company');
    Route::get('user', [InstallController::class, 'user'])->name('install.user');
    Route::get('finish', [InstallController::class, 'finish'])->name('install.finish');
});

// Admin
Route::middleware(['check_app_installation', 'auth', 'access'])->prefix('admin')->group(function() {
    
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('qrcode', [QrcodeController::class, 'index'])->name('qrcode');

    Route::resource('users', UsersController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('meals', MealsController::class);
    Route::resource('allergens', AllergensController::class);
    
    Route::get('company', [CompanyController::class, 'edit'])->name('company.edit');
    Route::put('company', [CompanyController::class, 'update'])->name('company.update');

    Route::put('sortablelist', [SortablelistController::class, 'update'])->name('sortablelist.update');
});

// Contact
Route::post('/contact', [ContactController::class, 'index'])->name('api.contact');

require __DIR__.'/auth.php';
