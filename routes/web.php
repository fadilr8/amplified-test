<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;

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
    return view('home');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/participants', [DashboardController::class, 'participants'])->middleware(['auth'])->name('participants');
Route::get('/roles', [DashboardController::class, 'roles'])->middleware(['auth'])->name('roles');
Route::post('/role/{id}', [DashboardController::class, 'assignRole']);

Route::prefix('users')->group(function () {
    Route::get('/', [DashboardController::class, 'users'])->middleware(['auth'])->name('users');
    Route::post('/', [DashboardController::class, 'createUser'])->middleware(['auth'])->name('user.create');
});

require __DIR__.'/auth.php';

Route::get('/questions', [QuestionController::class, 'questions']);
Route::get('/result', [ResultController::class, 'result']);


Route::get('/send-result', [ResultController::class, 'sendMail']);

Route::get('/test', function() {
    return view('welcome');
});
