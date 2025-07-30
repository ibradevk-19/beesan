<?php

use App\Http\Controllers\Api\HomeController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::get('home', [HomeController::class, 'index']);
Route::get('about', [HomeController::class, 'about']);
Route::get('projects', [HomeController::class, 'projects']);
Route::get('news', [HomeController::class, 'news']);
Route::get('news/{id}', [HomeController::class, 'newsDetiles']);
Route::get('reports', [HomeController::class, 'reports']);
Route::post('contact', [HomeController::class, 'contact']);
Route::get('footer', [HomeController::class, 'footer']);

Route::get('/test-lang', function () {
     
    return response()->json([
        'locale' => app()->getLocale(),
        'translated' => __('messages.welcome'),
        'date' => \Carbon\Carbon::now()->translatedFormat('l j F Y'),
    ]);
})->middleware('ApiLanguageHandler');