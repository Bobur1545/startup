<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddCompetitionController;
use App\Http\Controllers\AddNewsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MyDocumentsController;
use App\Http\Controllers\ShareDocumentsController;
use App\Http\Controllers\ControlDocumentsController;
use App\Http\Controllers\EvaluationController;
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


Route::middleware('auth')->group(function () {

    Route::get('/users', [ProfileController::class, 'index'])->name('users_list.index');
    Route::get('/referees', [ProfileController::class, 'index_referees'])->name('referees.index_referees');
    Route::post('/store', [ProfileController::class, 'store'])->name('users_list.store');
    Route::get('/users_update/{id}', [ProfileController::class, 'edit'])->name('users_update');
    Route::put('/update/{user}', [ProfileController::class, 'update'])->name('users_list.update');
    Route::get('/destroy/{id}', [ProfileController::class, 'destroy'])->name('users_destroy');

    Route::resource('/add_competition', AddCompetitionController::class);
    Route::resource('/add_news', AddNewsController::class);
    Route::get('/main', [AddNewsController::class, 'index_news'])->name('admin.index');
    Route::get('show_news/{id}', [AddNewsController::class, 'show_news'])->name('admin.show_news');
    Route::resource('/mydocuments', MyDocumentsController::class);
    Route::get('/mydocument_control/{id}', [MyDocumentsController::class, 'user_index'])->name('admin.mydocument_control');
    Route::get('/download/{id}', [MyDocumentsController::class, 'download'])->name('user_download.file');
    Route::resource('/share_documents', ShareDocumentsController::class);
    Route::get('/control_documents', [ControlDocumentsController::class, 'index'])->name('control_documents.index');
    Route::get('show_user_documents/{id}', [ControlDocumentsController::class, 'show_user_documents'])->name('control_documents.show_user_documents');
    Route::get('/control_grades', [ControlDocumentsController::class, 'index_grades'])->name('control_documents.index_grades');
    Route::resource('/evaluation', EvaluationController::class);

});

require __DIR__.'/auth.php';
