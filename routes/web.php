<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\StagesController;
use App\Http\Controllers\Auth\AuthenticatedSessionController as UserAuthenticatedSessionController;
//use App\Http\Controllers\Auth\RegisteredUserController;
//use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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
Route::get('/', [UserController::class, 'dashboard'])->name('user.dashboard');



// Route::middleware(['basicAuth'])->group(function () {
//     Route::get('/uploads/lead/{leadId}',[LoanDocController::class, 'loanDocDir'])->name('loan.loanDocDir');
// });

// Route::get('lead', [GeneralController::class, 'lead'])->name('lead');
// Route::get('leaddetails', [GeneralController::class, 'leaddetails'])->name('leaddetails');
// userlisting page
// Route::get('create', [GeneralController::class, 'create'])->name('admin.create');
// Route::get('edit', [GeneralController::class, 'edit'])->name('admin.edit');
// Route::get('userlisting', [GeneralController::class, 'userlisting'])->name('admin.userlisting');
// Route::get('dashboard', [GeneralController::class, 'dashboard'])->name('admin.dashboard');
// user listing page


Route::get('/stagesview', function (){
    return view('stagesview');
 });
//user
Route::get('login', [UserAuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [UserAuthenticatedSessionController::class, 'store'])->name('login');

Route::prefix('user')->group(function () {         
        Route::get('dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
        Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
        Route::post('profile', [UserController::class, 'profile'])->name('user.profile');
        Route::get('all', [UserController::class, 'users'])->name('user.all');
        Route::get('add', [UserController::class, 'addUser'])->name('user.add');
        Route::post('add', [UserController::class, 'addUser'])->name('user.add');
        Route::get('edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
        Route::post('edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
        Route::get('/stagesview', [StagesController::class, 'stagesview'])->name('user.stagesview');
        Route::get('/contactlisting', [StagesController::class, 'contactlisting'])->name('user.contactlisting');
        Route::get('/contactdetails', [StagesController::class, 'contactdetails'])->name('user.contactdetails');
        Route::get('/customfields', [StagesController::class, 'customfields'])->name('user.customfields');
        Route::get('/dealslisting', [StagesController::class, 'dealslisting'])->name('user.dealslisting');
        Route::get('/fieldlisting', [StagesController::class, 'fieldlisting'])->name('user.fieldlisting');
        Route::get('/viewportal', [StagesController::class, 'viewportal'])->name('user.viewportal');
        // Route::get('/', [userDashboardController::class, 'home'])->name('user.home');
        // Route::get('dashboard', [userDashboardController::class, 'index'])->name('user.dashboard');
        // Route::resource('app-settings', AppSettingController::class);
        // Route::get('logout', [userController::class, 'logout'])->name('user.logout');  
});    

// views iframe