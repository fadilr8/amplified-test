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
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/participants', [DashboardController::class, 'participants'])->middleware(['auth'])->name('participants');

Route::group(['middleware' => ['role:superadministrator']], function () {
    Route::group(['prefix' => 'role'], function () {
        Route::get('/', [DashboardController::class, 'roleIndex'])->name('role.index');
        Route::post('/', [DashboardController::class, 'roleCreate'])->name('role.create');
        Route::get('/assign', [DashboardController::class, 'roleAssignIndex'])->name('role.assign.index');
        Route::post('/assign/{id}', [DashboardController::class, 'roleAssign'])->name('role.assign.assign');
        Route::get('/checker', [DashboardController::class, 'roleChecker'])->name('role.checker');
    });
    Route::prefix('permission')->group(function () {
        Route::post('/', [DashboardController::class, 'permissionAssign'])->name('permission.assign');
    });
});

Route::middleware(['permission:users-create|users-read|users-update|users-delete'])->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/', [DashboardController::class, 'users'])->middleware(['auth'])->name('users');
        Route::middleware(['permission:users-create'])->group(function () {
            Route::post('/', [DashboardController::class, 'createUser'])->middleware(['auth'])->name('user.create');
        });
    });
});

require __DIR__.'/auth.php';


Route::get('/questions', [QuestionController::class, 'questions']);
Route::get('/result', [ResultController::class, 'result']);
Route::get('/result/download', [ResultController::class, 'download'])->name('result.download');


Route::get('/send-result', [ResultController::class, 'sendMail']);

Route::get('/test', function() {
    return view('welcome');
});
