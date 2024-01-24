<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AssetController;
use App\Http\Controllers\Api\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::post('/register', [AuthController::class, 'register'])->name('auth.regstore');
route::post('/login', [AuthController::class, 'store'])->name('auth.logstore');
route::post('/forgot', [AuthController::class, 'forgotStore'])->name('auth.forgot.store');
route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');



Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Route::get('/asset/qr-code', [AssetController::class, 'qrCode'])->name('asset.qrCode');

    Route::apiResources([
        'asset'         => AssetController::class,
        'category'      => CategoryController::class,       //sai namespace, sửa lại
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


