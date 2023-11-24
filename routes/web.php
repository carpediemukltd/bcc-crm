<?php

use App\Http\Middleware\Cors;
use App\Http\Middleware\CheckUser;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckStatus;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DealController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAdminOwner;
use App\Http\Middleware\CheckSuperAdmin;
use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\StageController;
use App\Http\Middleware\CheckSameCompany;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\JotFormController;
use App\Http\Controllers\PipelineController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MagicLinkController;
use App\Http\Middleware\CheckAdminSuperAdmin;
use App\Http\Controllers\DialogflowController;
use App\Http\Controllers\RoundRobinController;
use App\Http\Controllers\CustomFieldController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\ChromeExtensionController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\SearchController;

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
// Route::get('/extension', [ChromeExtensionController::class, 'login'])->name('ext.login');
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('verify-2fa', [AuthController::class, 'verify2FA'])->name('verify-2fa');
Route::post('resend-verification-code', [AuthController::class, 'resendVerificationCode'])->middleware('throttle:3,5'); // Throttle to 3 requests per 5 minutes
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/magic-link/{contact_id}', [MagicLinkController::class, 'generateLink'])->name('magic.link.generate');
Route::get('/magic-link/view/{token}', [MagicLinkController::class, 'viewLink'])->name('magic.link.view');

Route::post("/chat", [DialogflowController::class, "chat"]);

