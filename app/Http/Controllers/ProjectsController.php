<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Project::all()->keyBy('id');
    }

    public function store(Request $request)
    {
        Project::create([
                'name' => $request->projectName,
                'repo_link' => $request->projectRepo ?: null,
                'db_name' => $request->projectDatabase ?: null,
                'db_repo_link' => $request->projectDatabaseRepo ?: null
            ]);
        
        return redirect('dashboard');
    }

    public function show($id)
    {
        return Project::find($id);
    }

    public function update(Request $request, Project $projects, $id)
    {
        $project = Project::findOrFail($id);

        $project->name = $request->projectName;
        $project->repo_link = $request->projectRepo;
        $project->db_name = $request->projectDatabase;
        $project->db_repo_link = $request->projectDatabaseRepo;

        $project->save();

        return redirect('dashboard');
    }

    public function destroy(Project $projects, $id)
    {
        Project::destroy($id);
        return redirect('dashboard');
    }
}
