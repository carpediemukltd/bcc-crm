<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DialogflowController;
use App\Http\Middleware\DialogflowMiddleware;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::middleware([DialogflowMiddleware::class])->group(function (Request $request) {
//    Route::post("dialogflow", [DialogflowController::class, "index"]);
//});
Route::middleware("dialogflow")->post("dialogflow", function(Request $request) {
    return DialogflowController::index($request);
});
