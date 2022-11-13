<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\HotelController;
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
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth','admin'])->group(function(){
    Route::post('hotels/filter', [HotelController::class, 'filterHotels'])->name("hotels.filter");
    Route::resources([
        'countries'=> CountryController::class,
        'hotels'=> HotelController::class,
    ]);
    Route::get('countries/{id}/hotels',[HotelController::class,'countryHotels'])->name('countryHotels');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
