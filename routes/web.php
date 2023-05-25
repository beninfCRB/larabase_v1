<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\McriteriaController;
use App\Http\Controllers\MsubcriteriaController;
use App\Http\Controllers\MtypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes(['verify' => true]);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/activation', function () {
    return view('auth.isActive');
});

Route::middleware(['auth', 'verified', 'isActive'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

    Route::middleware('Role:admin')->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('types', MtypeController::class);
        Route::resource('criterias', McriteriaController::class);
        Route::resource('subcriterias', MsubcriteriaController::class);
        Route::get('import/subcriterias', [MsubcriteriaController::class, 'show_import']);
        Route::post('import/subcriterias/create', [MsubcriteriaController::class, 'import']);
        Route::get('import/criterias', [McriteriaController::class, 'show_import']);
        Route::post('import/criterias/create', [McriteriaController::class, 'import']);
        Route::get('import/types', [MtypeController::class, 'show_import']);
        Route::post('import/types/create', [MtypeController::class, 'import']);
    });
});
