<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('home');
});

Route::get('/download', function (){
    return view('download');
})->name('download');
Route::controller(ImageController::class)->group(function(){
    Route::get('/', 'index')->name('image.form');
    Route::post('storage/image', 'storeImage')->name('image.store')->middleware('auth');;
   /* Route::delete('/delete/{id}','delete')->name('id.delete');*/
    Route::delete('/delete/{image}','delete')->name('image.delete')->middleware('auth');;
});
Route::group( [ 'middleware' => 'admin', 'prefix' => 'admin' ], function () {

});



Auth::routes();

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
