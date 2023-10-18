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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/admin/show', function () {
        return view('admin.pages.show');
    })->name('show');
    Route::get('/index',[TicketController::class,'index'])->name('ticket_index');
    Route::get('/create',[TicketController::class,'create'])->name('ticket_create');
    Route::get('/show',[TicketController::class,'show'])->name('ticket_show');
});
