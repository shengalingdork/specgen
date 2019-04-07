<div class="row mt-4">
    <div class="col">
        <div class="card border-light mb-3" style="max-width: 40rem;">
          <div class="card-header"><h5>Environments</h5></div>
          <div class="card-body">
            <ul id="envList" class="list-group">
                @foreach ($environments as $environment)
                    <li id="{{ $environment->id }}" class="list-group-item">
                        <div class="row">
                            <div class="col">
                                {{ $environment->name }}
                                <div class="float-right">
                                    <button id="deleteEnvironment" class="btn btn-danger btn-outline-danger btn-sm">
                                        <span class="oi oi-trash"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
                <li class="list-group-item">
                    <form class="addEnvironment" method="POST">
                        <input id="_token" type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Add environment" name="environment" id="inputENV" required>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
          </div>
        </div>
    </div>
</div>