Route::post('jotform-webhook', [JotFormController::class, 'handleJotformWebhook'])->name('handleJotformWebhook')->withoutMiddleware([VerifyCsrfToken::class]);
Route::middleware([CheckStatus::class])->group(function () {

    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('dashboard-sandbox', [UserController::class, 'dashboard_sandbox'])->name('dashboard-sandbox');
    Route::get('deals-sandbox', [DealController::class, 'deals_sandbox'])->name('deals-sandbox');
    Route::get('filter-deals', [DealController::class, 'filter_deals'])->name('filter-deals');
    Route::get('sandbox-daterange', [UserController::class, 'sandbox_daterange'])->name('sandbox-daterange');
    Route::get('privacy', [GeneralController::class, 'privacySetting'])->name('privacy');
    Route::get('help', [GeneralController::class, 'help'])->name('help');
    Route::get('about', [GeneralController::class, 'about'])->name('about');
    Route::get('contact', [GeneralController::class, 'contact'])->name('contact');
    Route::get('robinsetting', [GeneralController::class, 'robinSetting'])->name('robinsetting');
    Route::get('boardview', [GeneralController::class, 'boardView'])->name('boardview');
    Route::get('dealsboardview', [GeneralController::class, 'dealsboardView'])->name('dealsboardview');
    Route::get('editsetting', [GeneralController::class, 'editSetting'])->name('editsetting');
    Route::any('profile', [UserController::class, 'editProfile'])->name('profile');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware([CheckSuperAdmin::class])->group(function () { // SuperAdmin specific methods
        Route::any('company/add', [CompanyController::class, 'addCompany'])->name('company.add');
        Route::any('company/deals', [CompanyController::class, 'companyDeals'])->name('company.deals');
        Route::get('company/deals/exportcsv', [CompanyController::class, 'exportDealsCSV'])->name('company.deals.export.csv');
        Route::get('company/deals/exportxls', [CompanyController::class, 'exportDealsXLS'])->name('company.deals.export.xls');
        Route::any('company/deals/{view}', [CompanyController::class, 'companyDealsDetail'])->name('company.deals.detail');
        Route::get('companies', [CompanyController::class, 'listCompany'])->name('company.list');
        Route::any('company/edit/{id}', [CompanyController::class, 'editCompany'])->name('company.edit');

        Route::any('customfield/add', [CustomFieldController::class, 'addField'])->name('customfield.add');
        Route::any('customfield', [CustomFieldController::class, 'fieldList'])->name('customfield.list');
        Route::any('customfield/edit/{id}', [CustomFieldController::class, 'editField'])->name('customfield.edit');


        Route::get('stages', [StageController::class, 'stageList'])->name('stage.list');
        Route::post('stage/add', [StageController::class, 'stageAdd'])->name('stage.add');
        Route::post('stage/edit/{id}', [StageController::class, 'stageEdit'])->name('stage.edit');
        Route::post('stage/delete/{id}', [StageController::class, 'stageDelete'])->name('stage.delete');

        Route::get('pipelines', [PipelineController::class, 'pipelineList'])->name('pipeline.list');
        Route::post('pipeline/add', [PipelineController::class, 'pipelineAdd'])->name('pipeline.add');
        Route::post('pipeline/edit/{id}', [PipelineController::class, 'pipelineEdit'])->name('pipeline.edit');
        Route::post('pipeline/delete/{id}', [PipelineController::class, 'pipelineDelete'])->name('pipeline.delete');

        Route::get('email_templates', [EmailTemplateController::class, 'emailTemplateList'])->name('email_template.list');
        Route::post('email_template/add', [EmailTemplateController::class, 'emailTemplateAdd'])->name('email_template.add');
        Route::post('email_template/edit/{id}', [EmailTemplateController::class, 'emailTemplateEdit'])->name('email_template.edit');
        Route::post('email_template/delete/{id}', [EmailTemplateController::class, 'emailTemplateDelete'])->name('email_template.delete');
        Route::any('pipeline/{action}/{id?}', [PipelineController::class, 'pipelines'])->name('pipeline');
        Route::any('deals/{view}', [DealController::class, 'dealsList'])->name('deals.list');
        Route::get('admins', [UserController::class, 'admins'])->name('admins');

    });

    Route::middleware([CheckStatus::class])->group(function () { // User specific methods
        Route::any('contact/add', [UserController::class, 'addUser'])->name('user.add');
        Route::get('contact/exportcsv', [UserController::class, 'exportCSV'])->name('user.export.csv');
        Route::get('contact/exportxls', [UserController::class, 'exportXLS'])->name('user.export.xls');
        Route::get('contacts', [UserController::class, 'userList'])->name('user.list');
        Route::any('contact/edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
        Route::any('contact/{id}/details', [UserController::class, 'userDetails'])->name('user.details');

        Route::post('contact/{id}/due_date', [UserController::class, 'userDueDate'])->name('user.due_date');

        //update document manager
        Route::post('update-document-manager/{id}', [UserController::class, 'updateDocumentManager'])->name('document.manager.update');

        Route::post('send-email-notification', [UserController::class, 'sendEmailNotification'])->name('user.sendEmailNotification');

        // Search for user for mention
        Route::post('search-user-to-mention', [UserController::class, 'searchUserToMention'])->name('search.user.to.mention');

        Route::any('contact/{id}/deals/add', [DealController::class, 'dealsAdd'])->name('user.deals.add');
        Route::any('contact/{user_id}/deals/edit/{id}', [DealController::class, 'dealsEdit'])->name('user.deals.edit');
        Route::get('contact/{id}/pipeline/{pipeline_id}/deals/board_cards', [DealController::class, 'userDealsBoardCards'])->name('user.deals.board_cards');
        Route::get('contact/{id}/deals', [DealController::class, 'userDeals'])->name('user.deals');
        Route::any('contact/{id}/deals/{view}', [DealController::class, 'userDealsDetail'])->name('user.deals.detail');
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

    Route::middleware([CheckAdminSuperAdmin::class])->group(function () {
        Route::any('roundrobin', [RoundRobinController::class, 'index'])->name('roundrobin');
    });
    //notifications
    Route::middleware([CheckAdminOwner::class])->group(function () {
        Route::get('notification-settings', [NotificationController::class, 'notificationSettings']);
        Route::put('clear-bell-badge', [NotificationController::class, 'clearBellBadge']);
        Route::put('notification-mark-read', [NotificationController::class, 'notificationMarkRead']);
        Route::put('update-notification-setting', [NotificationController::class, 'updateNotificationSetting']);
        Route::post('update-stage-settings-options', [NotificationController::class, 'updateStageSettingsOptions']);
        Route::get('notifications', [NotificationController::class, 'index'])->name('notifications');
        Route::any('roundrobin', [RoundRobinController::class, 'index'])->name('roundrobin');
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
    Route::get('search', [SearchController::class, 'show'])->name('search');
    Route::post('search', [SearchController::class, 'index']);
    Route::get('contacts/import-file', [UserController::class, 'showImportContactsFileForm'])->name('showImportContactsFileForm');
    Route::post('contacts/import', [UserController::class, 'processImportContacts'])->name('processImportContacts');

});
