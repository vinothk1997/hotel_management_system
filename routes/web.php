<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\UserController;
use App\http\Controllers\CustomerController;
use App\http\Controllers\BookingController;
use App\http\Controllers\RoomTypeController;

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
    return view('guest.index');
})->name('guest.index');

Route::get('/facilities', function () {
    return view('guest.facilities');
})->name('guest.facilities');

Route::get('/contact', function () {
    return view('guest.contact');
})->name('guest.contact');

Route::get('/rooms-and-suites', function () {
    return view('guest.rooms-and-suites');
})->name('guest.rooms-and-suites');

// Booking
Route::group(['prefix' => 'bookings'],function(){
    Route::get('create',[App\Http\Controllers\BookingController::class,'create'])->name('bookings.create');
});

// authentication
Route::group(['prefix'=>'login'],function(){
    Route::get('/',[UserController::class,'showLogin'])->name('auth.index');
    Route::post('/login',[UserController::class,'login'])->name('auth.login');
    Route::get('/forget',[UserController::class,'forget'])->name('auth.forget');
    Route::post('/recover',[UserController::class,'recover'])->name('auth.recover');
    Route::post('/verify',[UserController::class,'verifyCode'])->name('auth.verifyCode');
    Route::post('/confirm',[UserController::class,'storeConfirmedpassword'])->name('auth.storeConfirmedpassword');
    Route::get('/change-password',[UserController::class,'changePasswordView'])->name('auth.changePasswordView');
    Route::post('/change-password',[UserController::class,'changePassword'])->name('auth.changePassword');
    Route::get('forget_password',[UserController::class,'customForgetPassword'])->name('auth.customForgetPassword');
    Route::get('/logout',[UserController::class,'logout'])->name('auth.logout');
});

// customers
Route::group(['prefix'=>'customers'],function(){
    Route::get('/customers',[CustomerController::class,'index'])->name('customer.index');
    Route::get('/create',[CustomerController::class,'create'])->name('customer.create');
    Route::post('/store',[CustomerController::class,'store'])->name('customer.store');
    Route::get('/show',[CustomerController::class,'show'])->name('customer.show');

});
// bookings
Route::group(['prefix'=>'bookings'],function(){
    Route::get('/',[BookingController::class,'index'])->name('booking.index');
    Route::get('/create',[BookingController::class,'create'])->name('bookings.create');
    Route::post('/store',[BookingController::class,'store'])->name('bookings.store');

});

Route::group(['prefix'=>'room-types'],function(){
    Route::get('/',[RoomTypeController::class,'index'])->name('roomType.index');
    Route::get('/create',[RoomTypeController::class,'create'])->name('roomType.create');
    Route::post('/store',[RoomTypeController::class,'store'])->name('roomType.store');
    Route::get('/edit',[RoomTypeController::class,'edit'])->name('roomType.edit');
    Route::put('/update',[RoomTypeController::class,'update'])->name('roomType.update');
    Route::get('/show',[RoomTypeController::class,'show'])->name('roomType.show');

});

Route::group(['prefix'=>'rooms'],function(){
    Route::get('/',[RoomController::class,'index'])->name('room.index');
    Route::get('/create',[RoomController::class,'create'])->name('room.create');
    Route::post('/store',[RoomController::class,'store'])->name('room.store');
    Route::get('/edit',[RoomController::class,'edit'])->name('room.edit');
    Route::put('/update',[RoomController::class,'update'])->name('room.update');
    Route::get('/show',[RoomController::class,'show'])->name('room.show');

});