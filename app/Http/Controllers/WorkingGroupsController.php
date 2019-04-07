<?php

namespace App\Http\Controllers;

use App\WorkingGroup;
use Illuminate\Http\Request;

class WorkingGroupsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return WorkingGroup::all()->keyBy('id');
    }

    public function store(Request $request)
    {
        $id = WorkingGroup::create(['name' => $request->workingGroup])->id;
        return response()->json(['name' => $request->workingGroup, 'id' => $id]);
    }

    public function destroy($id)
    {
        WorkingGroup::destroy($id);
        return response()->json(['id' => $id]);
    }
}
