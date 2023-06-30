<?php

use App\Http\Controllers\AdressController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ClassroomTypeController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\HourController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\MunicipyController;
use App\Http\Controllers\PensumController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SchemeDayController;
use App\Http\Controllers\SchemeHourController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UbicationController;
use App\Http\Controllers\UtilController;
use App\Models\Project;
use App\Models\SchemeDay;

// Login de Laravel
Route::get('/', function () {
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
    return redirect('myDash');
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

Route::middleware('auth')->group(function () {
    /* MIS RUTAS */
    
    // RUTAS DEL PROYECTO
    Route::get('welcome', function ()
    {
        return inertia('Welcome');
    });
    
    Route::get('util', [UtilController::class, 'borrar']);
    
    //DASHBOARD 
    Route::get('/myDash', function (){
        session(['project' => null]);
        return Inertia::render('MyDashboard', [
            'projects' => Project::with('pensum')->get(),
        ]);
    })->name('mydash');


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
    Route::resource('project.section', SectionController::class)->shallow();

    //CLASSROOM
    Route::resource('project.classroom', ClassroomController::class)->shallow();

    //CLASSROOM TYPE
    Route::resource('classroom_type', ClassroomTypeController::class);

    //SCHEME DAY
    Route::resource('schemeday', SchemeDayController::class);

    //DAYS
    Route::resource('day', DayController::class);

    //SCHEME HOUR
    Route::resource('schemehour', SchemeHourController::class);

    //HOUR
    Route::resource('hour', HourController::class);

    //UBICATION
    Route::resource('ubication', UbicationController::class);

    //MEETING
    Route::resource('meeting', MeetingController::class);
    Route::get('meetingS/{subject}', [MeetingController::class, 'meetingSubject'])->name('meetingSubject');

    //MASTER CLASS
    Route::get('MasterClass', [MasterController::class, 'view'])->name('master.view');
    Route::post('MasterClass/Assigned', [MasterController::class, 'isAssigned'])->name('master.assigned');
    Route::post('MasterClass/Assigment', [MasterController::class, 'Assigment'])->name('master.assigment');
    Route::post('MasterClass/Unassigned', [MasterController::class, 'Unassigned'])->name('master.unassigned');


});




require __DIR__.'/auth.php';
