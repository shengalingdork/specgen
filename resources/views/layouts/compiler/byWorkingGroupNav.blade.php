<br>
<div class="nav flex-column nav-tabs" role="tablist" aria-orientation="vertical" style="padding-bottom:5px">
    @foreach ($workingGroups as $workingGroup)

    @php
        if (empty($specificRelease)) {
            $workingGroupActiveFlag = $latestRelease->working_group_id === $workingGroup->id ? 'open' : 'close';
            $workingGroupIconFlag = $latestRelease->working_group_id === $workingGroup->id ? 'bottom' : 'right';
            $workingGroupActiveFlag2 = $latestRelease->working_group_id === $workingGroup->id ? 'show' : '';
        } else {
            $workingGroupActiveFlag = $specificRelease->working_group_id === $workingGroup->id ? 'open' : 'close';
            $workingGroupIconFlag = $specificRelease->working_group_id === $workingGroup->id ? 'bottom' : 'right';
            $workingGroupActiveFlag2 = $specificRelease->working_group_id === $workingGroup->id ? 'show' : '';
        }
    @endphp

    <div class="container">
        <div class="row">
            <div class="col">
                <a 
                    class="btn btn-link btn-block navigation collapsible-{{ $workingGroupActiveFlag }}"
                    style="text-align:left"
                    data-toggle="collapse"
                    href="#wg{{ $workingGroup->id }}"
                    role="button"
                    aria-expanded="false">
                    <span class="oi oi-chevron-{{ $workingGroupIconFlag }}"></span> {{ $workingGroup->name }}
                </a>
            </div>
        </div>
    </div>

    <div class="collapse {{ $workingGroupActiveFlag2 }}" id="wg{{ $workingGroup->id }}">
        <div class="container">
            <div class="row">
                <div class="col-10 offset-md-1">                   
                    @foreach ($projects as $project)

                    @php
                        if (empty($specificRelease)) {
                            $projectActiveFlag = $latestRelease->project_id === $project->id ? 'open' : 'close';
                            $projectIconFlag = $latestRelease->working_group_id === $workingGroup->id &&
                                                $latestRelease->project_id === $project->id ? 
                                                'bottom' : 
                                                'right';
                            $projectActiveFlag2 = $latestRelease->project_id === $project->id ? 'show' : '';
                        } else {
                            $projectActiveFlag = $specificRelease->project_id === $project->id ? 'open' : 'close';
                            $projectIconFlag = $specificRelease->working_group_id === $workingGroup->id &&
                                                $specificRelease->project_id === $project->id ? 
                                                'bottom' : 
                                                'right';
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
                                        href="#wg{{ $workingGroup->id }}-project{{ $project->id }}"
                                        role="button"
                                        aria-expanded="false">
                                        <span class="oi oi-chevron-{{ $projectIconFlag }}"></span> {{ $project->name }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="collapse {{ $projectActiveFlag2 }}" id="wg{{ $workingGroup->id }}-project{{ $project->id }}">
                            <div class="container">
                                <div class="row">
                                    <div class="col-10 offset-md-2">
                                        @foreach ($releaseListByWorkingGroup[$workingGroup->id][$project->id] as $release)

                                        @php
                                            if (empty($specificRelease)) {
                                                $releaseActiveFlag = $latestRelease->id === $release->id ? 'active show' : '';
                                            } else {
                                                $releaseActiveFlag = $specificRelease->id === $release->id ? 'active show' : '';
                                            }
                                        @endphp

                                        <li class="nav-item">
                                            <a 
                                                id="wg-release{{ $release->id }}-tab"
                                                class="release-tab btn btn-link nav-link {{ $releaseActiveFlag }}"
                                                style="text-align:left;border:white"
                                                data-toggle="tab"
                                                href=".wg-release{{ $release->id }}"
                                                role="tab"
                                                aria-selected="false">
                                                <span class="oi oi-pencil"></span> {{ $release->name }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <br>
</div>
