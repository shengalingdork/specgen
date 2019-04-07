<div class="row mt-4">
    <div class="col">
        <div class="card border-light mb-3" style="max-width: 40rem;">
          <div class="card-header"><h5>Working Groups</h5></div>
          <div class="card-body">
            <ul id="wgList" class="list-group workingGroupsList">
                @foreach ($workingGroups as $workingGroup)
                    <li id="{{ $workingGroup->id }}" class="list-group-item">
                        <div class="row">
                            <div class="col">
                                {{ $workingGroup->name }}
                                <div class="float-right">
                                    <button id="deleteWorkingGroup" class="btn btn-danger btn-outline-danger btn-sm">
                                        <span class="oi oi-trash"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
                <li class="list-group-item">
                    <form class="addWorkingGroup" method="POST">
                        <input id="_token" type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Add working group" name="workingGroup" id="inputWG" required>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
          </div>
        </div>
    </div>
</div>
