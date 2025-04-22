<?php

use App\Http\Controllers\BookingdetailController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SeatController;
use App\Models\review;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //Route for our posts
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');


    //Route for our category
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');


    
    //Route for our seats
    Route::get('/seats', [SeatController::class, 'index'])->name('seats.index');
    Route::post('/seats', [SeatController::class, 'store'])->name('seats.store');
    Route::get('/seats/create', [SeatController::class, 'create'])->name('seats.create');
    Route::get('/seats/{id}', [SeatController::class, 'show'])->name('seats.show');
    Route::get('/seats/{id}/edit', [SeatController::class, 'edit'])->name('seats.edit');
    Route::put('/seats/{id}', [SeatController::class, 'update'])->name('seats.update');
    Route::delete('/seats/{id}', [SeatController::class, 'destroy'])->name('seats.destroy');

     //Route for our bus
    Route::get('/bus', [BusController::class, 'index'])->name('bus.index');
    Route::post('/bus', [BusController::class, 'store'])->name('bus.store');
    Route::get('/bus/create', [BusController::class, 'create'])->name('bus.create');
    Route::get('/bus/{id}', [BusController::class, 'show'])->name('bus.show');
    Route::get('/bus/{id}/edit', [BusController::class, 'edit'])->name('bus.edit');
    Route::put('/bus/{id}', [BusController::class, 'update'])->name('bus.update');
    Route::delete('/bus/{id}', [BusController::class, 'destroy'])->name('bus.destroy');

      //Route for our driver
    Route::get('/driver', [DriverController::class, 'index'])->name('driver.index');
    Route::post('/driver', [DriverController::class, 'store'])->name('driver.store');
    Route::get('/driver/create', [DriverController::class, 'create'])->name('driver.create');
    Route::get('/driver/{id}', [DriverController::class, 'show'])->name('driver.show');
    Route::get('/driver/{id}/edit', [DriverController::class, 'edit'])->name('driver.edit');
    Route::put('/driver/{id}', [DriverController::class, 'update'])->name('driver.update');
    Route::delete('/driver/{id}', [DriverController::class, 'destroy'])->name('driver.destroy');


    //Route for our route
    Route::get('/route', [RouteController::class, 'index'])->name('route.index');
    Route::post('/route', [RouteController::class, 'store'])->name('route.store');
    Route::get('/route/create', [RouteController::class, 'create'])->name('route.create');
    Route::get('/route/{id}', [RouteController::class, 'show'])->name('route.show');
    Route::get('/route/{id}/edit', [RouteController::class, 'edit'])->name('route.edit');
    Route::put('/route/{id}', [RouteController::class, 'update'])->name('route.update');
    Route::delete('/route/{id}', [RouteController::class, 'destroy'])->name('route.destroy');


    //route for our review
    Route::get('/review', [ReviewsController::class, 'index'])->name('review.index');
    Route::post('/review', [ReviewsController::class, 'store'])->name('review.store');
    Route::get('/review/create', [ReviewsController::class, 'create'])->name('review.create');
    Route::post('/review/{id}', [ReviewsController::class, 'show'])->name('review.show');
    Route::post('/review/{id}/edit', [ReviewsController::class, 'edit'])->name('review.edit');

    //route for our price
    Route::get('/price', [PriceController::class, 'index'])->name('price.index');
    Route::post('/price', [PriceController::class, 'store'])->name('price.store');
    Route::get('/price/create', [PriceController::class, 'create'])->name('price.create');
    Route::get('/price/{id}', [PriceController::class, 'show'])->name('price.show');
    Route::get('price/{id}/edit', [PriceController::class, 'edit'])->name('price.edit');
    Route::put('/price/{id}', [PriceController::class, 'update'])->name('price.update');
    Route::delete('/price/{id}', [PriceController::class, 'destroy'])->name('price.destroy');

    //route for our booking details
    Route::get('/bookingdetails', [BookingdetailController::class, 'index'])->name('bookingdetails.index');
    Route::post('/bookinfdetails', [BookingdetailController::class, 'store'])->name('bookingdetails.store');
    Route::get('/bookingdetails/create', [BookingdetailController::class, 'create'])->name('bookingdetails.create');
    Route::get('/bookingdetails/{id}', [BookingdetailController::class, 'show'])->name('bookingdetails.show');
    Route::get('/bookingdetails/{id}/edit', [BookingdetailController::class, 'edit'])->name('bookingdetails.edit');
    Route::put('/bookingdetails/{id}', [BookingdetailController::class, 'update'])->name('bookingdetails.update');
    Route::delete('/bookingdetails/{id}', [BookingdetailController::class, 'destroy'])->name('bookingdetails.destroy');

    Route::post('/logout', function () {
        auth()->logout();
        return redirect('/'); // Redirect to homepage or login page
    })->name('logout');
});

require __DIR__.'/auth.php';
