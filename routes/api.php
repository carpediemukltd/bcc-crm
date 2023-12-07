<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\EmailTemplateController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DialogflowController;
use App\Http\Middleware\Api\CheckUser;
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

Route::post('login', [AuthController::class, 'postLogin'])->name('login');
Route::post('generate-verification-code', [AuthController::class, 'generateVerificationCode']);
Route::post('verify-code', [AuthController::class, 'verifyCode']);
Route::post('resend-verification-code', [AuthController::class, 'resendVerificationCode'])->middleware('throttle:3,5'); // Throttle to 3 requests per 5 minutes
Route::put('reset-password', [AuthController::class, 'resetPassword']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::middleware([CheckUser::class])->group(function () {
        Route::resource('documents', DocumentController::class);
        Route::delete('delete-account', [UserController::class, 'deleteAccount']);
        Route::get('deals', [UserController::class, 'deals']);
        Route::post('profile-update', [UserController::class, 'profileUpdate']);
        Route::get('notifications', [NotificationController::class, 'index']);
        Route::put('clear-bell-badge', [NotificationController::class, 'clearBellBadge']);
        Route::put('notification-mark-read/{id?}', [NotificationController::class, 'notificationMarkRead']);
    });

    Route::resource('email-templates', EmailTemplateController::class);
    Route::post('etemplates/add', EmailTemplateController::class,'addEmailTemplate');
    Route::post('logout', [AuthController::class, 'logout']);
});

//Route::middleware([DialogflowMiddleware::class])->group(function (Request $request) {
//    Route::post("dialogflow", [DialogflowController::class, "index"]);
//});
Route::middleware("dialogflow")->post("dialogflow", function (Request $request) {
    return DialogflowController::index($request);
});
