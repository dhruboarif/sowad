<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AddMoneyController;
use App\Http\Controllers\AdminShowPaymentController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\GeneralSettingsController;
use App\Http\Controllers\BasicSettingsController;
use App\Http\Controllers\UserPaymentMethodController;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return view('auth.login');
});
//Route::get('/', [FrontendController::class,'index'])->name('home')->middleware('auth');
Route::get('/tree', [FrontendController::class,'tree']);
Route::get('/home/profile-settings/{id}', [FrontendController::class,'flipcard']);
Route::get('/home/registration-history/{id}', [UserDashboardController::class,'Manage'])->name('registration-history')->middleware('auth');
Route::get('/home/sponsor_bonus_history/{id}', [UserDashboardController::class,'sponsor_bonus'])->name('sponsor-bonus-history')->middleware('auth');
Route::get('/home/daily_revenue_history/{id}', [UserDashboardController::class,'daily_bonus'])->name('daily-bonus-history')->middleware('auth');
Route::get('/home/royality_bonus_history/{id}', [UserDashboardController::class,'royality_bonus'])->name('royality_bonus_history')->middleware('auth');
Route::get('/home/level_bonus_history/{id}', [UserDashboardController::class,'level_bonus'])->name('level_bonus_history')->middleware('auth');
Route::get('/home/pair_bonus_history/{id}', [UserDashboardController::class,'pair_bonus'])->name('pair_bonus_history')->middleware('auth');
Route::get('/home/team_bonus_history/{id}', [UserDashboardController::class,'team_bonus'])->name('team_bonus_history')->middleware('auth');
Route::get('/home/club_bonus_history/{id}', [UserDashboardController::class,'club_bonus'])->name('club_bonus_history')->middleware('auth');
Route::get('/home/withdraw_history/{id}', [UserDashboardController::class,'withdraw_history'])->name('withdraw_history')->middleware('auth');
Route::get('/home/purchase_history/{id}', [UserDashboardController::class,'purchase_history'])->name('purchase_history')->middleware('auth');

Route::get('/home/transfer_history/{id}', [UserDashboardController::class,'transfer_history'])->name('transfer_history')->middleware('auth');
Route::get('/home/dashboard/{id}', [UserDashboardController::class,'index'])->name('user-dashboard')->middleware('auth');
Route::get('/home/registration/{id}', [UserDashboardController::class,'registration'])->name('registration-page')->middleware('auth');


//user refferals routes
Route::post('/home/activate-package/', [ReferralController::class,'UserActivation'])->name('activate-package')->middleware('auth');
Route::get('/home/user-activation/{id}', [ReferralController::class,'Activation'])->name('activation')->middleware('auth');
Route::get('/home/referrals/{id}', [ReferralController::class,'index'])->name('referrals')->middleware('auth');
// Route::post('/home/referrals-user', [ReferralController::class,'userAdd'])->name('referrals-useradd');
Route::post('/home/check/get-sponsor', [ReferralController::class,'getSponsor'])->name('get-sponsor');
Route::post('/home/check/get-user', [ReferralController::class,'getUser'])->name('get-user');
Route::post('/home/check-position', [ReferralController::class,'checkPosition'])->name('referrals-checkposition');
Route::get('/home/my-team/{id}', [ReferralController::class,'MyTeam'])->name('my-team')->middleware('auth');
//Route::get('/home/my-team/{id}/', [ReferralController::class,'MyTeam'])->name('my-team')->middleware('auth');
Route::middleware(['auth:sanctum', 'verified'])->get('/user/dashboard/', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified','authadmin'])->get('/admin/dashboard', function () {
    return view('admin.pages.index');
})->name('admin.pages.dashboard');


// User Payment Method
Route::get('/home/payment-method/{id}', [UserPaymentMethodController::class,'index'])->name('user-payment-method')->middleware('auth');
Route::post('/home/payment-method/store', [UserPaymentMethodController::class,'Store'])->name('user-payment-method-store')->middleware('auth');
Route::get('/home/payment-method/delete/{id}', [UserPaymentMethodController::class,'Delete'])->middleware('auth');
Route::post('/home/payment-method/update', [UserPaymentMethodController::class,'Update'])->name('user-payment-method-update')->middleware('auth');

