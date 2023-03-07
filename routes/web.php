<?php

use App\Http\Controllers\CenterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\StasiunController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PerangkatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\api\MessageController;


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


Route::resource('/', DashboardController::class)->except('show','create','store','edit','update','destroy')->middleware('auth');

Route::resource('/stasiun', StasiunController::class)->except('create','show','edit')->middleware('auth');

Route::resource('/data-center', CenterController::class)->except('create', 'show', 'edit')->middleware('auth');

Route::resource('/ticket', TicketController::class)->except('create','edit')->middleware('auth');
Route::post('ticket/{id}', [TicketController::class,'post']);

Route::resource('/customer', CustomerController::class)->except('show')->middleware('auth');
Route::get('customer/status/{id}', [CustomerController::class, 'status']);

Route::resource('/service', ServiceController::class);

Route::post('/posta', [ServiceController::class, 'posta']);

Route::post('/postb1', [ServiceController::class, 'postb1']);

Route::resource('/perangkat', PerangkatController::class)->except('create', 'show', 'edit')->middleware('auth');

Route::resource('/user', UserController::class)->middleware('admin');
Route::put('/changepassword/{id}', [UserController::class,'resetPassword']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Api Vue message
Route::get('/ticketapi/{id}', [MessageController::class,'index']);
Route::get('/ticket/{ticket_id}/message/',[MessageController::class,'message']);
Route::post('/ticket/{ticket_id}/message/',[MessageController::class,'store']);

// Api Vue user
Route::get('/userapi', [MessageController::class, 'user']);
