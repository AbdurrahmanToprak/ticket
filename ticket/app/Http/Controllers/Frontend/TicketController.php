<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Level;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loggedInName = Auth::user()->name;
        $id = Auth::user()->id;
        $departments = Department::all();
        $tickets = Ticket::query()->where('user_id',$id)->latest('updated_at')->paginate(2);
       // $tickets = Ticket::query()->get();

        return view('front.ticketPage.index',compact('tickets','loggedInName','departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $levels =  Level::all();
        return view('front.ticketPage.create',compact('departments','levels'));
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

        return redirect()->route('ticket_index')->with('success','kaydedildi');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ticket = Ticket::where('id',$id)->first();
        //$note = Note::find($uuid);

        /*     if($tickets->user_id != Auth::user()->id)
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
        //$ticket = Ticket::where('uuid',$uuid)->first();
        $ticket = Ticket::find($id);
        $departments = Department::all();
        return view('front.ticketPage.edit',compact('ticket','departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate(
            [
                'subject' => 'required',
                'content' => 'required',
            ],
            [
                'title.required' => 'başlık alanı gereklidir.',
                'content.required' => 'içerik alanı gereklidir.',
            ]
        );
        $ticket = Ticket::find($request->id);
        $ticket->department_id = $request->department_id;
        $ticket->subject = $request->subject;
        $ticket->message = $request->message;
        $ticket->save();
        return redirect()->route('ticket_index')->with('success','Talebiniz başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return redirect()->route('ticket_index')->with('delete','Talebiniz başarıyla silindi.');
    }
}
