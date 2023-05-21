<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/main', function () {
        return view('admin.index');
    });

    Route::get('/users', [ProfileController::class, 'index'])->name('users_list.index');
    Route::post('/store', [ProfileController::class, 'store'])->name('users_list.store');
    Route::get('/users_update/{id}', [ProfileController::class, 'edit'])->name('users_update');
    Route::put('/update/{user}', [ProfileController::class, 'update'])->name('users_list.update');
    Route::get('/destroy/{id}', [ProfileController::class, 'destroy'])->name('users_destroy');

});

require __DIR__.'/auth.php';
