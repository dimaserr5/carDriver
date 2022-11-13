<?php

use App\Http\Controllers\api\v1\cars\CarAddController;
use App\Http\Controllers\api\v1\cars\CarDeleteController;
use App\Http\Controllers\api\v1\cars\CarListController;
use App\Http\Controllers\api\v1\cars\CarRentController;
use App\Http\Controllers\api\v1\user\UserCreateController;
use App\Http\Controllers\api\v1\user\UserRoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//api v1

//User
Route::post('/v1/user/create',[UserCreateController::class, 'createUser']);

Route::post('/v1/user/role', [UserRoleController::class, 'roleUser'])->middleware('apiauth');

Route::post('/v1/user/cars/rent', [CarRentController::class, 'rentCar'])->middleware('apiauth'); // В swagger

//---

//Admin
    //Car
        Route::get('/v1/admin/cars', [CarListController::class, 'get'])->middleware('apiauthadmin');
        Route::post('/v1/admin/cars/add', [CarAddController::class, 'add'])->middleware('apiauthadmin');
        Route::post('/v1/admin/cars/delete', [CarDeleteController::class, 'delete'])->middleware('apiauthadmin');
    //---
//---

//----
