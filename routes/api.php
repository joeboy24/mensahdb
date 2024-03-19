<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\GeneralController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/users', UserController::class);

// Ticket
// Route::resource('/tickets', TicketController::class);
Route::get('/gettickets/{id}', [GeneralController::class, 'getTickets']);
Route::post('/addticket', [GeneralController::class, 'addTicket']);
Route::put('/putticket/{id}', [GeneralController::class, 'updateTicket']);

// Contact
Route::get('/contacts', [GeneralController::class, 'getContacts']);
Route::post('/addcontact', [GeneralController::class, 'addcontact']);
Route::put('/putcontact/{id}', [GeneralController::class, 'updateContact']);

// Mail
Route::put('/sendmail/{id}', [GeneralController::class, 'ReminderMailFunc']);

