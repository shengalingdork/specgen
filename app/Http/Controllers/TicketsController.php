<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Ticket::all()->keyBy('id');
    }

    public function show($id)
    {
        return Ticket::find($id);
    }

    public function store(Request $request)
    {
        $id = Ticket::create([
            'name' => $request->ticketName,
            'description' => $request->ticketDescription || '',
            'release_id' => $request->releaseID
        ])->id;

        return redirect()->route('getCompilerForSpecificRelease', ['releaseID' => $request->releaseID]);
    }

    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        $ticket->description = $request->ticketDescription;

        $ticket->save();

        return redirect()->route(
            'getInstructionsByReleaseAndTicket', 
            [
                'releaseID' => $ticket->release_id ,
                'ticketID' => $ticket->id
            ]
        );
    }

    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        
        Ticket::destroy($id);

        return redirect()->route('getCompilerForSpecificRelease', ['releaseID' => $ticket->release_id]);
    }

    public function getTicketsPerRelease()
    {
        return Ticket::all()->groupBy('release_id');
    }
}
