<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\SettingController;

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

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/deshboard', [AuthController::class, 'deshboard']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


//Category Route..........

Route::post('/category/index', [CategoryController::class, 'index'])->name('category.index');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/show/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit_index'])->name('category.edit');
Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

// SubCategory Route .................
Route::post('/subcategory/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
Route::post('/subcategory/index', [SubCategoryController::class, 'index'])->name('subcategory.index');
Route::get('/subcategory/show/{id}', [SubCategoryController::class, 'show'])->name('subcategory.show');
Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'edit_index'])->name('subcategory.edit');
Route::put('/subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
Route::delete('/subcategory/delete/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');





// Brand Route...........
Route::post('/brand/index', [BrandController::class, 'index'])->name('brand.index');
Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
Route::get('/brand/show/{id}', [BrandController::class, 'show'])->name('brand.show');
Route::get('/brand/edit/{id}', [BrandController::class, 'edit_index'])->name('brand.edit');
Route::put('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
Route::delete('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');

// Location Route.........

Route::post('/location/index', [LocationController::class, 'index'])->name('location.index');
Route::post('/location/store', [LocationController::class, 'store'])->name('location.store');
Route::get('/location/show/{id}', [LocationController::class, 'show'])->name('location.show');
Route::get('/location/edit/{id}', [LocationController::class, 'edit_index'])->name('location.edit');
Route::put('/location/update/{id}', [LocationController::class, 'update'])->name('location.update');
Route::delete('/location/delete/{id}', [LocationController::class, 'delete'])->name('location.delete');

//Area Route................

Route::post('/area/index', [AreaController::class, 'index'])->name('area.index');
Route::post('/area/store', [AreaController::class, 'store'])->name('area.store');
Route::get('/area/show/{id}', [AreaController::class, 'show'])->name('area.show');
Route::get('/area/edit/{id}', [AreaController::class, 'edit_index'])->name('area.edit');
Route::put('/area/update/{id}', [AreaController::class, 'update'])->name('area.update');
Route::delete('/area/delete/{id}', [AreaController::class, 'delete'])->name('area.delete');


//Setting Route...............
Route::post('/setting/index', [SettingController::class, 'index'])->name('setting.index');
Route::post('/setting/store', [SettingController::class, 'store'])->name('setting.store');
Route::get('/setting/show/{id}', [SettingController::class, 'show'])->name('setting.show');
Route::get('/setting/edit/{id}', [SettingController::class, 'edit_index'])->name('setting.edit');
Route::put('/setting/update/{id}', [SettingController::class, 'update'])->name('setting.update');
Route::delete('/setting/delete/{id}', [SettingController::class, 'delete'])->name('setting.delete');