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

// Route::get('/', ['middleware' => ['ipcheck'], function () {
//     // your routes here
// }]);

Route::resource('/users', UserController::class)->middleware('Cors');

// Ticket
// Route::resource('/tickets', TicketController::class);
Route::get('/gettickets/{id}', [GeneralController::class, 'getTickets'])->middleware('Cors');
Route::post('/addticket', [GeneralController::class, 'addTicket'])->middleware('Cors');
Route::put('/putticket/{id}', [GeneralController::class, 'updateTicket'])->middleware('Cors');

// Contact
Route::get('/contacts', [GeneralController::class, 'getContacts'])->middleware('Cors');
Route::post('/addcontact', [GeneralController::class, 'addcontact'])->middleware('Cors');
Route::post('/importContacts', [GeneralController::class, 'importContacts'])->middleware('Cors');
Route::put('/putcontact/{id}', [GeneralController::class, 'updateContact'])->middleware('Cors');

// Mail
Route::put('/sendmail/{id}', [GeneralController::class, 'ReminderMailFunc'])->middleware('Cors');

