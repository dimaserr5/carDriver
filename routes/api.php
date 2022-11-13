<?php

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
//---

//Admin
    //Car
Route::get('/v1/admin/cars', [UserRoleController::class, 'findcars'])->middleware('apiauthadmin');
    //---
//---

//----
