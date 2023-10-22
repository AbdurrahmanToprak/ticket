<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
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

        return to_route('permission_index');
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
        $permission = Permission::where('id',$id)->first();
        return view('superadmin.permissions.edit',compact('permission'));
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
        $permission = Permission::find($request->id);

        $permission->name = $request->name;

        $permission->save();
        return redirect()->route('permission_index')->with('success','İzin başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $permission =   Permission::find($id);
        $permission->delete();
        return to_route('permission_index')->with('delete','İzin başarıyla silindi.');
    }
}
