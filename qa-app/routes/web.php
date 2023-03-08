<?php

use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

Route::get('/', function (Request $request) {
    return View::make('listing', ['questionList' => QuestionController::list($request)]);
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Question API interaction stuff (logged in)
    Route::controller(QuestionController::class)->group(function () {
        Route::get('questions/{id}', 'get');
        Route::get('ask', 'ask');
        Route::post('ask', 'createQuestion');
        Route::get('/answer/{id}', 'answer')->name('question.answer');
        Route::post('/answer', 'createAnswer');
        // Route::delete('questions/{id}', 'remove');
    });
});

// Question API interaction stuff (not logged in)
Route::get('questions', function (Request $request) {
    return View::make('listing', ['questionList' => QuestionController::list($request)]);
});

require __DIR__ . '/auth.php';

