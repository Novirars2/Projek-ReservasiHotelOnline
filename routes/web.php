<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FasilitasHotelController;

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
Route::view('admins','layout/admin');
Route::view('receptionist','layout/resepsionis');
Route::resource('fasilitashotels', FasilitasHotelController::class);