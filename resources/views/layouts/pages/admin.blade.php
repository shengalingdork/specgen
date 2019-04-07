@extends('layouts.elements.app')

@section('content')
<div class="card bg-light mb-3">
  <div class="card-header"><h3>Admin Dashboard</h3></div>
  <div class="card-body">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#projects">Projects</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Education Team</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#members" data-toggle="tab">Members</a>
          <a class="dropdown-item" href="#groups" data-toggle="tab">Working Groups</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#environments">Environments</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#supportTeams">Support Teams</a>
      </li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade show active" id="projects">
        @include('layouts.admin.projects')
      </div>
      <div class="tab-pane fade" id="members">
        @include('layouts.admin.members')
      </div>
      <div class="tab-pane fade" id="groups">
        @include('layouts.admin.groups')
      </div>
      <div class="tab-pane fade" id="environments">
        @include('layouts.admin.environments')
      </div>
      <div class="tab-pane fade" id="supportTeams">
        @include('layouts.admin.supportTeam')
      </div>
    </div>
  </div>
</div>
@endsection

