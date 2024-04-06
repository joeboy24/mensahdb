<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ContactController;
use App\Models\Contact;

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
    return 'Oops..! Nothing here to display';
    // return view('welcome');
});

Route::get('/addnewphones', [GeneralController::class, 'PhonesUploadFunc']);

Route::get('/unsubscribe', function () {
    // $contacts = Contact::all();
    // foreach ($contacts as $item) {
    //     $C = str_replace(' ', '', $item->phone);
    //     $C = str_replace('(', '', $C);
    //     $C = str_replace(')', '', $C);
    //     $item->phone = $C;
    //     $item->save();
    // }
    // return 'Done..!';
    return view('unsubscribe');
    // // return view('welcome');
});
Route::resource('/tickets', ContactController::class);
Route::get('/sendmail', [GeneralController::class, 'ReminderMailFunc']);
Route::put('/unsubscribe/{id}', [GeneralController::class, 'unsubscribe']);
// Route::get('/putcontact/{id}', [GeneralController::class, 'addContacts']);
// Route::get('/contacts', [GeneralController::class, 'getContacts']);
// Route::resource('/tickets', TicketController::class);

// Route::resource('/users', UserController::class);
// Route::get('/users/{id}', [UserController::class, 'show']);
// Route::resource('/users', [UserController::class, 'index']);
// Route::get('/', 'UserController@index');
// Route::resource('/users', 'UserController');
