@extends('layouts.elements.app')

@section('content')
<div class="card bg-light mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col"><h3>Change Document - Note Generator</h3></div>
            @if (!$projects->isEmpty())
                <div class="col">
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addReleaseModal">
                            <span class="oi oi-plus"></span> Add Release
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="card-body">
        @if ($projects->isEmpty())
            <div class="alert alert-info">
              <strong>Get started!</strong> Ask an administrator to add a project for your release.
            </div>
        @elseif (empty($latestRelease) && empty($specificRelease))
            <div class="alert alert-info">
              Add a release for your special instructions.
            </div>
        @else
            <div class="row">
                <div class="col-3">@include('layouts.compiler.sidenav')</div>
                <div class="col-9">@include('layouts.compiler.releases')</div>
            </div>
        @endif
    </div>
</div>

<div id="addReleaseModal" class="modal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/release" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-header">
                    <h4 class="modal-title">Add a Release</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <label class="col-form-label">Working Group</label>
                        <select class="custom-select" name="workingGroupID" required>
                            <option selected value="">Choose working group</option>
                            @foreach ($workingGroups as $workingGroup)
                            <option value="{{ $workingGroup->id }}">{{ $workingGroup->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <label class="col-form-label">Project</label>
                        <select class="custom-select" name="projectID" required>
                            <option selected value="">Choose project</option>
                            @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <label class="col-form-label">Release #</label>
                        <input type="text" class="form-control" placeholder="ex. 19.0.1" name="releaseName" required>
                    </div>
                    <div class="form-row">
                        <label class="col-form-label">Start Deployment Date & Time</label>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <input type="date" class="form-control" name="startDate" required>
                                </div>
                                <div class="col">
                                    <input type="time" class="form-control" name="startTime" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-form-label">End Deployment Date & Time</label>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <input type="date" class="form-control" name="endDate" required>
                                </div>
                                <div class="col">
                                    <input type="time" class="form-control" name="endTime" required>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="editReleaseModal" class="modal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/release/" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input name="_method" type="hidden" value="PUT">
                <div class="modal-header">
                    <h4 class="modal-title">Edit a Release</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <label class="col-form-label">Working Group</label>
                        <select class="custom-select" id="selectWG" name="workingGroupID" required>
                            @foreach ($workingGroups as $workingGroup)
                            <option value="{{ $workingGroup->id }}">{{ $workingGroup->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <label class="col-form-label">Project</label>
                        <select class="custom-select" id="selectProject" name="projectID" required>
                            @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <label class="col-form-label">Release #</label>
                        <input type="text" class="form-control" placeholder="ex. 19.0.1" id="releaseName" name="releaseName" required>
                    </div>
                    <div class="form-row">
                        <label class="col-form-label">Start Deployment Date & Time</label>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <input type="date" class="form-control" id="startDate" name="startDate" required>
                                </div>
                                <div class="col">
                                    <input type="time" class="form-control" id="startTime" name="startTime" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-form-label">End Deployment Date & Time</label>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <input type="date" class="form-control" id="endDate" name="endDate" required>
                                </div>
                                <div class="col">
                                    <input type="time" class="form-control" id="endTime" name="endTime" required>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="deleteReleaseModal" class="modal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST">
                <input name="_method" type="hidden" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-header">
                    <h4 class="modal-title delete"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this release?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes, delete release</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


