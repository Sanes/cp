<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\TicketController as CustomerTicketController;

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
})->name('welcome');

Route::prefix('cp')->name('customer.')->middleware(['role:customer'])->group(function () {
    Route::controller(CustomerTicketController::class)->prefix('tickets')->name('tickets.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::get('create', 'create')->name('create');
        Route::get('{ticket}', 'show')->name('show');
        Route::get('{ticket}/edit', 'edit')->name('edit')->middleware('update_timeout');
        Route::put('{ticket}/update', 'update')->name('update');
        Route::delete('{ticket}', 'destroy')->name('destroy');
    });
});
