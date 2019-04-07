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
            'release_id' => $request->releaseID
        ])->id;

        return response()->json([
            'name' => $request->ticketName,
            'id' => $id,
            'releaseID' => $request->releaseID
        ]);
    }

    public function destroy($id)
    {
        Ticket::destroy($id);
        return response()->json(['id' => $id]);
    }

    public function getTicketsPerRelease()
    {
        return Ticket::all()->groupBy('release_id');
    }
}
