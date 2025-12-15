<?php 
use App\Http\Controllers\GoalController;
use Illuminate\Support\Facades\Route;

// READ
Route::get('/', [GoalController::class, 'index']);

// CREATE
Route::post('/goals', [GoalController::class, 'store'])->name('goals.store');

// DELETE
Route::delete('/goals/{goal}', [GoalController::class, 'destroy'])->name('goals.destroy');
