<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Front\FrontendController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontendController::class, 'index'])->name('emon.index');
Route::get('/single-post', [FrontendController::class, 'single'])->name('single.post');
Route::get('/about', [FrontendController::class, 'About'])->name('about.page');
Route::get('/blog', [FrontendController::class, 'Blog'])->name('blog.page');
Route::get('/contact', [FrontendController::class, 'Contact'])->name('contact.page');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [BackendController::class, 'index'])->name('dash.index');

});
