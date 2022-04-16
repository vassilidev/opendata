<?php

use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;

Route::get('/{type}', TableController::class)->name('table');

Route::get('/parse', function () {
    Artisan::call('opendata:parse');
});
