<?php

use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/pasien');

Route::resource('pasien', PasienController::class);
