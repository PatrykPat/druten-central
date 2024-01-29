<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FeedbackvragenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NieuwsController;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* ------------- Nieuws Route ------------- */

// Deze Routes zijn bereikbaar als je ingelogd bent
Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/nieuws',[NieuwsController::class, 'Index'])
    ->name('nieuws');});
    Route::get('/nieuws/filter', [NieuwsController::class, 'filter'])->name('nieuws.filter');

// Deze routes zijn beschikbaar als je een bedrijf bent
Route::middleware(['auth', 'role:bedrijf'])->group(function () {
Route::get('/nieuws/create',[NieuwsController::class, 'Create']);
Route::post('/newnieuws', [NieuwsController::class, 'store']);
Route::delete('/nieuws/{nieuws}', [NieuwsController::class, 'destroy'])->name('nieuws.destroy');
Route::get('/nieuws/{nieuws}/NieuwsEdit', [NieuwsController::class, 'edit'])->name('nieuws.NieuwsEdit');
Route::put('/nieuws/{nieuws}', [NieuwsController::class, 'update'])->name('nieuws.update');});

/* ------------- End Nieuws Route ------------- */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function(){
 Route::get('/', [IndexController::class,'index'])->name('index');
 Route::resource('/roles', RoleController::class);
 Route::resource('/permissions', PermissionController::class);
 Route::resource('/users', UserController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/feedbackvragen', [FeedbackvragenController::class, 'show']);
    Route::get('/feedbackvragen/antwoorden', [FeedbackvragenController::class, 'showAnt']);
    Route::post('/dashboard', [FeedbackvragenController::class, 'verwerkAntwoord'])->name('verwerkantwoord');
});

require __DIR__ . '/auth.php';
