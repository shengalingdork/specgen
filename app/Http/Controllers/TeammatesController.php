<?php

namespace App\Http\Controllers;

use App\Teammate;
use Illuminate\Http\Request;

class TeammatesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Teammate::all()->keyBy('id');
    }

    public function store(Request $request)
    {
        $id = Teammate::create([
                'name' => $request->teammate,
                'role' => $request->role
                ])
            ->id;
        return response()->json(['name' => $request->teammate, 'id' => $id]);
    }

    public function getDevelopers()
    {
        return Teammate::where('role', '=', 'DEV')->get();
    }

    public function getTesters()
    {
        return Teammate::where('role', '=', 'QA')->get();
    }

    public function destroy($id)
    {
        Teammate::destroy($id);
        return response()->json(['id' => $id]);
    }
}
