<?php

use App\Http\Controllers\Frontend\TicketController;
use App\Http\Controllers\SuperAdmin\PermissionController;
use App\Http\Controllers\SuperAdmin\SARegisterController;
use App\Http\Controllers\SuperAdmin\RoleController;
use App\Http\Controllers\SuperAdmin\SATicketController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\UserController;
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
Route::middleware(['auth','role:Super-Admin'])->name('superadmin.')->prefix('superadmin')->group(function (){

    Route::get('/', [SuperAdminController::class,'index'])->name('index');

    Route::resource('/tickets',SATicketController::class);
    Route::delete('/tickets/{ticket}' , [SATicketController::class , 'destroy'])->name('tickets.destroy');
    Route::resource('/users', UserController::class);
    Route::delete('/users/{user}' , [UserController::class , 'destroy'])->name('users.destroy');
    Route::get('/users/{user}', [UserController::class,'show'])->name('users.show');
    Route::post('/users/{user}/permissions' , [UserController::class , 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}' , [UserController::class , 'revokePermission'])->name('users.permissions.revoke');
    Route::post('/users/{user}/roles' , [UserController::class , 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}' , [UserController::class , 'removeRole'])->name('users.roles.remove');


  /*  Route::get('/users/register', [SARegisterController::class,'create'])->name('user_create');
    Route::post('/users/store',[TicketController::class,'store'])->name('user_store');
    Route::get('/users/register/edit/{id}', [SARegisterController::class,'edit'])->name('user_edit');
    Route::get('/delete/{id}',[TicketController::class,'destroy'])->name('user_delete');
*/
    Route::resource('/roles', RoleController::class);
  /*  Route::get('/roles/create', [RoleController::class,'create'])->name('role_create');
    Route::post('/roles/store', [RoleController::class,'store'])->name('role_store');
    Route::get('/roles/edit/{id}', [RoleController::class,'edit'])->name('role_edit');
    Route::post('/roles/update', [RoleController::class,'update'])->name('role_update');
    Route::get('/roles/delete/{id}', [RoleController::class,'destroy'])->name('role_delete');
*/
    Route::resource('/permissions', PermissionController::class);
  /*  Route::get('/permissions/create', [PermissionController::class,'create'])->name('permission_create');
    Route::post('/permissions/store', [PermissionController::class,'store'])->name('permission_store');
    Route::get('/permissions/edit/{id}', [PermissionController::class,'edit'])->name('permission_edit');
    Route::post('/permissions/update', [PermissionController::class,'update'])->name('permission_update');
    Route::get('/permissions/delete/{id}', [PermissionController::class,'destroy'])->name('permission_delete');
  */
    Route::post('/role/{role}/permissions' , [RoleController::class , 'givePermission'])->name('roles.permissions');
    Route::delete('/role/{role}/permissions/{permission}' , [RoleController::class , 'revokePermission'])->name('roles.permissions.revoke');
    Route::post('/permission/{permission}/roles' , [PermissionController::class , 'assignRole'])->name('permissions.roles');
    Route::delete('/permission/{permission}/roles/{role}' , [PermissionController::class , 'removeRole'])->name('permissions.roles.remove');

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
