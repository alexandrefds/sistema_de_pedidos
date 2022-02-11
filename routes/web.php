<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    if (Auth::check() === true) {
        return view('home');
    }
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('home/update/{id}', [App\Http\Controllers\OrderController::class, 'updateOrders'])->name('home.update');
Route::get('/request_closed', [App\Http\Controllers\MenuController::class, 'goToRequestClosed'])->name('request_closed');
Route::get('/create_menu', [App\Http\Controllers\MenuController::class, 'goToCreateMenu'])->name('menu_creater');
Route::get('/edit_menu', [App\Http\Controllers\MenuController::class, 'goToEditMenu'])->name('menu_edit');
Route::get('/delete_menu', [App\Http\Controllers\MenuController::class, 'goToDeleteMenu'])->name('menu_delete');
Route::post('/create_menu/save_item', [App\Http\Controllers\MenuController::class, 'saveItem'])->name('menu_creater.save_item');
Route::post('/edit_menu/update_item/{id}', [App\Http\Controllers\MenuController::class, 'updateItem'])->name('edit_menu.update_item');
Route::post('/delete_menu/delete_item/{id}', [App\Http\Controllers\MenuController::class, 'deleteItem'])->name('delete_menu.delete_item');

Route::get('/request', [App\Http\Controllers\OrderController::class, 'goToRequest'])->name('request');
Route::post('/request/save', [App\Http\Controllers\OrderController::class, 'saveRequest'])->name('request.add');
Route::get('/request/save/confirmation', [App\Http\Controllers\OrderController::class, 'goToRequestConfirmation'])->name('request.confirmation');
