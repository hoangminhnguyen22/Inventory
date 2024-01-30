<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AssetController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ManufactorerController;
use App\Http\Controllers\Api\ModelAssetController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LocationController;

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

//register
route::post('/register', [AuthController::class, 'register']);
Route::get('register/verify/{code}', [AuthController::class, 'storeVerify']);

//login
route::post('/login', [AuthController::class, 'store']);

//forgot
route::post('/forgot/store', [AuthController::class, 'forgotStore']);
Route::get('reset-password/{token}', [AuthController::class, 'checkToken']);
Route::put('reset-password', [AuthController::class, 'reset'])->name('auth.reset');

//logout
route::get('/logout', [AuthController::class, 'logout']);

//43p kiểu date
// Route::group(['middleware' => 'auth:api'], function() {
Route::middleware(['auth:api'])->group(function(){
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/asset/qr-code', [AssetController::class, 'qrCode']);

    Route::apiResources([
        'asset'         => AssetController::class,
        'category'      => CategoryController::class,       //sai namespace, sửa lại
        'department'    => DepartmentController::class,
        'location'      => LocationController::class,
        'manufactorer'  => ManufactorerController::class,
        'model-asset'   => ModelAssetController::class,
        // 'role'          => RoleController::class,
        // 'purchase'      => PurchaseController::class,
        'supplier'      => SupplierController::class,
        'user'          => UserController::class,
    ]);
});


