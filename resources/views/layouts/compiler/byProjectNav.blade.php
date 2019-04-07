<br> 
<div class="nav flex-column nav-tabs" role="tablist" aria-orientation="vertical" style="padding-bottom:5px">
    @foreach ($projects as $project)

    @php
        if (empty($specificRelease)) {
            $projectActiveFlag = $latestRelease->project_id === $project->id ? 'open' : 'close';
            $projectIconFlag = $latestRelease->project_id === $project->id ? 'bottom' : 'right';
            $projectActiveFlag2 = $latestRelease->project_id === $project->id ? 'show' : '';
        } else {
            $projectActiveFlag = $specificRelease->project_id === $project->id ? 'open' : 'close';
            $projectIconFlag = $specificRelease->project_id === $project->id ? 'bottom' : 'right';
            $projectActiveFlag2 = $specificRelease->project_id === $project->id ? 'show' : '';
        }
    @endphp

    <div class="container">
        <div class="row">
            <div class="col">
                <a 
                    class="btn btn-link btn-block navigation collapsible-{{ $projectActiveFlag }}"
                    style="text-align:left"
                    data-toggle="collapse"
                    href="#project{{ $project->id }}"
                    role="button"
                    aria-expanded="false">
                    <span class="oi oi-chevron-{{ $projectIconFlag }}"></span> {{ $project->name }}
                </a>
            </div>
        </div>
    </div>

    <div class="collapse {{ $projectActiveFlag2 }}" id="project{{ $project->id }}">
        <div class="container">
            <div class="row">
                <div class="col-10 offset-md-1">
                    @foreach ($releaseListByProject[$project->id] as $release)

                    @php
                        if (empty($specificRelease)) {
                            $releaseActiveFlag = $latestRelease->id === $release->id ? 'active show' : '';
                        } else {
                            $releaseActiveFlag = $specificRelease->id === $release->id ? 'active show' : '';
                        }
                    @endphp

                    <li class="nav-item">
                        <a 
                            id="project-release{{ $release->id }}-tab"
                            class="release-tab btn btn-link nav-link {{ $releaseActiveFlag }}"
                            style="text-align:left;border:white"
                            data-toggle="tab"
                            href=".project-release{{ $release->id }}"
                            role="tab">
                            <span class="oi oi-pencil"></span> {{ $release->name }}
                        </a>
                    </li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <br>
</div>
