<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompilerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $releasesController = new ReleasesController();
        $latestRelease = $releasesController->getLatest();
        $releaseListByProject = $releasesController->getReleaseListByProject();
        $releaseListByWorkingGroup = $releasesController->getReleaseListByWorkingGroup();
        $projectListOfReleases = $releasesController->getProjectListOfReleases();
        $workingGroupListOfReleases = $releasesController->getWorkingGroupListOfReleases();
        $releases = $releasesController->index();

        $projectController = new ProjectsController();
        $projects = $projectController->index();

        $workingGroupsController = new WorkingGroupsController();
        $workingGroups = $workingGroupsController->index();

        $supportTeamsController = new SupportTeamsController();
        $supportTeams = $supportTeamsController->index();

        $teammatesController = new TeammatesController();
        $developers = $teammatesController->getDevelopers();
        $testers = $teammatesController->getTesters();

        $environmentsController = new EnvironmentsController();
        $environments = $environmentsController->index();
    
        $ticketsController = new TicketsController();
        $tickets = $ticketsController->index();
        $ticketsPerRelease = $ticketsController->getTicketsPerRelease();

        $instructionsController = new InstructionsController();
        $instructionsPerRelease = $instructionsController->getInstructionsPerRelease();

        return view(
            'layouts.pages.compiler',
            compact(
                'latestRelease',
                'releases',
                'releaseListByProject',
                'releaseListByWorkingGroup',
                'projectListOfReleases',
                'workingGroupListOfReleases',
                'projects',
                'workingGroups',
                'supportTeams',
                'developers',
                'testers',
                'environments',
                'tickets',
                'ticketsPerRelease',
                'instructionsPerRelease'
            )
        );
    }

    public function show($releaseID)
    {
        $releasesController = new ReleasesController();
        $specificRelease = $releasesController->show($releaseID);

        if (is_null($specificRelease)) {
            return redirect('compiler');
        }

        $releaseListByProject = $releasesController->getReleaseListByProject();
        $releaseListByWorkingGroup = $releasesController->getReleaseListByWorkingGroup();
        $projectListOfReleases = $releasesController->getProjectListOfReleases();
        $workingGroupListOfReleases = $releasesController->getWorkingGroupListOfReleases();
        $releases = $releasesController->index();

        $projectController = new ProjectsController();
        $projects = $projectController->index();

        $workingGroupsController = new WorkingGroupsController();
        $workingGroups = $workingGroupsController->index();

        $supportTeamsController = new SupportTeamsController();
        $supportTeams = $supportTeamsController->index();

        $teammatesController = new TeammatesController();
        $developers = $teammatesController->getDevelopers();
        $testers = $teammatesController->getTesters();

        $environmentsController = new EnvironmentsController();
        $environments = $environmentsController->index();

        $ticketsController = new TicketsController();
        $tickets = $ticketsController->index();
        $ticketsPerRelease = $ticketsController->getTicketsPerRelease();

        $instructionsController = new InstructionsController();
        $instructionsPerRelease = $instructionsController->getInstructionsPerRelease();

        return view(
            'layouts.pages.compiler',
            compact(
                'specificRelease',
                'releases',
                'releaseListByProject',
                'releaseListByWorkingGroup',
                'projectListOfReleases',
                'workingGroupListOfReleases',
                'projects',
                'workingGroups',
                'supportTeams',
                'developers',
                'testers',
                'environments',
                'tickets',
                'ticketsPerRelease',
                'instructionsPerRelease'
            )
        );
    }
}
