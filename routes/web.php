<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*Route::get('admin', function (){
    if(auth()->user()->is_admin){
        dd('admin1');        
    }else{
        abort(401);
    }
}); */

Route::group(['middleware'=>['auth','admin']], function (){
    Route::get('admin', [\App\Http\Controllers\AuthController::class, 'index']); //In this line check user
});

// Route::get('admin', [\App\Http\Controllers\AuthController::class, 'index']); //In this line check user in controller though __cuntruct function

require __DIR__.'/auth.php';
