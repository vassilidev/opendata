<?php

use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;

Route::get('/{type}', TableController::class)->name('table');

Route::redirect('/', '/publication');
