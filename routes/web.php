<?php

use App\Http\Controllers\AdressController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\MunicipyController;
use App\Http\Controllers\PensumController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UtilController;
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
Route::get('borrar',[UtilController::class, 'borrar']);


//PROJECTS
Route::get('/myDash/{project:slug}', [ProjectController::class, 'selectProject'])->name('project.select');
Route::resource('project', ProjectController::class)->parameters([
    'project' => 'project:slug',
]);
Route::get('indexProject', [ProjectController::class, 'indexProject'])->name('indexProject');

//PENSUMS
Route::resource('pensum', PensumController::class);
Route::get('indexPensum', [PensumController::class, 'indexPensum'])->name('indexPensum');

//CAREERS
Route::resource('career', CareerController::class);
Route::get('indexCareer', [CareerController::class, 'indexCareer'])->name('indexCareer');

//AREAS
Route::resource('area', AreaController::class);
Route::get('indexArea', [AreaController::class, 'indexArea'])->name('indexArea');

//USER
Route::get('userIndex', [ProfileController::class, 'indexUser'])->name('indexUser');

//STATE
Route::resource('state', StateController::class);

//MUNICIPY
Route::resource('municipy', MunicipyController::class);

//TEACHER
Route::resource('teacher', TeacherController::class);

//ADRESS
Route::resource('adress', AdressController::class);

//DEPARTAMENT
Route::resource('departament', DepartamentController::class);

//SUBJECT
Route::resource('subject', SubjectController::class);

//SHIFT
Route::resource('shift', ShiftController::class);

//SECTION


require __DIR__.'/auth.php';
