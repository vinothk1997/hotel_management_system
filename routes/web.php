<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\UserController;
use App\http\Controllers\CustomerController;
use App\http\Controllers\BookingController;
use App\http\Controllers\RoomTypeController;
use App\http\Controllers\RoomController;
use App\http\Controllers\PriceController;
use App\http\Controllers\StaffController;
use App\http\Controllers\AjaxController;
use App\http\Controllers\ReportController;
use App\http\Controllers\DashboardController;
use App\http\Controllers\PaymentController;

use Carbon\Carbon;

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

Route::get("/calculatenic/{nic}",[AjaxController::class,'calculateNic']);
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
    Route::get('/',[CustomerController::class,'index'])->name('customer.index');
    Route::get('/create',[CustomerController::class,'create'])->name('customer.create');
    Route::post('/store',[CustomerController::class,'store'])->name('customer.store');
    Route::get('/show',[CustomerController::class,'show'])->name('customer.show');
    Route::get('/edit',[CustomerController::class,'edit'])->name('customer.edit');
    Route::put('/update',[CustomerController::class,'update'])->name('customer.update');

});

// bookings
Route::group(['prefix'=>'bookings'],function(){
    Route::get('/',[BookingController::class,'index'])->name('booking.index');
    Route::get('/create',[BookingController::class,'create'])->name('bookings.create');
    Route::post('/store',[BookingController::class,'store'])->name('bookings.store');
    Route::get('/getRooms',[BookingController::class,'getRooms'])->name('room.getRooms');
    Route::get('/edit',[BookingController::class,'edit'])->name('booking.edit');
    Route::get('/get',[BookingController::class,'checkOut'])->name('booking.checkout');
    Route::get('/editGetRooms',[BookingController::class,'editGetRooms'])->name('booking.editGetRooms');
    Route::get('/cancel',[BookingController::class,'cancelBooking'])->name('booking.cancel');
    Route::get('/payment',[BookingController::class,'payment'])->name('booking.payment');
    Route::get('/pay',[BookingController::class,'pay']);
    Route::get('/cutomer-booking',[BookingController::class,'customerBooking'])->name('booking.customer-booking');


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
    Route::get('/maintanaceMode',[RoomController::class,'maintanaceMode'])->name('room.maintanaceMode');
});

Route::group(['prefix'=>'price'],function(){
    Route::get('/',[PriceController::class,'index'])->name('price.index');
    Route::get('/create',[PriceController::class,'create'])->name('price.create');
    Route::post('/store',[PriceController::class,'store'])->name('price.store');
    Route::get('/edit',[PriceController::class,'edit'])->name('price.edit');
    Route::put('/update',[PriceController::class,'update'])->name('price.update');
    Route::delete('/delete',[PriceController::class,'delete'])->name('price.delete');
    Route::get('/getRooms',[PriceController::class,'getRooms'])->name('price.getRooms');
});

Route::group(['prefix'=>'staffs'],function(){
    Route::get('/',[StaffController::class,'index'])->name('staff.index');
    Route::get('/create',[StaffController::class,'create'])->name('staff.create');
    Route::post('/store',[StaffController::class,'store'])->name('staff.store');
    Route::get('/edit',[StaffController::class,'edit'])->name('staff.edit');
    Route::put('/update',[StaffController::class,'update'])->name('staff.update');
    Route::delete('/delete',[StaffController::class,'delete'])->name('staff.delete');
});

Route::group(['prefix'=>'report'],function(){
    Route::get('/createGenderBasedReport',[ReportController::class,'createGenderBasedReport'])->name('report.createGenderBasedReport');
    Route::get('/generateGenderBasedReport',[ReportController::class,'generateGenderBasedReport'])->name('report.generateGenderBasedReport');
    Route::get('/createBookingDateReport',[ReportController::class,'createBookingDateReport'])->name('report.createBookingDateReport');
    Route::get('/generateBookingDateReport',[ReportController::class,'generateBookingDateReport'])->name('report.generateBookingDateReport');
    Route::get('/createBookingStatusReport',[ReportController::class,'createBookingStatusReport'])->name('report.createBookingStatusReport');
    Route::get('/generateBookingStatusReport',[ReportController::class,'generateBookingStatusReport'])->name('report.generateBookingStatusReport');
    Route::delete('/delete',[ReportController::class,'delete'])->name('report.delete');
});

Route::group(['prefix' =>'dashboard'],function(){
    Route::get('/',[DashboardController::class,'index'])->name('dashboard.index');
    Route::get('/genderBasedGraph',[DashboardController::class,'genderBasedGraph'])->name('dashboard.genderBasedGraph');
    Route::get('/DOBBasedGraph',[DashboardController::class,'DOBBasedGraph'])->name('dashboard.DOBBasedGraph');
    Route::get('/generateMonthlyGraph',[DashboardController::class,'generateMonthlyGraph'])->name('dashboard.generateMonthlyGraph');
    Route::get('/generateRevenueGraph',[DashboardController::class,'generateRevenueGraph'])->name('dashboard.generateRevenueGraph');

});

Route::group(['prefix'=>'payments'],function(){
    Route::get('/create',[PaymentController::class,'create'])->name('payment.create');
    Route::post('/store',[PaymentController::class,'store'])->name('payment.store');

});