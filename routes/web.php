<?php
use App\Http\Controllers\CompetitorController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\EventResultsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('competitors', CompetitorController::class)
->only(['index', 'store'])
->middleware(['auth', 'verified']);

Route::resource('events', EventController::class)
->only(['index', 'store'])
->middleware(['auth', 'verified']);

Route::resource('competitions', CompetitionController::class)
->only(['index', 'store'])
->middleware(['auth', 'verified']);

Route::resource('results', EventResultsController::class)
->only(['index', 'store'])
->middleware(['auth', 'verified']);

Route::resource('map', MapController::class)
->only(['index', 'store'])
->middleware(['auth', 'verified']);


require __DIR__.'/auth.php';
