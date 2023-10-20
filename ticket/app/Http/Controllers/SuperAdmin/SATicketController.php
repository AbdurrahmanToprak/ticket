<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

        $user = Ticket::query()->where('user_id');
        return view('superadmin.ticket.index',compact('tickets','loggedInName'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.ticketPage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket = new Ticket;
        $ticket->user_id = Auth::user()->id;
        $ticket->department = $request->department;
        $ticket->level = $request->level;
        //  $ticket->name = $request->name;
        $ticket->subject = $request->subject;
        $ticket->message = $request->message;
        $ticket->uuid = Str::uuid();
        $ticket->save();

        return redirect()->route('admin_ticket_index')->with('success','kaydedildi');

    }

    /**
     * Display the specified resource.
     */
    public function show($uuid)
    {
        $ticket = Ticket::where('uuid',$uuid)->first();
        //$note = Note::find($uuid);

        /*     if($ticket->user_id != Auth::user()->id)
             {
                 abort(403);
             }*/
        return view('front.ticketPage.show',compact('ticket'));
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


