<?php

namespace App\Http\Controllers;

use App\SupportTeam;
use Illuminate\Http\Request;

class SupportTeamsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return SupportTeam::all()->keyBy('id');
    }

    public function store(Request $request)
    {
        $id = SupportTeam::create(['name' => $request->supportTeam])->id;
        return response()->json(['name' => $request->supportTeam, 'id' => $id]);
    }

    public function destroy($id)
    {
        SupportTeam::destroy($id);
        return response()->json(['id' => $id]);
    }
}
