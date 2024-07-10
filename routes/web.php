<?php

use App\Http\Controllers\DemoController;
use App\Http\Controllers\KategoriSuratController;
use App\Http\Controllers\Menu\MenuGroupController;
use App\Http\Controllers\Menu\MenuItemController;
use App\Http\Controllers\RoleAndPermission\AssignPermissionController;
use App\Http\Controllers\RoleAndPermission\AssignUserToRoleController;
use App\Http\Controllers\RoleAndPermission\ExportPermissionController;
use App\Http\Controllers\RoleAndPermission\ExportRoleController;
use App\Http\Controllers\RoleAndPermission\ImportPermissionController;
use App\Http\Controllers\RoleAndPermission\ImportRoleController;
use App\Http\Controllers\RoleAndPermission\PermissionController;
use App\Http\Controllers\RoleAndPermission\RoleController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Models\Category;

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

Route::get('/', function () {
    return view('auth/login');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('home', ['users' => User::get(),]);
    });
    //user list

    // Route::prefix('user-management')->group(function () {
    //     Route::resource('user', UserController::class);
    //     Route::post('import', [UserController::class, 'import'])->name('user.import');
    //     Route::get('export', [UserController::class, 'export'])->name('user.export');
    //     Route::get('demo', DemoController::class)->name('user.demo');
    // });

    Route::prefix('surat-management')->group(function () {
        Route::get('/surats/{surat}/download', [SuratController::class, 'download'])->name('surats.download');
        Route::resource('surat', SuratController::class);
    });

    // Route::prefix('about-management')->group(function () {
    //     Route::resource('about', AboutController::class);
    // });
    Route::group(['prefix' => 'kategori-surat'], function () {
        //role
        Route::resource('kategori', KategoriSuratController::class);
    });
});
