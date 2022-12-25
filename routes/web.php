<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\DashboardController;



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
    return view('auth.login');
});

// Route::get('dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');


Route::get('/laboratory/dashboard', function () {
    return view('/laboratory/dashboard');
})->middleware(['auth'])->name('/laboratory/dashboard');

Route::get('/assets/dashboard', function () {
    return view('/assets/dashboard');
})->middleware(['auth'])->name('/assets/dashboard');



Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', 'App\Http\Controllers\RoleController');
    Route::resource('users', 'App\Http\Controllers\UserController');
    Route::resource('permissions', 'App\Http\Controllers\PermissionController');
    Route::resource('logs', 'App\Http\Controllers\AuditController');
    Route::resource('researchs', 'App\Http\Controllers\ResearchController');
    Route::get('researchs/download/{file}',[ResearchController::class, 'download'])->name('download');
    Route::put('researchs/update/{id}', [App\Http\Controllers\ResearchController::class, 'update'])->name('researchs.update');
    Route::get('researchs/destroy/{id}',[App\Http\Controllers\ResearchController::class, 'destroy'])->name('researchs.destroy');

    Route::post('mark-as-read', [App\Http\Controllers\DashboardController::class,'markNotification'])->name('markNotification');
    
    // Route::resource('projects', 'App\Http\Controllers\ProjectController');
   
    
    

});

require __DIR__.'/auth.php';
