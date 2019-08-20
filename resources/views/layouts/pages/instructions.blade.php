@extends('layouts.elements.app')

@section('content')
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col">
            <div class="float-left" style="display:inline-block;width:60px;">
                <a
                    class="btn btn-secondary"
                    href="/compiler/{{ $release->id }}"
                    role="button">
                    <span class="oi oi-arrow-thick-left"></span> 
                </a>
            </div>
            <div class="float-right">
                <a
                    id="addInstructionButton"
                    class="btn btn-primary text-light"
                    role="button">
                    <span class="oi oi-plus"> Add Instruction</span>
                </a>
            </div>
            <form action="/ticket/{{ $ticket->id }}" class="form-inline" method="POST">
                <input type="hidden" name="_token"  value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <h2>
                {{ $ticket->code }}
                @if ($ticket->description)
                    <span id="ticketTitle">{{ $ticket->description }}</span>
                @else
                <input
                    id="ticketDescription"
                    name="ticketDescription"
                    class="form-control form-control-lg"
                    style="width:500px"
                    type="text"
                    placeholder="Add ticket title">
                @endif
                Instructions ({{ $project->name }}-{{ $release->name }})</h2>
            </form>
        </div>
    </div>
    <div class="row mt-3">
        <form action="/instruction" class="container-fluid addInstruction" method="POST" >
            <input type="hidden" name="_token"  value="{{ csrf_token() }}">
            <input id="releaseID" type="hidden" name="releaseID" value="{{ $release->id }}">
            <input id="ticketID" type="hidden" name="ticketID" value="{{ $ticket->id }}">
            <table class="table table-sm table-striped" style="border:1px solid #dee2e6">
                <thead class="table-primary text-center">
                    <tr>
                        <th class="align-middle" style="width:10%">Support Team</th>
                        <th class="align-middle" style="width:12%">Environment</th>
                        <th class="align-middle" style="width:50%">Instruction</th>
                        <th class="align-middle" style="width:28%">Database Attributes</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($instructions->isEmpty())
                        <div class="alert alert-info">
                          No instructions yet for this ticket.
                        </div>
                    @else
                        @foreach ($instructions as $instruction)
                        <tr id="{{ $instruction->id }}">
                            <td class="align-middle text-center">
                                {{ $supportTeams[$instruction->support_team_id]->name }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $environments[$instruction->environment_id]->name }}
                            </td>
                            <td class="align-middle">
                                <small>{!! nl2br(e($instruction->instruction)) !!}</small>
                            </td>
                            <td class="align-middle text-center">
                                @if ($supportTeams[$instruction->support_team_id]->name === 'DIT')
                                    <small>
                                        {{ $instruction->db_code_review_link }}<br>
                                        {{ $instruction->db_affected_core_table }}<br>
                                        {{ $instruction->db_revision_num }}
                                    </small>
                                @else
                                    n/a
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                <a id="editInstructionButton" class="btn btn-secondary btn-sm" type="button">
                                    <span class="oi oi-pencil"></span>
                                </a>
                            </td>
                            <td class="align-middle text-center">
                                <a
                                    id="deleteInstructionButton"
                                    class="btn btn-danger btn-sm"
                                    type="button"
                                    data-toggle="modal"
                                    data-target="#deleteInstructionModal">
                                    <span class="oi oi-trash"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    <tr id="instructionForm" class="table-dark" style="display:none">
                        <td class="align-middle">
                            <select class="custom-select form-control-sm" id="supportTeamID" name="supportTeamID" required>
                                <option selected value="">Pick One</option>
                                @foreach ($supportTeams as $supportTeam)
                                <option value="{{ $supportTeam->id }}">{{ $supportTeam->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="align-middle">
                            <select class="custom-select form-control-sm" id="environmentID" name="environmentID" required>
                                <option selected value="">Pick One</option>
                                @foreach ($environments as $environment)
                                <option value="{{ $environment->id }}">{{ $environment->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <textarea class="form-control" id="instruction" name="instruction" placeholder="Add instruction" rows="5" required></textarea>
                        </td>
                        <td class="align-middle" colspan="2">
                            <fieldset id="dbAttributes" disabled="">
                                <input type="text" class="form-control form-control-sm" placeholder="Add code review link" id="dbCodeReviewLink" name="dbCodeReviewLink" required>
                                <input type="text" class="form-control form-control-sm" placeholder="Add affected core tables" id="dbCoreTables" name="dbCoreTables" required>
                                <input type="number" class="form-control form-control-sm" placeholder="Add revision number" id="dbRevisionNum" name="dbRevisionNum" required>
                            </fieldset>
                        </td>
                        <td class="align-middle text-center">
                            <button id="addInstructionButton" type="submit" class="btn btn-info btn-sm">
                                <span class="oi oi-check"></span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>

<div id="deleteInstructionModal" class="modal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST">
                <input name="_method" type="hidden" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure you want to delete this instruction?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes, delete instruction</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
