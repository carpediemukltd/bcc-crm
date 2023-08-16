<?php

use App\Http\Middleware\CheckUser;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckStatus;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DealController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckSuperAdmin;
use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Middleware\CheckSameCompany;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\PipelineController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RoundRobinController;
use App\Http\Controllers\CustomFieldController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\NotificationController;

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

Route::any('jotform/add', [UserController::class, 'addJotFormUser'])->name('user.add.jotform')->withoutMiddleware([VerifyCsrfToken::class]);

Route::middleware([CheckStatus::class])->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('privacy', [GeneralController::class, 'privacySetting'])->name('privacy');
    Route::get('help', [GeneralController::class, 'help'])->name('help');
    Route::get('about', [GeneralController::class, 'about'])->name('about');
    Route::get('contact', [GeneralController::class, 'contact'])->name('contact');
    Route::get('robinsetting', [GeneralController::class, 'robinSetting'])->name('robinsetting');
    Route::get('editsetting', [GeneralController::class, 'editSetting'])->name('editsetting');
    Route::any('profile', [UserController::class, 'editProfile'])->name('profile');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware([CheckSuperAdmin::class])->group(function () { // SuperAdmin specific methods
        Route::any('company/add', [CompanyController::class, 'addCompany'])->name('company.add');
        Route::get('companies', [CompanyController::class, 'listCompany'])->name('company.list');
        Route::any('company/edit/{id}', [CompanyController::class, 'editCompany'])->name('company.edit');
        
        Route::any('customfield/add', [CustomFieldController::class, 'addField'])->name('customfield.add');
        Route::any('customfield', [CustomFieldController::class, 'fieldList'])->name('customfield.list');
        Route::any('customfield/edit/{id}', [CustomFieldController::class, 'editField'])->name('customfield.edit');
        
        Route::any('pipeline/{action}/{id?}', [PipelineController::class, 'pipelines'])->name('pipeline');
        
    });

    Route::middleware([CheckStatus::class])->group(function () { // User specific methods
        Route::any('contact/add', [UserController::class, 'addUser'])->name('user.add');
        Route::get('contact/exportcsv', [UserController::class, 'exportCSV'])->name('user.export.csv');
        Route::get('contact/exportxls', [UserController::class, 'exportXLS'])->name('user.export.xls');
        Route::get('contacts', [UserController::class, 'userList'])->name('user.list');
        Route::any('contact/edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
        Route::any('contact/{id}/details', [UserController::class, 'userDetails'])->name('user.details');

        Route::get('contact/{id}/deals', [DealController::class, 'userDeals'])->name('user.deals');
        Route::any('contact/{id}/deals/add', [DealController::class, 'dealsAdd'])->name('user.deals.add');
        Route::any('contact/{user_id}/deals/edit/{id}', [DealController::class, 'dealsEdit'])->name('user.deals.edit');
        Route::post('contact/{user_id}/deals/updateStage/{id}', [DealController::class, 'dealsUpdateStage'])->name('user.deals.updatestage');
        Route::get('deal/{id}/exportcsv', [DealController::class, 'exportCSV'])->name('deal.export.csv');
        Route::get('deal/{id}/exportxls', [DealController::class, 'exportXLS'])->name('deal.export.xls');

        Route::get('notes/{contact_id}', [NoteController::class, 'listNote'])->name('note.list');
        Route::any('note/add', [NoteController::class, 'addNote'])->name('note.add');
        Route::post('note/edit/{id}', [NoteController::class, 'editNote'])->name('note.edit');
        Route::post('note/delete/{id}', [NoteController::class, 'deleteNote'])->name('note.delete');

        Route::get('pipelineStages/{id}/{stage_id?}', [PipelineController::class, 'getPipelineStages']);
        Route::get('stages/{id}', [PipelineController::class, 'stages'])->name('stages');

    });

    Route::middleware([CheckAdmin::class])->group(function () {
        Route::any('roundrobin', [RoundRobinController::class, 'index'])->name('roundrobin');

    });

    Route::middleware([CheckUser::class])->group(function () {
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
        Route::get('companyonboarding', [GeneralController::class, 'companyonbOarding'])->name('companyonboarding');
        Route::get('dynamicbanner', [GeneralController::class, 'dynamicBanner'])->name('dynamicbanner');
    });
    //notifications
    Route::put('clear-bell-badge', [NotificationController::class, 'clearBellBadge']);
    Route::put('notification-mark-read', [NotificationController::class, 'notificationMarkRead']);
    Route::get('notification-settings', [NotificationController::class, 'notificationSettings']);
    Route::put('update-notification-setting', [NotificationController::class, 'updateNotificationSetting']);

});
