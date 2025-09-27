<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OurProController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ImageFooterController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\NewsController;

Route::get("/", [HomeController::class,"index"])->name('home');
Route::get("/about", [AboutController::class,"index"])->name('about');
Route::get('/ourproduct', [OurProController::class, 'index'])->name('index');
Route::get("/ourteam", [OurTeamController::class,"index"])->name('ourteam');
Route::get('/ourproduct', [OurProController::class, 'index'])->name('products.index');
Route::get('/news', [NewsController::class, 'index'])->name('news');

Route::get('/event-detail/{id}', [NewsController::class, 'show'])->name('event.detail');
Route::get('/event-detail/{id}', [NewsController::class, 'show'])->name('event.detail');
// routes/web.php
// routes/web.php


// routes/web.php
// routes/wCart
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/increment/{productId}', [CartController::class, 'incrementQuantity'])->name('cart.increment');
Route::post('/cart/decrement/{productId}', [CartController::class, 'decrementQuantity'])->name('cart.decrement');
Route::post('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'viewCart'])->name('products.cart.view');
Route::post('/checkout/process', [CartController::class, 'processCheckout'])->name('checkout.process');
Route::get('/checkout/success', [CartController::class, 'checkoutSuccess'])->name('checkout.success');
Route::get('/products/{product}', [CartController::class, 'show'])->name('products.show');






Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/products', [DashboardController::class, 'index'])->name('dashboard.products.index');
    Route::get('/dashboard/products/create', [DashboardController::class, 'create'])->name('dashboard.products.create');
    Route::post('/dashboard/products', [DashboardController::class, 'store'])->name('dashboard.products.store');
    Route::delete('/dashboard/products/{product}', [DashboardController::class, 'destroy'])->name('dashboard.products.destroy');
    Route::get('/dashboard/products/{product}/edit', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/products/{product}', [DashboardController::class, 'update'])->name('dashboard.update');

Route::get('/upload-event', [NewsController::class, 'create'])->name('upload.event');
Route::post('/upload-event', [NewsController::class, 'store']);
    Route::get('/event-edit/{id}', [NewsController::class, 'edit'])->name('event.edit');
    Route::put('/event-update/{id}', [NewsController::class, 'update'])->name('event.update');
    Route::delete('/event-destroy/{id}', [NewsController::class, 'destroy'])->name('event.destroy');
// GET route to display the upload form
  //  Route::get('/dashboard/imageFooter/uploard', [DashboardController::class, 'showUploadForm'])->name('dashboard.imageFooter.uploard');

Route::get('/dashboard/imageFooter/uploard', [ImageFooterController::class, 'showUploadForm'])->name('dashboard.imageFooter.uploard');
Route::post('/dashboard/imageFooter/uploard', [ImageFooterController::class, 'upload'])->name('uploard.process.images');
Route::delete('/images/{image}', [ImageFooterController::class, 'destroy'])->name('images.destroy');
    Route::resource('team', TeamMemberController::class)->parameters([
        'team' => 'teamMember'
    ])->names([
        'index'   => 'team.index',
        'create'  => 'team.create',
        'store'   => 'team.store',
        'edit'    => 'team.edit',
        'update'  => 'team.update',
        'destroy' => 'team.destroy',
    ]);
// POST route to handle the form submission
  //  Route::post('/dashboard/imageFooter/uploard', [DashboardController::class, 'upload'])->name('uploard.process.images');
   // Route::resource('/dashboard/image/uploard', [ImageFooterController::class, 'index'])->name('ProcessImages');


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

require __DIR__.'/auth.php';
