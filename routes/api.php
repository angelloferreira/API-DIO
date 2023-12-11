<?php

use App\Http\Controllers\BandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorldController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
Route::get('hello/{name}',function($name){

    return "Hello " . $name;

});
*/

Route::get('bands', [BandController::class, 'getAll']);
Route::post('bands/store', [BandController::class, 'store']);
Route::get('bands/{id}', [BandController::class, 'getById']);
Route::get('bands/gender/{gender}', [BandController::class, 'getByIdGender']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});