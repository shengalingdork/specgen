<div class="container">
    <div class="row mt-3">
        <div class="col">
            <div class="float-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProjectModal">
                    <span class="oi oi-plus"></span> ADD
                </button>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <table class="table">
            <thead class="table-primary">
                <tr>
                    <th>Project</th>
                    <th>Release Package Location</th>
                    <th>Database</th>
                    <th>Database Release Package Location</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr id="{{ $project->id }}">
                    <td>{{ $project->name }}</td>
                    <td style="word-break:break-word"><small>{{ $project->repo_link }}</small></td>
                    <td>{{ $project->db_name }}</td>
                    <td style="word-break:break-word"><small>{{ $project->db_repo_link }}</small></td>
                    <td>
                        <button id="editProjectButton" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editProjectModal">
                            <span class="oi oi-pencil"></span>
                        </button>
                    </td>
                    <td>
                        <button id="deleteProjectButton" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteProjectModal">
                            <span class="oi oi-trash"></span>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="addProjectModal" class="modal bd-example-modal-lg" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/project" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-header">
                    <h4 class="modal-title">Add a Project</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <label class="col-form-label">Name</label>
                        <input type="text" class="form-control" placeholder="ex. TNG" name="projectName" required>
                    </div>
                    <div class="form-row">
                        <label class="col-form-label">Release Package Location</label>
                        <input type="text" class="form-control" name="projectRepo"
                                placeholder="ex. https://svn.cup.cam.ac.uk/repos/OnlineContent/anz/tng/go/branches/live/">
                    </div>
                    <div class="form-row">
                        <label class="col-form-label">Database Name</label>
                        <input type="text" class="form-control" placeholder="ex. tngdb" name="projectDatabase">
                    </div>
                    <div class="form-row">
                        <label class="col-form-label">Database Release Package Location</label>
                        <input type="text" class="form-control" name="projectDatabaseRepo"
                            placeholder="ex. https://svn.cup.cam.ac.uk/repos/OnlineContent/anz/tng/go/branches/live/SOURCE/databases/">
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

<div id="editProjectModal" class="modal bd-example-modal-lg" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="POST">
                <input name="_method" type="hidden" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-header">
                    <h4 class="modal-title">Edit a Project</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <label class="col-form-label">Name</label>
                        <input type="text" class="form-control name" placeholder="ex. TNG" name="projectName" required>
                    </div>
                    <div class="form-row">
                        <label class="col-form-label">Release Package Location</label>
                        <input type="text" class="form-control repo_link" name="projectRepo"
                               placeholder="ex. https://svn.cup.cam.ac.uk/repos/OnlineContent/anz/tng/go/branches/live/">
                    </div>
                    <div class="form-row">
                        <label class="col-form-label">Database Name</label>
                        <input type="text" class="form-control db_name" placeholder="ex. tngdb" name="projectDatabase">
                    </div>
                    <div class="form-row">
                        <label class="col-form-label">Database Release Package Location</label>
                        <input type="text" class="form-control db_repo_link" name="projectDatabaseRepo"
                               placeholder="ex. https://svn.cup.cam.ac.uk/repos/OnlineContent/anz/tng/go/branches/live/SOURCE/databases/">
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

<div id="deleteProjectModal" class="modal" tabindex="-1">
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
                    <p>Are you sure you want to delete the project?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes, delete project</button>
                </div>
            </form>
        </div>
    </div>
</div>
