<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Level;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
class SATicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loggedInName = Auth::user()->name;
        // $id = Auth::user()->id;
        // $tickets = Ticket::query()->where('user_id',$id)->latest('updated_at')->paginate(2);
        $tickets = Ticket::query()->get();
        $departments = Department::all();
        $levels =  Level::all();
        $users = User::all();
        return view('superadmin.tickets.index',compact('tickets','loggedInName','departments','users','levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $levels =  Level::all();
        return view('superadmin.tickets.create',compact('departments','levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket = new Ticket;
        $ticket->user_id = Auth::user()->id;
        $ticket->department_id = $request->department_id;
        $ticket->level_id = $request->level_id;
        //  $tickets->name = $request->name;
        $ticket->subject = $request->subject;
        $ticket->message = $request->message;
        $ticket->uuid = Str::uuid();
        $ticket->save();

        return to_route('superadmin.tickets.index')->with('success','kaydedildi');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ticket = Ticket::query()->where('id',$id)->first();
        $departments = Department::all();
        $levels = Level::all();
        $users = User::all();
        return view('superadmin.tickets.show',compact('ticket','departments','levels','users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $tickets = $request->validate(
            [
                'level_id' => 'required' ,
            ],
            [
                'level_id.required' => 'seviye boş bırakılamaz.',
            ]);
        $ticket->level_id = $request->level_id ;
        $ticket->update($tickets);

        return to_route('superadmin.tickets.index')->with('success','Talep başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return to_route('superadmin.tickets.index')->with('delete','Talep başarıyla silindi.');
    }
}


