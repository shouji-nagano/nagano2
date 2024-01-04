<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\PricesController;



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

// Route::post('excel/import', 'ExcelController@import');
// Route::get('users',[UsersController::class,'export']);
// Route::resource('/users','UsersController');
Route::resource('/users', UsersController::class);
Route::resource('/prices', PricesController::class);


// Route::group(['prefix' => 'admin', 'as' => 'admin::'], function() {
//     Route::get('prices', [PricesController::class, 'index'])->name('prices');
//     Route::post('prices/upload', [PricesController::class, 'upload'])->name('prices.upload');
//     Route::get('prices/download', [PricesController::class, 'download'])->name('prices.download');
// });

// Route::group(['prefix' => 'admin', 'as' => 'admin::'], function() {
//     Route::post('prices/upload', [PricesController::class, 'upload'])->name('prices.upload');
//     // 他のルート定義
// });