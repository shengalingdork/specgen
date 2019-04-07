<div class="row mt-4">
    <div class="col">
        <div class="card border-light mb-3" style="max-width: 40rem;">
          <div class="card-header"><h5>Developers</h5></div>
          <div class="card-body">
            <ul id="devList" class="list-group teammatesList">
                @foreach ($developers as $developer)
                    <li id="{{ $developer->id }}" class="list-group-item">
                        <div class="row">
                            <div class="col">
                                {{ $developer->name }}
                                <div class="float-right">
                                    <button id="deleteTeammate" class="btn btn-danger btn-outline-danger btn-sm">
                                        <span class="oi oi-trash"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
                <li class="list-group-item">
                    <form class="addDeveloper" method="POST">
                        <input id="_token" type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Add developer" name="teammate" id="inputDEV" required>
                                <input type="hidden" name="role" value="DEV">
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
          </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-light mb-3" style="max-width: 40rem;">
          <div class="card-header"><h5>Testers</h5></div>
          <div class="card-body">
            <ul id="qaList" class="list-group teammatesList">
                @foreach ($testers as $tester)
                    <li id="{{ $tester->id }}" class="list-group-item">
                        <div class="row">
                            <div class="col">
                                {{ $tester->name }}
                                <div class="float-right">
                                    <button id="deleteTeammate" class="btn btn-danger btn-outline-danger btn-sm">
                                        <span class="oi oi-trash"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
                <li class="list-group-item">
                    <form class="addTester" method="POST">
                        <input id="_token" type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Add tester" name="teammate" id="inputQA" required>
                                <input type="hidden" name="role" value="QA">
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
          </div>
        </div>
    </div>
</div>
