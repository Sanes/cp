<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::get('/leave-impersonate', [UserController::class, 'leaveImpersonate'])->name('leave-impersonate');
Route::prefix('admin')->name('admin.')->middleware(['role:admin'])->group(function () {
	Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
		Route::get('/', 'index')->name('index');
		Route::get('/{user}/impersonate', 'impersonate')->name('impersonate');
		Route::post('store', 'store')->name('store');
		Route::get('create', 'create')->name('create');
		Route::get('{user}', 'show')->name('show');
		Route::get('{user}/edit', 'edit')->name('edit');
		Route::put('{user}/update', 'update')->name('update');
		Route::delete('{user}', 'destroy')->name('destroy');
	});
});