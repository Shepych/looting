<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user/inventory', [UserController::class, 'inventory']);
Route::get('/user/item/take/{item_id}/{slot_index}/{quantity}', [UserController::class, 'takeItem']);
Route::get('/user/item/drop/{record_id}/{quantity}', [UserController::class, 'dropItem']);
Route::get('/map/start', [UserController::class, 'mapStart']);
