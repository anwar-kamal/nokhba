<?php

use Statamic\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\GetOptionsController;
use App\Http\Controllers\StudentDashboardController;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;
use App\Http\Controllers\CustomResetPasswordController;
use App\Http\Controllers\CustomForgotPasswordController;

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
Route::get('/get_objects/create', [GetOptionsController::class ,"create"])->name('extend.create');
Route::get('/get_objects/{request}', [GetOptionsController::class ,"get_objects"])->name('extend.get_objects');
// Logs
Route::get('/logs', [LogViewerController::class, 'index']);
// Change Locale
Route::get('/change-locale/{lang}', function ($lang) {
    $_SESSION['locale'] = $lang;
    Session::put('locale', $lang);
    $url = url()->previous();
    if ($lang == 'en'  && !str_contains($url, '/student') && !str_contains($url, '/instructor'))
        $new_url = str_replace($_SERVER['HTTP_HOST'], $_SERVER['HTTP_HOST'] . '/en', $url);
    else {
        $new_url = str_replace('en/', '', $url);
        if (substr($new_url, -2) === 'en')
            $new_url =   str_replace('en', '', $new_url);
    }
    return redirect()->to($new_url);
})->middleware("ChangeLanguage")->name('change.locale');
// Reset Password
Route::post('/reset-password', [CustomResetPasswordController::class, 'resetPassword'])->name('reset');
Route::post('/forgot-password', [CustomForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}/{email}', [CustomResetPasswordController::class, 'showResetForm'])->name('password.reset');
// LogOut
Route::get('/logout', function () {
    Auth::guard('customers')->logout();
    // Auth::guard('instructor')->logout();
    return redirect('/');
})->name('logout');
//customers
Route::middleware(['auth:customers', 'verified'])->group(function () {
    Route::group(['guard' => 'customers'], function () {
        Route::prefix("/student")->middleware(['ChangeLanguage'])->group(function () {
            Route::get('/dashboard', [StudentDashboardController::class, 'studentDashboard'])->name('student.dashboard');
        });
    });
});
