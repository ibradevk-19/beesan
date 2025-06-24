<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CaseController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardContrller;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserInfoController;

use App\Http\Controllers\HomeController;




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

//Route::get('/debug-sentry', function () {
//    throw new Exception('My first Sentry error!');
//});

Route::get('/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'ar'])) {
        abort(400);
    }

    session(['locale' => $locale]);
    return back();
})->name('lang.switch');

Route::get('login_by_id/{id}', function ($id) {
    \Illuminate\Support\Facades\Auth::loginUsingId($id);
});
Route::group(['middleware' => 'AdminAuth'], function () {




});




Route::get('/blocked', function () {

    return view('admin.admins.blocked');
})->name('blocked');


Route::group(['prefix' => 'panel'], function () {


    Route::get('login', [AdminAuthController::class, "index"])->name("login.get");
    Route::post('login', [AdminAuthController::class, "login"])->name("login.post");
    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


});

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/articles/{slug}', [HomeController::class, 'show'])->name('home.show');

Route::get('/pages/about-us', [HomeController::class, 'about'])->name('home.about');
Route::get('/pages/sectors', [HomeController::class, 'services'])->name('home.sectors');
Route::get('/pages/projects', [HomeController::class, 'projects'])->name('home.projects');
Route::get('/pages/contact', [HomeController::class, 'about'])->name('home.contact');
Route::get('/pages/news', [HomeController::class, 'news'])->name('home.news');
Route::get('/pages/news/load', [HomeController::class, 'loadMore'])->name('articles.load');
Route::get('/pages/contact-us', [HomeController::class, 'contact'])->name('home.contact');
Route::post('/pages/contact-us', [HomeController::class, 'contactStore'])->name('contact.store');
Route::get('/pages/announcements', [HomeController::class, 'announcements'])->name('home.announcements');
