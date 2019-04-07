<?php

namespace App\Http\Controllers;

use App\Instruction;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class InstructionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Instruction::all()->keyBy('id');
    }

    public function show($id)
    {
        return Instruction::find($id);
    }

    public function store(Request $request)
    {
        Instruction::create([
            'release_id' => $request->releaseID,
            'ticket_id' => $request->ticketID,
            'support_team_id' => $request->supportTeamID,
            'environment_id' => $request->environmentID,
            'instruction' => $request->instruction,
            'db_code_review_link' => $request->dbCodeReviewLink ?: null,
            'db_affected_core_table' => $request->dbCoreTables ?: null,
            'db_revision_num' => $request->dbRevisionNum ?: null
        ]);

        return redirect()->route(
            'getInstructionsByReleaseAndTicket', 
            [
                'releaseID' => $request->releaseID ,
                'ticketID' => $request->ticketID
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $instruction = Instruction::findOrFail($id);

        $instruction->support_team_id = $request->supportTeamID;
        $instruction->environment_id = $request->environmentID;
        $instruction->instruction = $request->instruction;
        $instruction->db_code_review_link = $request->dbCodeReviewLink ?: null;
        $instruction->db_affected_core_table = $request->dbCoreTables ?: null;
        $instruction->db_revision_num = $request->dbRevisionNum ?: null;

        $instruction->save();

        return redirect()->route(
            'getInstructionsByReleaseAndTicket', 
            [
                'releaseID' => $instruction->release_id ,
                'ticketID' => $instruction->ticket_id
            ]
        );
    }

    public function destroy($id)
    {
        $instruction = Instruction::find($id);
        Instruction::destroy($id);

        return redirect()->route(
            'getInstructionsByReleaseAndTicket', 
            [
                'releaseID' => $instruction->release_id ,
                'ticketID' => $instruction->ticket_id
            ]
        );
    }

    public function getInstructionsPerRelease()
    {
        $releasesController = new ReleasesController();
        $releases = $releasesController->index();

        $instructions = array();
        foreach ($releases as $releaseID => $release) {
            $instructions[$releaseID] = Instruction::where('release_id', $releaseID)->get();
        }

        return $instructions;
    }

    public function getInstructionsByReleaseAndTicket($releaseID, $ticketID)
    {
        $releasesController = new ReleasesController();
        $release = $releasesController->show($releaseID);

        if (is_null($release)) {
            return redirect()->route('compiler');
        }

        $ticketsController = new TicketsController();
        $ticket = $ticketsController->show($ticketID);

        if (is_null($ticket)) {
            return redirect()->route('compiler');
        }

        $projectController = new ProjectsController();
        $supportTeamsController = new SupportTeamsController();
        $environmentsController = new EnvironmentsController();

        $project = $projectController->show($release->project_id);
        $supportTeams = $supportTeamsController->index();
        $environments = $environmentsController->index();

        $instructions = Instruction::where([
            ['release_id', '=', $releaseID],
            ['ticket_id', '=', $ticketID]
        ])->get();

        return view(
            'layouts.pages.instructions',
            compact(
                'instructions',
                'release',
                'ticket',
                'project',
                'supportTeams',
                'environments'
            )
        );
    }
}
