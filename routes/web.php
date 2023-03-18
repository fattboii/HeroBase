<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;


Route::resource('heros', HeroController::class);