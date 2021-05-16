<?php

use App\Http\Controllers\KitchenController;
use App\Http\Controllers\KitchenItemController;
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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', function () {
        return redirect()->route('kitchen.index');
    })->name('dashboard');
    Route::get('/kitchen', [KitchenController::class, 'index'])->name('kitchen.index');
    Route::get('/kitchen/{id}/items/new', [KitchenItemController::class, 'create'])->name('kitchen.items.new');
});

require __DIR__.'/auth.php';
