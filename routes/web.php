<?php

use Illuminate\Support\Facades\Route;

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
    return view('getApi');
});

Auth::routes();

Route::get('admin/login',[App\Http\Controllers\Admin\LoginController::class,'getLogin'])->name('adminLogin');
Route::post('admin/login',[App\Http\Controllers\Admin\LoginController::class,'postLogin'])->name('adminLoginPost');
Route::get('admin/logout', [App\Http\Controllers\Admin\LoginController::class,'logout'])->name('adminLogout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/changepassword', [App\Http\Controllers\HomeController::class, 'showchangepasswordForm'])->name('changepassword.show');
Route::post('/changepassword', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('changePassword');
Route::Resource('/licenseapi',App\Http\Controllers\LicenseapiController::class);

Route::group(['middleware' => 'adminauth'], function () {
    Route::Resource('admin/users',App\Http\Controllers\Admin\AdminController::class);
    Route::Resource('admin/invitecodes',App\Http\Controllers\Admin\InviteCodeController::class);
    Route::Resource('admin/activitylogs',App\Http\Controllers\Admin\LogsController::class);
    Route::Resource('admin/settings',App\Http\Controllers\Admin\SettingController::class);
    Route::Post('admin/settings',[App\Http\Controllers\Admin\SettingController::class,'change_setting'])->name('settings.change');
});