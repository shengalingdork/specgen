<div class="row mt-4">
    <div class="col">
        <div class="card border-light mb-3" style="max-width: 40rem;">
            <div class="card-header"><h5>Support Teams</h5></div>
            <div class="card-body">
                <ul id="stList" class="list-group">
                    @foreach ($supportTeams as $supportTeam)
                        <li id="{{ $supportTeam->id }}" class="list-group-item">
                            <div class="row">
                                <div class="col">
                                    {{ $supportTeam->name }}
                                    <div class="float-right">
                                        <button id="deleteSupportTeam" class="btn btn-danger btn-outline-danger btn-sm">
                                            <span class="oi oi-trash"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    <li class="list-group-item">
                        <form class="addSupportTeam" method="POST">
                            <input type="hidden" name="_token"  value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Add support team" name="supportTeam" id="inputST" required>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
