<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;



Route::get('/', [GoalController::class, 'index']);

Route::post('/goals', [GoalController::class, 'store'])->name("goals.store");

Route::delete('/goals/{goal}', [GoalController::class, 'destroy'])->name("goals.destroy");
