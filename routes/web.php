<?php

use App\Models\Post;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ChangePasswordController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/admin', function() {
//     return view('layouts/templateAdmin');
// });


// Route::get('/', function() {
//     return view('admin/dashboard', [
//         "title" => "dashboard"
//     ]);
// });

Route::get('login', [AuthController::Class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::Class,'login']);
Route::get('register', [AuthController::Class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::Class, 'register']);




Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', function() {
        return view('admin/dashboard', [
            "title" => "dashboard"
        ]);
    });

Route::get('changepassword', [ChangePasswordController::Class, 'index']);
Route::post('change-password', [ChangePasswordController::Class, 'store'])->name('change.password');

Route::get('/logout', [AuthController::Class, 'logout'])->name('logout');

Route::resource('posts', PostController::Class);
Route::resource('logo', LogoController::Class);
Route::resource('category', CategoryController::Class);
Route::resource('slider', SliderController::Class);
Route::resource('structure', StructureController::Class);
Route::resource('contact', ContactController::Class);
Route::resource('testimonial', TestimonialController::Class);
Route::resource('frontpage', FrontpageController::Class);
// Route::get('/frontpage/{frontpage:slug}', [FrontpageController::Class, 'show']);
Route::resource('announcement', AnnouncementController::Class);
});
