<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KeywordController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('fronend/index');
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])   ->name('home');

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('admin/', function () {
        return redirect('/category');
    });
    
    // router category
    Route::prefix('category')->group(function () {
        Route::get  ('/edit/{id}',      [CategoryController::class,'edit'])     ->name('categort.edit');
        Route::post ('/edit/{id}',      [CategoryController::class,'update'])   ->name('categort.update');
        Route::get  ('/create',         [CategoryController::class,'create'])   ->name('category.create');
        Route::post ('/create',         [CategoryController::class,'store'])    ->name('categort.store');
        Route::get  ('/delete/{id}',    [CategoryController::class,'destroy'])  ->name('categort.delete');
        Route::get  ('/{parame?}',      [CategoryController::class,'index'])    ->name('home');

    });
    // router blog
    Route::prefix('blog')->group(function () {
        Route::get  ('/create',         [BlogController::class,'create'])      ->name('blog.create');
        Route::post ('/create',         [BlogController::class,'store'])       ->name('blog.store');
        Route::get  ('/edit/{id}',      [BlogController::class,'edit'])        ->name('blog.edit');
        Route::post ('/edit/{id}',      [BlogController::class,'update'])      ->name('blog.update');
        Route::get  ('/delete/{id}',    [BlogController::class,'destroy'])     ->name('blog.delete');
        Route::get  ('/{parame?}',      [BlogController::class,'index'])       ->name('blog.index');

    });
    // router product
    Route::prefix('product')->group(function () {
        Route::get  ('/create',         [ProductController::class,'create'])    ->name('product.create');
        Route::post ('/create',         [ProductController::class,'store'])     ->name('product.store');
        Route::get  ('/edit/{id}',      [ProductController::class,'edit'])      ->name('product.edit');
        Route::post ('/edit/{id}',      [ProductController::class,'update'])    ->name('product.update');
        Route::get  ('/delete/{id}',    [ProductController::class,'destroy'])   ->name('product.delete');
        Route::get  ('/{parame?}',      [ProductController::class,'index'])     ->name('product.index');
    });
    // router keyword
    Route::prefix('keyword')->group(function () {
        Route::get  ('/create',          [KeywordController::class,'create'])    ->name('keyword.create');
        Route::post ('/create',          [KeywordController::class,'store'])     ->name('keyword.store');
        Route::get  ('/edit/{id}',       [KeywordController::class,'edit'])      ->name('keyword.edit');
        Route::post ('/edit/{id}',       [KeywordController::class,'update'])    ->name('keyword.update');
        Route::get  ('/delete/{id}',     [KeywordController::class,'destroy'])   ->name('keyword.delete');
        Route::get  ('/{parame?}',       [KeywordController::class,'index'])     ->name('keyword.index');
    });
});



