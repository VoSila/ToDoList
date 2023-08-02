<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NotesController;
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


Route::group(['prefix' => 'note', 'middleware' => 'auth'], static function () {
    Route::post('/store', [
        NotesController::class, 'store'
    ])->name('note.store');

    Route::get('/complete', [
        NotesController::class, 'markAsCompleted'
    ])->name('note.complete');

    Route::get('/not-complete', [
        NotesController::class, 'markAsNotCompleted'
    ])->name('not.complete.notes');

    Route::get('/search-button', [
        NotesController::class, 'searchButton'
    ])->name('search.button');

    Route::post('/edit-note', [
        NotesController::class, 'edit'
    ])->name('edit');

    Route::get('/edit', [
        NotesController::class, 'updateNote'
    ])->name('note.edit');

    Route::get('/delete', [
        NotesController::class, 'delete'
    ])->name('note.delete');

    Route::get('/completed', [
        NotesController::class, 'getCompleted'
    ])->name('completed.notes');

    Route::get('/not-completed', [
        NotesController::class, 'getNotCompleted'
    ])->name('not.completed.notes');

    Route::get('/search', [
        NotesController::class, 'search'
    ])->name('note.search');

    Route::get('/add', static function () {
        return view('add');
    });
});

Route::get('/lang/{locale}', [
    LanguageController::class, 'changeLanguage'
])->name('lang.change');


require __DIR__ . '/auth.php';
