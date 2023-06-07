<?php

use App\Http\Controllers\Api\StaffController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//get all users 
Route::get('staff', [StaffController::class, 'index']);
//post user
Route::post('staff',[StaffController::class, 'store']);