<?php

use App\Http\Controllers\Aantalvragen;
use App\Http\Controllers\Aantalvragenconroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FeedbackvragenController;
use App\Http\Controllers\AgendaController;
use App\Models\Meerkeuzevragen;
use App\Models\Nieuws;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NieuwsController;
use App\Http\Controllers\Meerkeuzevragencontroller;
use App\Http\Controllers\AantalvragenController;
use App\Http\Controllers\CouponController;

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

Route::get('/', [FeedbackVragenController::class, 'showAlles'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/* ------------- Nieuws Route ------------- */




// Deze Routes zijn bereikbaar als je ingelogd bent
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/nieuws/archief', [NieuwsController::class, 'Index'])->name('nieuws.archief');
    Route::get('/nieuws/filter', [NieuwsController::class, 'filter'])->name('nieuws.filter');
    Route::get('/nieuws/filterkalender', [NieuwsController::class, 'filterKalender'])->name('nieuws.filterkalender');
    Route::get('/nieuws/kalender', [NieuwsController::class, 'Kalender'])->name('nieuws.kalender');
    Route::get('/nieuws/recent', [NieuwsController::class, 'entriesLastThreeDays'])->name('nieuws.recent');
    Route::get('/nieuws/agenda', [AgendaController::class, 'index']);
    Route::get('/nieuws/{id}', [AgendaController::class, 'showNieuwsItem']);
});

// Deze routes zijn beschikbaar als je een bedrijf bent
Route::middleware(['auth', 'role:bedrijf'])->group(function () {
    Route::get('/create', [NieuwsController::class, 'Create'])->name('nieuws.create');
    Route::post('/newnieuws', [NieuwsController::class, 'store']);
    Route::delete('/nieuws/{nieuws}', [NieuwsController::class, 'destroy'])->name('nieuws.destroy');
    Route::get('/nieuws/{nieuws}/NieuwsEdit', [NieuwsController::class, 'edit'])->name('nieuws.NieuwsEdit');
    Route::put('/nieuws/{nieuws}', [NieuwsController::class, 'update'])->name('nieuws.update');
    Route::get('/meerkeuzevragen', [Meerkeuzevragencontroller::class, 'show'])->name('meerkeuzevragen.show');
    Route::get('/createcoupons', [CouponController::class, 'form'])->name('coupons.form');
    Route::post('/createcoupons', [CouponController::class, 'send'])->name('coupons.send');
    Route::get('/createfeedback', [FeedbackvragenController::class, 'form'])->name('feedback.form');
    Route::post('/createfeedback', [FeedbackvragenController::class, 'send'])->name('feedback.send');
    Route::get('/overzicht-beantwoorde-vragen', [AantalvragenController::class, 'overzichtBeantwoordeVragen'])->name('aantalvragen');
    Route::get('/bewerkcoupon', [CouponController::class, 'Read'])->name('coupon.read');
    Route::delete('/coupons/{id}', [CouponController::class, 'Delete'])->name('coupon.delete');
    Route::put('updatecoupon/{id}', [CouponController::class, 'Update'])->name('coupon.update');
    Route::get('/updatecoupon/{id}', [CouponController::class, 'Edit'])->name('coupon.edit');
});
/* ------------- End Nieuws Route ------------- */


// alle routes voor admin
Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::resource('/', UserController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/feedbackvragen/antwoorden', [FeedbackvragenController::class, 'showAnt'])->name('feedbackantwoorden.showAnt');
    Route::post('/dashboard', [FeedbackvragenController::class, 'verwerkAntwoord'])->name('verwerkantwoord');
    Route::post('/', [Meerkeuzevragencontroller::class, 'verwerkvraag'])->name('verwerk_vraag');
});

/* ------------- Routes alleen voor User ------------- */

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/feedbackvragen', [FeedbackvragenController::class, 'show'])->name('feedbackvragen.show');
    Route::get('/shop', [CouponController::class, 'showShop'])->name('coupons.showShop');
    Route::get('/coupons', [CouponController::class, 'show'])->name('coupons.show');
    Route::post('/coupons', [CouponController::class, 'buy'])->name('coupons.buy');
    Route::get('/meer-vragen', [FeedbackvragenController::class, 'showAlleVragen'])->name('meer-vragen');
    Route::get('/meerkeuzevraag', [Meerkeuzevragencontroller::class, 'showvraag'])->name('meerkeuzevragen.showvraag');
    Route::post('/meerkeuzevraag', [Meerkeuzevragencontroller::class, 'control'])->name('meerkeuzevragen.control');
});

/* ------------- End Routes alleen voor User ------------- */

require __DIR__ . '/auth.php';
