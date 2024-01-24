<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ManufactorerController;
use App\Http\Controllers\ModelAssetController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', function () {
    return view('email.AccountVerification');
});

//register and verify
route::get('/register', [AuthController::class, 'register'])->name('auth.register')->middleware('checkLogout');
route::post('/register/storeRegister', [AuthController::class, 'storeRegister'])->name('auth.regstore');
route::get('/register/verify', [AuthController::class, 'verify'])->name('auth.verify')->middleware('verify');
route::post('/register/re-send', [AuthController::class, 'reSend'])->name('auth.resend');
Route::get('register/verify/{code}', [AuthController::class, 'storeVerify']);

// login
route::get('/login', [AuthController::class, 'index'])->name('auth.index')->middleware('checkLogout');
route::post('/login/store', [AuthController::class, 'store'])->name('auth.logstore');

//forgot
route::get('/forgot', [AuthController::class, 'forgot'])->name('auth.forgot')->middleware('checkLogout');
route::post('/forgot/store', [AuthController::class, 'forgotStore'])->name('auth.forgot.store');

//reset password
Route::get('reset-password/{token}', [AuthController::class, 'checkToken']);
Route::get('enter-new-password', [AuthController::class, 'enterPassword'])->name('auth.enterPassword');
Route::put('reset-password', [AuthController::class, 'reset'])->name('auth.reset');

//logout
route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

//error page
Route::get('/error', [AdminController::class, 'error'])->name('admin.error');
Route::get('/ban', [AdminController::class, 'ban'])->name('admin.ban');

Route::middleware(['auth', 'admin'])->prefix("/admin")->group(function(){
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    //hỏi thử tại sao nằm dưới không được mà nằm trên được
    Route::get('/asset/qr-code', [AssetController::class, 'qrCode'])->name('asset.qrCode');
    Route::resources([
        'asset'         => AssetController::class,
        'category'      => CategoryController::class,
        'department'    => DepartmentController::class,
        'location'      => LocationController::class,
        'manufactorer'  => ManufactorerController::class,
        'model-asset'   => ModelAssetController::class,
        'role'          => RoleController::class,
        'purchase'      => PurchaseController::class,
        'supplier'      => SupplierController::class,
        'user'          => UserController::class,
    ]);
    
});
