<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', [UserController::class, 'about'])->name('about');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [UserController::class, 'userprofile'])->name('profile');
});

//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');

    Route::get('/admin/profile', [AdminController::class, 'profilepage'])->name('admin/profile');

    Route::get('/admin/assets', [AssetController::class, 'index'])->name('admin/assets');
    Route::get('/admin/assets/create', [AssetController::class, 'create'])->name('admin/assets/create');
    Route::post('/admin/assets/store', [AssetController::class, 'store'])->name('admin/assets/store');
    Route::get('/admin/assets/show/{id}', [AssetController::class, 'show'])->name('admin/assets/show');
    Route::get('/admin/assets/edit/{id}', [AssetController::class, 'edit'])->name('admin/assets/edit');
    Route::put('/admin/assets/edit/{id}', [AssetController::class, 'update'])->name('admin/assets/update');
    Route::delete('/admin/assets/destroy/{id}', [AssetController::class, 'destroy'])->name('admin/assets/destroy');
    Route::get('admin/assets/search', [AssetController::class, 'search'])->name('admin/assets/search');

});
