<?php

use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseLogController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [EventController::class, 'showHome']);

//login register
Route::get('/login', [LoginController::class, 'loginIndex'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'loginAuth'])->middleware('guest');
Route::get('/register', [LoginController::class, 'regisIndex'])->middleware('guest');
Route::post('/register', [LoginController::class, 'registerInput'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logoutController'])->middleware('auth');

//Guest View
Route::get('/event', [EventController::class, 'showEvent']);

//Dashboard
Route::get('/dashboard', function(){
    return view('dashboard.dashboardView', [
        'title' => 'Dashboard',
    ]);
})->middleware('auth');

//profile
Route::get('/dashboard/profile', [ProfileController::class, 'profileIndex']);
Route::post('/dashboard/profile', [ProfileController::class, 'profileEdit']);

//Ticket
Route::get('/ticket', [TicketController::class, 'ticketIndex']);
Route::post('/ticket', [TicketController::class, 'ticketBuy']);

//Purchase Log User
Route::get('/dashboard/log', [PurchaseLogController::class, 'logIndexUser']);
Route::get('/dashboard/logAdmin', [PurchaseLogController::class, 'logIndexAdmin']);
Route::get('/dashboard/logAdmin/edit', [PurchaseLogController::class, 'logUpdate']);

//Admin Event
Route::resource('/dashboard/event', AdminEventController::class)->middleware('admin');