//Admin add package Routes
Route::get('/admin/package', [PackageController::class,'index'])->name('package-manage')->middleware('authadmin');
Route::post('/admin/package/store', [PackageController::class,'StorePackage'])->name('package-store')->middleware('authadmin');
Route::post('/admin/package/update', [PackageController::class,'UpdatePackage'])->name('package-update')->middleware('authadmin');
Route::get('/admin/package/delete/{id}', [PackageController::class,'Delete'])->middleware('authadmin');

//General Settings
Route::get('/admin/general-settings', [GeneralSettingsController::class,'index'])->name('manage-gsettings')->middleware('authadmin');
Route::post('/admin/general-settings/store', [GeneralSettingsController::class,'Store'])->name('general-settings-store')->middleware('authadmin');
Route::post('/admin/general-settings/update', [GeneralSettingsController::class,'Update'])->name('general-settings-update')->middleware('authadmin');
Route::get('/admin/general-settings/delete/{id}', [GeneralSettingsController::class,'Delete'])->middleware('authadmin');

//Basic settings
Route::get('/admin/basic-settings', [BasicSettingsController::class,'index'])->name('manage-bsettings')->middleware('authadmin');
Route::post('/admin/basic-settings/store', [BasicSettingsController::class,'Store'])->name('basic-settings-store')->middleware('authadmin');
Route::post('/admin/basic-settings/update', [BasicSettingsController::class,'Update'])->name('basic-settings-update')->middleware('authadmin');
Route::get('/admin/basic-settings/delete/{id}', [BasicSettingsController::class,'Delete'])->middleware('authadmin');


//admin show payment request routes
Route::get('/admin/add-money/requests', [AdminShowPaymentController::class,'Manage'])->name('deposit-manage')->middleware('authadmin');
Route::get('/admin/add-money-approve/{id}', [AdminShowPaymentController::class,'approve'])->middleware('authadmin');
Route::get('/admin/add-money-delete/{id}', [AdminShowPaymentController::class,'destroy'])->middleware('authadmin');
Route::get('/admin/withdraw-money/requests', [AdminShowPaymentController::class,'WithdrawManage'])->name('withdraw-manage')->middleware('authadmin');
Route::get('/admin/withdraw-money-approve/{id}', [AdminShowPaymentController::class,'Withdrawapprove'])->middleware('authadmin');
Route::get('/admin/withdraw-money-delete/{id}', [AdminShowPaymentController::class,'Withdrawdestroy'])->middleware('authadmin');

//user list routes
Route::get('/admin/user_lists', [UserListController::class,'Manage'])->name('user-list')->middleware('authadmin');
//user Add Money Routes
Route::post('/user/dashboard/add-money', [AddMoneyController::class,'Store'])->name('money-store')->middleware('auth');
Route::post('/user/dashboard/transfer-money', [AddMoneyController::class,'moneyTransfer'])->name('money-transfer')->middleware('auth');
Route::post('/user/dashboard/wallet-transfer', [AddMoneyController::class,'walletTransfer'])->name('wallet-transfer')->middleware('auth');
Route::post('/user/dashboard/wallet-withdraw', [AddMoneyController::class,'walletWithdraw'])->name('wallet-withdraw')->middleware('auth');

//Payment method Routes
Route::get('/admin/payment-method', [PaymentMethodController::class,'index'])->name('payment-method')->middleware('authadmin');
Route::post('/admin/payment-method/store', [PaymentMethodController::class,'Store'])->name('payment-method-store')->middleware('authadmin');
Route::get('/admin/payment-method/delete/{id}', [PaymentMethodController::class,'Delete'])->middleware('authadmin');
Route::post('/admin/payment-method/update', [PaymentMethodController::class,'Update'])->name('payment-method-update')->middleware('authadmin');


//
Route::post('/home/user_profile_update/update', [ReferralController::class,'UpdateUser'])->name('user-profile-update')->middleware('auth');
Route::post('/home/user-password/change-password-store',[ReferralController::class,'changePassStore'])->name('change-password-store')->middleware('auth');

//sponsor auto search route
Route::post('/find-users', [ReportController::class,'findUser']);

//Report
Route::get('/user/income-report', [ReportController::class,'incomeReport'])->name('income-report')->middleware('auth');
Route::get('/user/transfer-report', [ReportController::class,'transferReport'])->name('transfer-report')->middleware('auth');
Route::get('/user/cashwallet-transfer-report', [ReportController::class,'CashwallettransferReport'])->name('cashwallet-transfer-report')->middleware('auth');
//admin update User
Route::post('/admin/user-manage/update', [GeneralSettingsController::class,'UpdateUser'])->name('admin-update-user')->middleware('authadmin');
Route::post('/admin/user-manage-password/update', [GeneralSettingsController::class,'changePassword'])->name('admin-change-password')->middleware('authadmin');

