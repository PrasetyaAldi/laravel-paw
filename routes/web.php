<?php

use App\Http\Controllers\loginController;
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

Route::get('/', [loginController::class, 'index']);
Route::get('/logout',[loginController::class,'logOut'])->name('logout.post');
Route::post('/loginpost',[loginController::class,'postLogin'])->name('login.post');
Route::get('/register', [loginController::class, 'registerView']);
Route::post('/registerpost',[loginController::class,'postRegister'])->name('post.register');
// admin
Route::get('/adminindex',[loginController::class,'admin']);



Route::get('/member','App\Http\Controllers\MemberController@index');
Route::post('/member/create','App\Http\Controllers\MemberController@create'); 
Route::get('/member/{id}/edit','App\Http\Controllers\MemberController@edit');
Route::post('/member/{id}/update','App\Http\Controllers\MemberController@update');
Route::get('/member/{id}/delete','App\Http\Controllers\MemberController@delete');