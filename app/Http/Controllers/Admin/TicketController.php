<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('s')) {
        $tickets  = Search::add(Ticket::class, ['title', 'content' , 'note'])
            ->beginWithWildcard()
            ->orderBy('status')
            ->orderByDesc('updated_at')
            ->paginate(20)
            ->search($request->get('s'));   
        }
        else
        {
            $tickets = Ticket::orderBy('status')->orderByDesc('updated_at')->paginate(20);
        }

        return view('admin.tickets.index', ['tickets' => $tickets]);
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'min:10', 'max:255'],
            'content' => ['required', 'string', 'min:20', 'max:2000'],
        ]);

        $ticket = new Ticket;
        $ticket->title = strip_tags($request->title);
        $ticket->content = $request->content;
        $ticket->user_id = auth()->user()->id;
        $ticket->save();
        return redirect(route('admin.tickets.show', $ticket->id))->with('ticket-created', '');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('admin.tickets.show', ['ticket' => $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect(route('admin.tickets.index'))->with('ticket-destroyed', '');
    }
}
