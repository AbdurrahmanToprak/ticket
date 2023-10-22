<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('superadmin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = $request->validate(
            [
                'name' => ['required' , 'min:3']
            ],
            [
                'name.min'=>'Rol adı en az 3 haneli olmalıdır.',
                'name.required' => 'Rol adı boş bırakılamaz.'
            ]);
        Role::create($role);

        return to_route('role_index');
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
    public function edit($id)
    {
        $role = Role::where('id',$id)->first();
        return view('superadmin.roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate(
            [
                'name' => ['required' , 'min:3']
            ],
            [
                'name.min'=>'Rol adı en az 3 haneli olmalıdır.',
                'name.required' => 'Rol adı boş bırakılamaz.'
            ]);
        $role = Role::find($request->id);

        $role->name = $request->name;

        $role->save();
        return redirect()->route('role_index')->with('success','Rol başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
