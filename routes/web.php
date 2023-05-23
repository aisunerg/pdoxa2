<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\PensumController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ProjectController;
use App\Models\Area;

// Login de Laravel
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
//  Dashboard de Laravel
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* MIS RUTAS */
Route::get('/myDash', function (){
    return Inertia::render('MyDashboard');
})->name('mydash');



//PROJECTS
Route::get('/myDash/{project:slug}', [ProjectController::class, 'selectProject'])->name('project.select');
Route::resource('project', ProjectController::class)->parameters([
    'project' => 'project:slug',
]);
Route::get('indexProject', [ProjectController::class, 'indexProject'])->name('indexProject');

//PENSUMS
Route::resource('pensum', PensumController::class);
Route::get('indexPensum', [ProjectController::class, 'indexPensum'])->name('indexPensum');

//CAREERS
Route::resource('career', CareerController::class);
Route::get('indexCareer', [CareerController::class, 'indexCareer'])->name('indexCareer');

//AREAS
Route::resource('area', AreaController::class);
Route::get('indexArea', [AreaController::class, 'indexArea'])->name('indexArea');

//USER
Route::get('userIndex', [ProfileController::class, 'indexUser'])->name('indexUser');








require __DIR__.'/auth.php';
