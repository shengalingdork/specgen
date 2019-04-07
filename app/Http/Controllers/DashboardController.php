<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $projectController = new ProjectsController();
        $projects = $projectController->index();

        $teammateController = new TeammatesController();
        $developers = $teammateController->getDevelopers();
        $testers = $teammateController->getTesters();

        $workingGroupController = new WorkingGroupsController();
        $workingGroups = $workingGroupController->index();

        $environmentController = new EnvironmentsController();
        $environments = $environmentController->index();

        $supportTeamController = new SupportTeamsController();
        $supportTeams = $supportTeamController->index();

        return view(
            'layouts.pages.admin',
            compact(
                'projects',
                'developers',
                'testers',
                'environments',
                'supportTeams',
                'workingGroups'
            )
        );
    }
}
