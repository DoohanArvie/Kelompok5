<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\Frontend\CarController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Frontend\ProfileController;

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

Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('daftar-mobil', [CarController::class, 'index'])->name('car.index');
Route::get('/daftar-mobil/{car}', [CarController::class, 'show'])->name('car.show');
Route::post('daftar-mobil', [CarController::class, 'store'])->name('car.store');
Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('blog/{blog:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('tentang-kami', [AboutController::class, 'index']);
Route::get('kontak', [ContactController::class, 'index']);
Route::post('kontak', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('is_admin');

Route::group(['middleware' => ['is_admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::resource('cars', \App\Http\Controllers\Admin\CarController::class);
    Route::resource('motorcycles', \App\Http\Controllers\Admin\MotorcycleController::class);
    Route::resource('types', \App\Http\Controllers\Admin\TypeController::class);
    Route::resource('typemotorcycles', \App\Http\Controllers\Admin\TypeMotorcycleController::class);
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
    Route::resource('teams', \App\Http\Controllers\Admin\TeamController::class);
    Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class)->only(['index','store','update']);
    Route::resource('contacts', \App\Http\Controllers\Admin\ContactController::class)->only(['index','destroy']);
    Route::resource('bookings', \App\Http\Controllers\Admin\BookingController::class)->only(['index','destroy']);
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);
});
