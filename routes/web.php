<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\TicketController;

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
    return view('welcome');
});
Route::get('/sendmail', [GeneralController::class, 'ReminderMailFunc']);
Route::get('/putcontact/{id}', [GeneralController::class, 'addContacts']);
Route::get('/contacts', [GeneralController::class, 'getContacts']);
Route::resource('/tickets', TicketController::class);

// Route::resource('/users', UserController::class);
// Route::get('/users/{id}', [UserController::class, 'show']);
// Route::resource('/users', [UserController::class, 'index']);
// Route::get('/', 'UserController@index');
// Route::resource('/users', 'UserController');
