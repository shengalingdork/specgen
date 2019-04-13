@php
    $project = $projects[$release->project_id];
    $tickets = isset($ticketsPerRelease[$release->id]) ? $ticketsPerRelease[$release->id] : collect();
@endphp

<div id="{{ $release->id }}" class="container release-content">
    <div class="row mt-3">
        <div class="col-md-5">
            <div class="card bg-light mb-3 ticketCard">
                <div class="card-header">
                    <h5>{{ $project->name }}-{{ $release->name }} Tickets</h5>
                </div>
                <div class="card-body">
                    <ul id="ticketsList{{ $release->id }}" class="list-group">
                        @foreach ($tickets as $ticket)
                            <li id="{{ $ticket->id }}" class="list-group-item">
                                <form class="deleteTicket" action="/ticket/{{ $ticket->id }}" method="POST">
                                    <input type="hidden" name="_token"  value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="releaseID" value="{{ $release->id }}">
                                    <div class="row">
                                        <div class="col-md-8">{{ $ticket->code }}</div>
                                        <div class="col-md-1">
                                            <a
                                                class="btn btn-secondary btn-sm"
                                                href="/release/{{ $release->id }}/ticket/{{ $ticket->id }}/instructions"
                                                role="button">
                                                <span class="oi oi-grid-two-up"></span>
                                            </a>
                                        </div>
                                            <div class="col-md-1">
                                                <button id="deleteTicket" class="btn btn-danger btn-sm">
                                                    <span class="oi oi-trash"></span>
                                                </button>
                                            </div>
                                    </div>
                                </form>
                            </li>
                        @endforeach
                        <li class="list-group-item">
                            <form class="addTicket" action="/ticket" method="POST">
                                <input type="hidden" name="_token"  value="{{ csrf_token() }}">
                                <input type="hidden" name="releaseID" value="{{ $release->id }}">
                                <div class="row">
                                    <div class="col">
                                        <input 
                                            id="inputTicket{{ $release->id }}" 
                                            type="text"
                                            class="form-control"
                                            placeholder="Add ticket (ex. SB-1)"
                                            name="ticketName"
                                            required>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-primary mb-7 optionsCard">
                <div class="card-header">
                    <h5>{{ $project->name }}-{{ $release->name }} Release Options</h5>
                </div>
                <div class="card-body">
                    <div class="card bg-light">
                        <div class="card-header"><h6>Risk and Assessment</h6></div>
                        <div class="card-body">
                            <small>
                                <table class="table table-sm table-light text-dark">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Type of Service</td>
                                            <td>
                                                <select class="custom-select typeOfService">
                                                    <option value="Bug fix" {{ $release->type_of_service === 'Bug fix' ? 'selected' : '' }}>
                                                        Bug fix
                                                    </option>
                                                    <option value="Enhancement" {{ $release->type_of_service === 'Enhancement' ? 'selected' : '' }}>
                                                        Enhancement
                                                    </option>
                                                    <option value="New service" {{ $release->type_of_service === 'New service' ? 'selected' : '' }}>
                                                        New service
                                                    </option>
                                                    <option value="New functionality" {{ $release->type_of_service === 'New functionality' ? 'selected' : '' }}>
                                                        New functionality
                                                    </option>
                                                    <option value="Decommission" {{ $release->type_of_service === 'Decommission' ? 'selected' : '' }}>
                                                        Decommission
                                                    </option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Downtime Requirement</td>
                                            <td>
                                                <select class="custom-select downtimeReq">
                                                    <option value="No" {{ $release->downtime_req === 'No' ? 'selected' : '' }}>No</option>
                                                    <option value="Yes, less than 30 min" {{ $release->downtime_req === 'Yes, less than 30 min' ? 'selected' : '' }}>Yes, less than 30 min</option>
                                                    <option value="Yes, more than 30 min" {{ $release->downtime_req === 'Yes, more than 30 min' ? 'selected' : '' }}>Yes, more than 30 min</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Within Business Hours</td>
                                            <td>
                                                <select class="custom-select businessHours">
                                                    <option value="No" {{ $release->business_hours === 'No' ? 'selected' : '' }}>No</option>
                                                    <option value="Yes" {{ $release->business_hours === 'Yes' ? 'selected' : '' }}>Yes</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </small>
                        </div>
                    </div>
                    <br>
                    <div class="card bg-light">
                        <div class="card-header"><h6>Actions</h6></div>
                        <div class="card-body text-center">
                            <button id="deleteReleaseButton" type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteReleaseModal">
                                <span class="oi oi-trash"></span> Delete Release
                            </button>
                            <button id="editReleaseButton" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editReleaseModal">
                                <span class="oi oi-pencil"></span> Edit Release
                            </button>
                            @if ($tickets->isNotEmpty())
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#copyToNotesModal{{$release->id}}">
                                <span class="oi oi-clipboard"></span> Copy To Notes
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($tickets->isNotEmpty())
    @include('layouts.compiler.notes')
@endif
