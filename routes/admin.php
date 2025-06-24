<?php


use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\AdminControllers\RoleController;
use App\Http\Controllers\Admin\AdminControllers\AdminController;

use App\Http\Controllers\Admin\MainController;

use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AboutDataController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\AnnouncementController;



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

$buildVersion = "1.0.0B8";
\View::share('buildVersion', $buildVersion);





Route::get('/', [HomeAdminController::class, 'home'])->name('home');

Route::get('/testHome', [HomeAdminController::class, 'testHome'])->name('testHome');

##################################################
################### Admins && Roles ######################
##################################################
Route::resource('admin', AdminController::class)->middleware(['CheckIfSuperAdmin']);
Route::resource('roles', RoleController::class)->middleware(['CheckIfSuperAdmin']);
Route::resource('roles', RoleController::class)->middleware(['CheckIfSuperAdmin']);
Route::get('roles_del', [RoleController::class, 'delete_roles'])->name('role.del');
Route::get('logout', [AdminAuthController::class, "logout"])->name("admin.logout")->middleware('AdminAuth');

// _______________beneficial________________


// _______________________________
Route::get('profile', [AdminController::class, 'Profile'])->name('admin.profile.view');
Route::post('profile_store', [AdminController::class, 'Profile_update'])->name('admin.profile.store');
Route::resource('hero-slide', HeroController::class);
Route::resource('clients', ClientController::class);
Route::resource('categories', CategoryController::class);
Route::resource('articles', ArticleController::class);

Route::get('aboutdata', [AboutDataController::class, 'edit'])->name('admin.aboutdata.edit');
Route::put('aboutdata/{aboutdata}', [AboutDataController::class, 'update'])->name('admin.aboutdata.update');
Route::get('site-settings', [SiteSettingController::class, 'edit'])->name('admin.site-settings.edit');
Route::post('site-settings', [SiteSettingController::class, 'update'])->name('admin.site-settings.update');


 Route::resource('services', ServiceController::class);
 Route::resource('projects', ProjectController::class);
 Route::resource('announcements', AnnouncementController::class);
 Route::delete('/attachments/{attachment}', [AnnouncementController::class, 'attachmentDestroy'])->name('attachments.destroy');
