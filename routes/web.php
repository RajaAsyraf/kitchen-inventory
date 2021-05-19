<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\KitchenItemController;

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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', function () {
        return redirect()->route('kitchen.index');
    })->name('dashboard');

    Route::get('kitchen', [KitchenController::class, 'index'])->name('kitchen.index');
    
    Route::get('items/{id}', [ItemController::class, 'show'])->name('items.show');
    Route::put('items/{id}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');

    Route::post('kitchen/{id}/items', [KitchenItemController::class, 'store'])->name('kitchen.items.store');
    Route::get('kitchen/{id}/items/create', [KitchenItemController::class, 'create'])->name('kitchen.items.create');
});

require __DIR__.'/auth.php';
