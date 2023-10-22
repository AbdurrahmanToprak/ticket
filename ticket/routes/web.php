<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\TicketController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\AdminTicketController;
use App\Http\Controllers\SuperAdmin\SATicketController;
use App\Http\Controllers\SuperAdmin\RoleController;
use App\Http\Controllers\SuperAdmin\PermissionController;
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
Route::middleware(['auth','role:Super-Admin'])->prefix('superadmin')->group(function (){
    Route::get('/', function(){
        return view('superadmin.index');
    })->name('superadmin_index');
    Route::get('/tickets/index', [SATicketController::class,'index'])->name('superadmin_ticket_index');
    Route::get('/users', [RegisterController::class,'index'])->name('user_index');
    Route::get('/users/register', [RegisterController::class,'create'])->name('user_create');
    Route::post('/users/store',[TicketController::class,'store'])->name('user_store');
    Route::get('/users/register/edit/{id}', [RegisterController::class,'edit'])->name('user_edit');
    Route::get('/delete/{id}',[TicketController::class,'destroy'])->name('user_delete');
    Route::get('/roles', [RoleController::class,'index'])->name('role_index');
    Route::get('/roles/create', [RoleController::class,'create'])->name('role_create');
    Route::post('/roles/store', [RoleController::class,'store'])->name('role_store');
    Route::get('/roles/edit/{id}', [RoleController::class,'edit'])->name('role_edit');
    Route::post('/roles/update', [RoleController::class,'update'])->name('role_update');
    Route::get('/permissions', [PermissionController::class,'index'])->name('permission_index');
    Route::get('/permissions/create', [PermissionController::class,'create'])->name('permission_create');
    Route::post('/permissions/store', [PermissionController::class,'store'])->name('permission_store');
    Route::get('/permissions/edit/{id}', [PermissionController::class,'edit'])->name('permission_edit');
    Route::post('/permissions/update', [PermissionController::class,'update'])->name('permission_update');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/index',[TicketController::class,'index'])->name('ticket_index');
    Route::get('/create',[TicketController::class,'create'])->name('ticket_create');
    Route::post('/store',[TicketController::class,'store'])->name('ticket_store');
    Route::get('/show/{uuid}',[TicketController::class,'show'])->name('ticket_show');
    Route::get('/edit/{uuid}',[TicketController::class,'edit'])->name('ticket_edit');
    Route::get('/delete/{uuid}',[TicketController::class,'destroy'])->name('ticket_delete');
});
