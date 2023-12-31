<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('superadmin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('superadmin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->validate(
            [
                'name' => ['required' , 'min:3'],
                'email' => ['required' , 'email'],
                'password' => ['required', 'min:8']
            ],
            [
                'name.min'=>'Kullanıcı adı en az 3 karakter olmalıdır.',
                'name.required' => 'Kullanıcı adı boş bırakılamaz.',
                'email.required' => 'E-mail alanı boş bırakılamaz.',
                'email.email' => 'Lütfen geçerli e-mail adresi giriniz.',
                'password.required' => 'Şifre alanı boş bırakılamaz.',
                'password.min' => 'Şifre en az 8 karakter olmalıdır.',
            ]
        );
        User::create($user);

        return to_route('superadmin.users.index')->with('success','Kullanıcı başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('superadmin.users.role',compact('user','roles','permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

        $roles = Role::all();

        return view('superadmin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $users = $request->validate(
            [
                'name' => ['required' , 'min:3'],
                'email' => ['required' , 'email'],
                'password' => ['required', 'min:8']
            ],
            [
                'name.min'=>'Rol adı en az 3 haneli olmalıdır.',
                'name.required' => 'Rol adı boş bırakılamaz.',
                'email.required' => 'E-mail alanı boş bırakılamaz.',
                'email.email' => 'Lütfen geçerli e-mail adresi giriniz.',
                'password.required' => 'Şifre alanı boş bırakılamaz.',
                'password.min' => 'Şifre en az 8 karakter olmalıdır.',
            ]);
        $user->update($users);

        return to_route('superadmin.users.index')->with('success','Kullanıcı bilgileri başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('superadmin.users.index')->with('delete','Kullanıcı başarıyla silindi.');
    }

    //Permission
    public function givePermission(Request $request, User $user)
    {
        if($user->hasPermissionTo($request->permission)){
            return back()->with('delete','İzin zaten verilmiş.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('success','İzin başarıyla eklendi.');
    }
    public function revokePermission(User $user, Permission $permission)
    {
        if($user->hasPermissionTo($permission)){
            $user->revokePermissionTo($permission);
            return back()->with('success','İzin başarıyla çıkarıldı.');
        }
        return back()->with('delete','İzin çıkarılamadı.');
    }

    //Role
    public function assignRole(Request $request, User $user)
    {
        if($user->hasRole($request->role)){
            return back()->with('delete','Rol zaten verilmiş.');
        }
        $user->assignRole($request->role);
        return back()->with('success','Rol başarıyla eklendi.');
    }
    public function removeRole(User $user, Role $role)
    {
        if($user->hasRole($role)){
            $user->removeRole($role);
            return back()->with('success','Rol başarıyla çıkarıldı.');
        }
        return back()->with('delete','Rol çıkarılamadı.');
    }
}
