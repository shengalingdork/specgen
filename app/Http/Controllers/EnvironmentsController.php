<?php

namespace App\Http\Controllers;

use App\Environment;
use Illuminate\Http\Request;

class EnvironmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Environment::all()->keyBy('id');
    }

    public function store(Request $request)
    {
        $id = Environment::create(['name' => $request->environment])->id;
        return response()->json(['name' => $request->environment, 'id' => $id]);
    }

    public function destroy($id)
    {
        Environment::destroy($id);
        return response()->json(['id' => $id]);
    }
}
