<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TeamController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("login", [LoginController::class, 'login'])->name('login');
Route::post("register", [RegisterController::class, "register"])->name('register');

Route::middleware(['auth:sanctum'])->group(function () {

    // Profile
    Route::get(
        '/me',
        function (Request $request) {
            return $request->user();
        }
    );

    // LogOut
    Route::post("logout", [LoginController::class, 'logout'])->name('logout');

    Route::post('/team/addUser', [TeamController::class, 'userAddedToTeam']);
});
