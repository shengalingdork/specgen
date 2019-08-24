<?php

namespace App\Http\Controllers;

use App\Release;
use App\Project;
use App\WorkingGroup;
use Illuminate\Http\Request;

class ReleasesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Release::all()->keyBy('id');
    }

    public function show($id)
    {
        return Release::find($id);
    }

    public function getLatest()
    {
        return Release::orderby('created_at', 'desc')->first();
    }

    public function getReleaseListByProject()
    {
        $releases = array();

        $projectIDs = Project::pluck('id');
        foreach ($projectIDs as $projectID) {
            $release = Release::where('project_id', $projectID)->get();
            if (count($release)) {
              $releases[$projectID] = $release;
            }
        }

        return $releases;
    }

    public function getReleaseListByWorkingGroup()
    {
        $releases = array();

        $wgIDs = WorkingGroup::pluck('id');
        $projectIDs = Project::pluck('id');

        foreach ($wgIDs as $wgID) {
            foreach ($projectIDs as $projectID) {
                $release = Release::where([
                    ['working_group_id', '=', $wgID],
                    ['project_id', '=', $projectID],
                    ])->get();
                if (count($release)) {
                  $releases[$wgID][$projectID] = $release;
                }
            }
        }

        return $releases;
    }

    public function getProjectListOfReleases()
    {
      return Release::groupBy('project_id')->pluck('project_id');
    }

    public function getWorkingGroupListOfReleases()
    {
      return Release::groupBy('working_group_id')->pluck('working_group_id');
    }

    public function store(Request $request)
    {
        Release::create([
                'name' => $request->releaseName,
                'working_group_id' => $request->workingGroupID,
                'project_id' => $request->projectID,
                'start_deployment' => $request->startDate . ' ' . $request->startTime,
                'end_deployment' => $request->endDate . ' ' . $request->endTime,
                'type_of_service' => 'Bug fix',
                'downtime_req' => 'No',
                'business_hours' => 'No'
            ]);

        return redirect('compiler');
    }

    public function update(Request $request, $id)
    {
        $release = Release::findOrFail($id);

        $release->name = $request->releaseName;
        $release->working_group_id = $request->workingGroupID;
        $release->project_id = $request->projectID;
        $release->start_deployment = $request->startDate . ' ' . $request->startTime;
        $release->end_deployment = $request->endDate . ' ' . $request->endTime;

        $release->save();

        return redirect()->route('getCompilerForSpecificRelease', ['releaseID' => $id]);
    }

    public function updateRiskAndAssessment(Request $request, $id)
    {
        $release = Release::findOrFail($id);

        if ($request->typeOfService) {
            $release->type_of_service = $request->typeOfService;
        } else if ($request->downtimeReq) {
            $release->downtime_req = $request->downtimeReq;
        } else {
            $release->business_hours = $request->businessHours;
        } 

        $release->save();

        return $release;
    }

    public function destroy($id)
    {
        Release::destroy($id);
        return redirect('compiler');
    }
}
