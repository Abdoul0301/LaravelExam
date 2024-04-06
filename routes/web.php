<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmployerController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'handleLogin'])->name('handleLogin');
Route::delete('/logout',[\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/validate-account/{email}', [AdminController::class, 'defineAccess']);
Route::post('/validate-account/{email}', [AdminController::class, 'submitDefineAccess'])->name('submitDefineAccess');




Route::middleware('auth')->group(function () {

    Route::get('dashboard', [AppController::class, 'index'])->name('dashboard');

    Route::get('/attespdf',[AppController::class,'downloadPdf1'])->name("attespdf");
    Route::get('/contratpdf',[AppController::class,'downloadPdf2'])->name("contratpdf");


    Route::prefix('departements')->group(function () {
        Route::get('/', [DepartementController::class, 'index'])->name('departement.index');
        Route::get('/create', [DepartementController::class, 'create'])->name('departement.create');
        Route::post('/create', [DepartementController::class, 'store'])->name('departement.store');
        Route::get('/edit/{departement}', [DepartementController::class, 'edit'])->name('departement.edit');
        Route::put('/update/{departement}', [DepartementController::class, 'update'])->name('departement.update');
        Route::get('/{departement}', [DepartementController::class, 'delete'])->name('departement.delete');
    });


    Route::prefix('absences')->group(function () {
        Route::get('/', [\App\Http\Controllers\AbsenceController::class, 'index'])->name('absence.index');
        Route::get('/create', [AbsenceController::class, 'create'])->name('absence.create');
        Route::post('/create', [AbsenceController::class, 'store'])->name('absence.store');
        Route::get('/edit/{absence}', [AbsenceController::class, 'edit'])->name('absence.edit');
        Route::put('/update/{absence}', [AbsenceController::class, 'update'])->name('absence.update');
        Route::get('/{absence}', [AbsenceController::class, 'delete'])->name('absence.delete');

        Route::post('/{absence}/accept', [AbsenceController::class, 'accept'])->name('absences.accept');
        Route::post('/{absence}/refuse', [AbsenceController::class, 'refuse'])->name('absences.refuse');

    });


    Route::prefix('contrats')->group(function () {
        Route::get('/', [\App\Http\Controllers\ContratController::class, 'index'])->name('contrat.index');
        Route::get('/create', [\App\Http\Controllers\ContratController::class, 'create'])->name('contrat.create');
        Route::post('/create', [\App\Http\Controllers\ContratController::class, 'store'])->name('contrat.store');
        Route::get('/edit/{contrat}', [\App\Http\Controllers\ContratController::class, 'edit'])->name('contrat.edit');
        Route::put('/update/{contrat}', [\App\Http\Controllers\ContratController::class, 'update'])->name('contrat.update');
        Route::get('/{contrat}', [\App\Http\Controllers\ContratController::class, 'delete'])->name('contrat.delete');
    });


    Route::prefix('employers')->group(function () {
        Route::get('/', [EmployerController::class, 'index'])->name('employer.index');
        Route::get('/create', [EmployerController::class, 'create'])->name('employer.create');
        Route::get('/edit/{employer}', [EmployerController::class, 'edit'])->name('employer.edit');
        Route::post('/store', [EmployerController::class, 'store'])->name('employe.store');
        Route::put('/update/{employer}', [EmployerController::class, 'update'])->name('employe.update');
        Route::get('/delete/{employer}', [EmployerController::class, 'delete'])->name('employer.delete');
    });

    Route::prefix('administrateurs')->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('administrateurs');
        Route::get('/edit/{user}', [AdminController::class, 'edit'])->name('administrateurs.edit');
        Route::get('/create', [AdminController::class, 'create'])->name('administrateurs.create');
        Route::put('/update/{user}', [AdminController::class, 'update'])->name('administrateurs.update');
        Route::post('/create', [AdminController::class, 'store'])->name('administrateurs.store');
        Route::get('/delete/{user}', [AdminController::class, 'delete'])->name('administrateurs.delete');

        Route::get('/search',[AdminController::class,'search'])->name("search");

    });



});
