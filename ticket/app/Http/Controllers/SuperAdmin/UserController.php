<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::all();

        return view('superadmin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
