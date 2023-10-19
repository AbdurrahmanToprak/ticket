<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\TicketController;
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


Route::get('/', function () {
    return view('welcome');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/admin/show', function () {
        return view('admin.pages.show');
    })->name('show');
    Route::get('/index',[TicketController::class,'index'])->name('ticket_index');
    Route::get('/create',[TicketController::class,'create'])->name('ticket_create');
    Route::post('/store',[TicketController::class,'store'])->name('ticket_store');
    Route::get('/show/{uuid}',[TicketController::class,'show'])->name('ticket_show');
    Route::get('/edit/{uuid}',[TicketController::class,'edit'])->name('ticket_edit');
    Route::get('/delete/{uuid}',[TicketController::class,'destroy'])->name('ticket_delete');
});
