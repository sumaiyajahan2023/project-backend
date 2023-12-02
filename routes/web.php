<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\workerController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\service_detailsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\orderController;
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

Route::get('/',[workerController::class,'index'])->name('worker.index');
Route::get('/worker/create',[workerController::class,'create'])->name('worker.create');
Route::post('/worker/store',[workerController::class,'store'])->name('worker.store');
Route::get('worker/{id}/edit',[workerController::class,'edit'])->name('worker.edit');
Route::put('worker/{id}/update',[workerController::class,'update'])->name('worker.update');
Route::get('worker/{id}/delete',[workerController::class,'destroy']);
Route::get('worker/{id}/view',[workerController::class,'view']);

Route::get('/service/index',[serviceController::class,'index'])->name('service.index');
Route::get('/service/create',[serviceController::class,'create'])->name('service.create');
Route::post('/service/store',[serviceController::class,'store'])->name('service.store');
Route::get('/{id}/edit',[serviceController::class,'edit'])->name('service.edit');
Route::put('/{id}/update',[serviceController::class,'update'])->name('service.update');
Route::get('/{id}/delete',[serviceController::class,'destroy']);

Route::get('/service_details/index',[service_detailsController::class,'index'])->name('service_details.index');
Route::get('/service_details/create',[service_detailsController::class,'create'])->name('service_details.create');
Route::post('/service_details/store',[service_detailsController::class,'store'])->name('service_details.store');
Route::get('/service_details/{id}/edit',[service_detailsController::class,'edit'])->name('service_details.edit');
Route::put('/service_details/{id}/update',[service_detailsController::class,'update'])->name('service_details.update');
Route::get('/service_details/{id}/delete',[service_detailsController::class,'destroy']);

Route::get('/category/index',[categoryController::class,'index'])->name('category.index');
Route::get('/category/create',[categoryController::class,'create'])->name('category.create');
Route::post('/category/store',[categoryController::class,'store'])->name('category.store');
Route::get('/category/{category_id}/edit',[categoryController::class,'edit'])->name('category.edit');
Route::put('/category/{category_id}/update',[categoryController::class,'update'])->name('category.update');
Route::get('/category/{category_id}/delete',[categoryController::class,'destroy'])->name('category.delete');

Route::get('/customer/index',[customerController::class,'index'])->name('customer.index');
Route::get('/customer/create',[customerController::class,'create'])->name('customer.create');
Route::post('/customer/store',[customerController::class,'store'])->name('customer.store');
Route::get('customer/{id}/view',[customerController::class,'view'])->name('customer.view');

Route::get('/order/index',[orderController::class,'index'])->name('order.index');
Route::get('/order/create',[orderController::class,'create'])->name('order.create');
Route::post('/order/store',[orderController::class,'store'])->name('order.store');
Route::get('order/{id}/edit',[orderController::class,'edit'])->name('order.edit');
Route::put('order/{id}/update',[orderController::class,'update'])->name('order.update');
Route::get('order/{id}/delete',[orderController::class,'destroy']);
Route::get('order/{id}/view',[orderControllerr::class,'view'])->name('order.view');


Route::group(['middleware' => 'guest'], function () {
Route::get('/user_register', [UserController::class, 'register'])->name('user.register');
Route::post('/user_register', [UserController::class, 'registerPost'])->name('register.create');
Route::get('/user_login', [UserController::class, 'login'])->name('user.login');
Route::post('/user_login', [UserController::class, 'loginPost'])->name('login.create');
});

Route::middleware('auth')->group(function (){
Route::get('/home', [HomeController::class, 'index'])->name('user.home');
Route::get('/customer/home', [HomeController::class, 'index'])->name('customer.home');
Route::delete('/user_logout', [UserController::class, 'logout'])->name('user.logout');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
