<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\category;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Models\product;
use App\Http\Controllers\FatoorahController;

Route::get('/',[CustomerController::class,'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/admin/AddNewProduct',[AdminController::class,'AddNewProduct'])->middleware(['auth', 'verified'])->name('AddNewProduct');
    Route::post('/admin/AddNewProduct',[AdminController::class,'storeProduct'])->middleware(['auth', 'verified'])->name('AddNewProduct');
    Route::get('/admin/AddNewCategory',[AdminController::class,'AddNewCategory'])->middleware(['auth', 'verified'])->name('AddNewCategory');
    Route::post('/admin/AddNewCategory',[AdminController::class,'storeCategory'])->middleware(['auth', 'verified'])->name('storeCategory');
    Route::get('/admin/editeProduct/{id}',[AdminController::class,'EditeProduct'])->middleware(['auth', 'verified'])->name('EditeProduct');
    Route::post('/admin/EditeProduct',[AdminController::class,'updateProduct'])->middleware(['auth', 'verified'])->name('editeProduct');
    route::get ('Show/products',[AdminController::class,'showProducts'])->name('showProducts');
    route::get ('Show/ShowCategories',[AdminController::class,'ShowCategories'])->name('ShowCategories');
    Route::get('DeleteProduct/{id}', [AdminController::class,'DeleteProduct'])->name('DeleteProduct');
    Route::get('DeleteCategory/{id}', [AdminController::class,'DeleteCategory'])->name('DeleteCategory');
    Route::get('/admin/EditeCategory/{id}',[AdminController::class,'EditeCategory'])->middleware(['auth', 'verified'])->name('EditeCategory');
    Route::post('/admin/EditeProduct',[AdminController::class,'updateCategory'])->middleware(['auth', 'verified'])->name('updateCategory');
    Route::get('AddAdmin', [AdminController::class,'AddNewAdmin'])->name('AddAdmin');
    Route::post('AddAdmin', [AdminController::class,'AddAdmin'])->name('AddAdmin');
    route::get ('/Add/to/cart/{id}',[CustomerController::class,'confirm'])->name('AddToCart');
    route::get ('/show/my/cart',[CustomerController::class,'ShowMycard'])->name('ShowMycard');
    route::post ('/Add/to/cart',[CustomerController::class,'AddToCart'])->name('AddCart');
    Route::get('DeleteProduct/fromCard/{id}', [CustomerController::class,'DeleteFromCard'])->name('DeleteFromCard');
    route::get ('Products/WithCategory/{id}',[CustomerController::class,'ProductsWithCategory'])->name('ProductsWithCategory');
    route::get ('/show/Orders/cart',[AdminController::class,'Showcards'])->name('Showcards');
    route::get ('Products/WithCategory/{id}',[AdminController::class,'ProductsWithCategory'])->name('ProductsWithCategory');
    route::get ('update/OrderStatus/{id}',[AdminController::class,'updateOrderStatus'])->name('updateOrderStatus');
      route::get('/product/details/{id}',[CustomerController::class,'seeDetails'])->name('seeDetails');
  route::get ('payment/{id}',[FatoorahController::class,'confirm'])->name('confirm');
    route::post('payment/',[FatoorahController::class,'checkout'])->name('checkout');
});
route::get('CalLBackUrl',function(){
    session()->flash('Success', 'Payment has been paid, you will receive the product within one day');
    return  redirect(route('home'));
});
route::get('Errorurl',function(){
    session()->flash('Success', 'Payment Failed');
    return  redirect(route('home'));

});
