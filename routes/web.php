<?php
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckStatus;

use App\Http\Middleware\CheckSuperAdmin;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckUser;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\GeneralController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::middleware([CheckStatus::class])->group(function(){
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('privacy', [GeneralController::class, 'privacySetting'])->name('privacy');

    Route::any('profile', [UserController::class, 'editProfile'])->name('profile');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware([CheckSuperAdmin::class])->group(function(){ // SuperAdmin specific methods
        Route::any('contact/add', [UserController::class, 'addUser'])->name('user.add');
        Route::get('contacts', [UserController::class, 'userList'])->name('user.list');
        Route::any('contact/edit/{id}', [UserController::class, 'editUser'])->name('user.edit');

        Route::any('customfield/add', [UserController::class, 'addField'])->name('customfield.add');
        Route::any('customfield', [UserController::class, 'fieldList'])->name('customfield.list');
        Route::any('customfield/edit/{id}', [UserController::class, 'editField'])->name('customfield.edit');
    });

    Route::middleware([CheckAdmin::class])->group(function(){
        // admin specific methods
    });

    Route::middleware([CheckUser::class])->group(function(){
        // user specific methods
    });


    Route::prefix('demo')->group(function () {
        Route::get('userlist', [GeneralController::class, 'userList'])->name('userlist');
        Route::get('useradd', [GeneralController::class, 'userAdd'])->name('useradd');
        Route::get('userprofile', [GeneralController::class, 'userProfile'])->name('userprofile');

        Route::get('contactdetails', [GeneralController::class, 'contactDetails'])->name('contactdetails');
        Route::get('stagescard', [GeneralController::class, 'stagesCard'])->name('stagescard');
        Route::get('dealslisting', [GeneralController::class, 'dealsListing'])->name('dealslisting');
        Route::get('userform', [GeneralController::class, 'userForm'])->name('userform');
        Route::get('usertable', [GeneralController::class, 'userTable'])->name('usertable');
        Route::get('outlinedicon', [GeneralController::class, 'outlinedIcon'])->name('outlinedicon');
    });
});