Route::post('/home/user-add1', [ReferralController::class,'UserAdd1'])->name('user-add1')->middleware('auth');
Route::post('/home/user-add2', [ReferralController::class,'UserAdd2'])->name('user-add2')->middleware('auth');
Route::post('/home/user-add3', [ReferralController::class,'UserAdd3'])->name('user-add3')->middleware('auth');
Route::post('/home/user-add4', [ReferralController::class,'UserAdd4'])->name('user-add4')->middleware('auth');
Route::post('/home/user-add5', [ReferralController::class,'UserAdd5'])->name('user-add5')->middleware('auth');
Route::post('/home/user-add6', [ReferralController::class,'UserAdd6'])->name('user-add6')->middleware('auth');
Route::post('/home/user-add7', [ReferralController::class,'UserAdd7'])->name('user-add7')->middleware('auth');
Route::post('/home/user-add8', [ReferralController::class,'UserAdd8'])->name('user-add8')->middleware('auth');
Route::post('/home/user-add9', [ReferralController::class,'UserAdd9'])->name('user-add9')->middleware('auth');
Route::post('/home/user-add10', [ReferralController::class,'UserAdd10'])->name('user-add10')->middleware('auth');
Route::post('/home/user-add11', [ReferralController::class,'UserAdd11'])->name('user-add11')->middleware('auth');
Route::post('/home/user-add12', [ReferralController::class,'UserAdd12'])->name('user-add12')->middleware('auth');
Route::post('/home/user-add13', [ReferralController::class,'UserAdd13'])->name('user-add13')->middleware('auth');
Route::post('/home/user-add14', [ReferralController::class,'UserAdd14'])->name('user-add14')->middleware('auth');

Route::get('/admin/balance-adjust', [AddMoneyController::class,'BalanceAdjust'])->name('balance-adjust')->middleware('authadmin');
Route::post('/admin/balance-adjust-store', [AddMoneyController::class,'BalanceAdjustStore'])->name('store-adjust-balance')->middleware('authadmin');
Route::post('/admin/balance-deduct-store', [AddMoneyController::class,'BalanceDeductStore'])->name('deduct-adjust-balance')->middleware('authadmin');

Route::get('/admin/club-settings', [GeneralSettingsController::class,'ClubSettings'])->name('club-settings')->middleware('authadmin');
Route::post('/admin/club-settings-update', [GeneralSettingsController::class,'ClubSettingsUpdate'])->name('update-club-settings')->middleware('authadmin');
Route::get('/admin/club-members', [UserListController::class,'ClubMember'])->name('club-members')->middleware('authadmin');

Route::post('/admin/distribute-bonus', [AddMoneyController::class,'DistributeBonus'])->name('distribute-bonus')->middleware('authadmin');

Route::post('/admin/user-restrict', [ReferralController::class,'UserRestrict'])->name('user-restrict')->middleware('authadmin');
Route::post('/admin/user-unrestrict', [ReferralController::class,'UserunRestrict'])->name('user-unrestrict')->middleware('authadmin');

Route::get('/admin/rank-settings', [GeneralSettingsController::class,'RankSettings'])->name('manage-ranks')->middleware('authadmin');
Route::post('/admin/store-rank', [GeneralSettingsController::class,'StoreRank'])->name('store-rank')->middleware('authadmin');
Route::post('/admin/update-rank', [GeneralSettingsController::class,'UpdateRank'])->name('update-rank')->middleware('authadmin');
Route::get('/home/my-rank/{id}', [UserDashboardController::class,'MyRank'])->name('my-rank')->middleware('auth');
Route::post('/home/claim-rank', [UserDashboardController::class,'ClaimRank'])->name('claim-rank')->middleware('auth');
Route::get('/admin/manage-rank-bonus', [AdminShowPaymentController::class,'ManageRankBonus'])->name('rank-manage')->middleware('authadmin');
Route::get('/admin/rank-bonus-approve/{id}', [AdminShowPaymentController::class,'RankApprove'])->middleware('authadmin');
Route::get('/admin/rank-bonus-reject/{id}', [AdminShowPaymentController::class,'RankReject'])->middleware('authadmin');

Route::post('/admin/add-club-member/', [ReferralController::class,'AddMember'])->name('add-club-member')->middleware('authadmin');