<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\LoginController;
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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 */

//login
Route::post('loginauth', [LoginController::class, 'login'])->name('loginauth');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('new_user', [LoginController::class, 'register'])->name('new_user');

Route::group(['middleware' => ["auth:sanctum"]], function () {
    //Companies
    Route::get('companies', [CompaniesController::class, 'index']);
    Route::post('create-company', [CompaniesController::class, 'create']);
    Route::put('update-company/{id}', [CompaniesController::class, 'update']);
    Route::delete('delete-company/{id}', [CompaniesController::class, 'destroy']);

    //Employees
    Route::get('employees', [EmployeesController::class, 'index']);
    Route::post('create-employee', [EmployeesController::class, 'create']);
    Route::put('update-employee/{id}', [EmployeesController::class, 'update']);
    Route::delete('delete-employee/{id}', [EmployeesController::class, 'destroy']);
});
