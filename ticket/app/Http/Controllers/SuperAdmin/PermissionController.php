<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('superadmin.permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permission = $request->validate(
            [
                'name' => ['required' , 'min:3']
            ],
            [
                'name.min'=>'İzin adı en az 3 haneli olmalıdır.',
                'name.required' => 'İzin adı boş bırakılamaz.'
            ]);
        Permission::create($permission);

        return to_route('superadmin.permissions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        $roles = Role::all();
        return view('superadmin.permissions.edit',compact('permission','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Permission $permission)
    {
        $permissions = $request->validate(
            [
                'name' => ['required' , 'min:3']
            ],
            [
                'name.min'=>'Rol adı en az 3 haneli olmalıdır.',
                'name.required' => 'Rol adı boş bırakılamaz.'
            ]);
        $permission->update($permissions);

        return to_route('superadmin.permissions.index')->with('success','İzin başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {

        $permission->delete();
        return back()->with('delete','İzin başarıyla silindi.');
    }
    public function assignRole(Request $request, Permission $permission)
    {
        if($permission->hasRole($request->role)){
            return back()->with('delete','Rol zaten verilmiş.');
        }
        $permission->assignRole($request->role);
        return back()->with('success','Rol başarıyla eklendi.');
    }
    public function removeRole(Permission $permission, Role $role)
    {
        if($permission->hasRole($role)){
            $permission->removeRole($role);
            return back()->with('success','Rol başarıyla çıkarıldı.');
        }
        return back()->with('delete','Rol çıkarılamadı.');
    }

}
