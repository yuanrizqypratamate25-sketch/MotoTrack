<?php

use App\Http\Controllers\SepedaMotorController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/sepeda-motor');

Route::resource('sepeda-motor', SepedaMotorController::class)
    ->parameters(['sepeda-motor' => 'sepedaMotor']);
