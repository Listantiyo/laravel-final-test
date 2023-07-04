<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataCardController;
use App\Http\Controllers\DataTypeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImageControllers;

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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::resource('cardlist',DataCardController::class);

    Route::post('type',[DataCardController::class,'addtype'])->name('typestore');


    Route::get('img',[DataCardController::class,'imageshow'])->name('iistore');


    Route::resource('cardtype',DataTypeController::class);

    Route::post('types',[DataTypeController::class,'addtype'])->name('typeso');




    Route::get('image-upload', [ ImageController::class, 'index' ]);
    Route::post('image-upload', [ ImageController::class, 'store' ])->name('image.store');


    // image
Route::get('image', [ImageControllers::class,'index']);
// simpan image
Route::post('image', [ImageControllers::class,'store']);
// hapus image by id
Route::delete('image/{id}', [ImageControllers::class,'destroy']);
});





