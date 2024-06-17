<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Route::resource('product', ProductController::class)->middleware('auth');
Route::resource('hotel', HotelController::class)->middleware('auth');
Route::resource('transaction', TransactionController::class);
Route::resource('type', TypeController::class)->middleware('auth')->middleware('auth');
Route::resource('customer', CustomerController::class)->middleware('auth');

Route::get('report/availableHotelRooms', [HotelController::class, 'availableHotelRooms'])
    ->name('reportShowHotel');

Route::get('report/hotel/avgPriceByHotelType', [HotelController::class, 'avarageHotelRooms'])
    ->name('reportAvarageHotelRooms');

Route::view('dashboard', 'dashboard')
    ->name('dashboard')->middleware('auth');

Route::view('ajaxExample', 'hotel.ajax')
    ->name('ajaxExample');

Route::post("/hotel/showInfo",[HotelController::class, 'showInfo'])
    ->name("hotels.showInfo");

Route::post('/hotel/showProducts',[HotelController::class,'showProducts'])
    ->name('hotel.showProducts');

Route::post('transaction/showDataAjax/', [TransactionController::class, 'showAjax'])
    ->name('transaction.showAjax');

Route::post('customtype/getEditForm',[TypeController::class,'getEditForm'])
    ->name('type.getEditForm');
Route::post('customcustomer/getEditForm',[CustomerController::class,'getEditForm'])
    ->name('customer.getEditForm');
Route::post('customproduct/getEditForm',[ProductController::class,'getEditForm'])
    ->name('product.getEditForm');
Route::post('customtransaction/getEditForm',[TransactionController::class,'getEditForm'])
    ->name('transaction.getEditForm');

Route::post('customtype/getEditFormB',[TypeController::class,'getEditFormB'])
    ->name('type.getEditFormB');

Route::post('customtype/saveDataTD',[TypeController::class,'saveDataTD'])
    ->name('type.saveDataTD');

Route::post('customtype/deleteData',[TypeController::class,'deleteData'])
    ->name('type.deleteData');
Route::post('customcustomer/deleteData',[CustomerController::class,'deleteData'])
    ->name('customer.deleteData');
Route::post('customproduct/deleteData',[ProductController::class,'deleteData'])
    ->name('product.deleteData');
Route::post('customtransaction/deleteData',[TransactionController::class,'deleteData'])
    ->name('transaction.deleteData');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('hotel/uploadLogo/{hotel_id}', [HotelController::class, 'uploadLogo']);
Route::get('hotel/uploadPhoto/{hotel_id}', [HotelController::class, 'uploadPhoto']);
Route::get('product/uploadPhoto/{product_id}', [ProductController::class, 'uploadPhoto']);

Route::post('hotel/simpanLogo', [HotelController::class, 'simpanLogo']);
Route::post('hotel/simpanPhoto', [HotelController::class, 'simpanPhoto']);
Route::post('product/simpanPhoto', [ProductController::class, 'simpanPhoto']);

Route::post('product/delPhoto', [ProductController::class, 'delPhoto']);
