<?php
use App\Http\Controllers\MainpageController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ActivityController;
Route::resource('mainpages', MainpageController::class);
Route::resource('homepages', HomepageController::class);
Route::resource('homepage/activity', ActivityController::class);
Route::post('/update', [App\Http\Controllers\ActivityController::class, 'update'])->name('update');

// Route::post('homepage/activity/store', 'ActivityController@store')->name('store');
Route::post('homepage/activity/store', [App\Http\Controllers\ActivityController::class, 'store'])->name('store');

/*use Illuminate\Support\Facades\Route;*/ 

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

/*Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::post('activity/update', [App\Http\Controllers\ActivityController::class, 'update'])->name('update);

