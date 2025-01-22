<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\CategroyController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Front\FrontendController;
use App\Http\Controllers\ProfileController;
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
Route::get('/category/{slug}', [FrontendController::class, 'index'])->name('emon.category');
Route::get('/category/{cat_slug}/{sub_cat_slug}', [FrontendController::class, 'index'])->name('emon.subCategory');
Route::get('/tag/{slug}', [FrontendController::class, 'index'])->name('emon.tag');
Route::get('/post/{slug}', [FrontendController::class, 'index'])->name('emon.post');
Route::get('/single-post', [FrontendController::class, 'single'])->name('single.post');
Route::get('/about', [FrontendController::class, 'About'])->name('about.page');
Route::get('/blog', [FrontendController::class, 'Blog'])->name('blog.page');
Route::get('/contact', [FrontendController::class, 'Contact'])->name('contact.page');


Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [BackendController::class, 'index'])
        ->middleware(['auth', 'verified'])->name('dash.index');
    Route::resource('categroy', CategroyController::class);
    Route::get('get-subCategory/{id}',[SubCategoryController::class, 'getSubCategoryByCategoryId'] );
    Route::resource('tag', TagController::class);
    Route::resource('post', PostController::class);
    Route::resource('subCategory', SubCategoryController::class);   
   

});
// Route::get('dashboard/category/{category}', [CategroyController::class, 'show'])->name('category.show');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
