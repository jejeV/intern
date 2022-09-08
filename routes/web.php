<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StasiunController;
use App\Http\Controllers\TicketController;
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

// Route::get('/', function () {
//     return view('ticket.ticket');
// });

Route::resource('/stasiun', StasiunController::class);

Route::resource('/ticket', TicketController::class);

Route::resource('/customer', CustomerController::class);
