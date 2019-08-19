<br>
<div class="nav flex-column nav-tabs" role="tablist" aria-orientation="vertical" style="padding-bottom:5px">
    @foreach ($workingGroupListOfReleases as $workingGroupOfRelease)

    @php
        if (empty($specificRelease)) {
            $workingGroupActiveFlag = $latestRelease->working_group_id === $workingGroupOfRelease ? 'open' : 'close';
            $workingGroupIconFlag = $latestRelease->working_group_id === $workingGroupOfRelease ? 'bottom' : 'right';
            $workingGroupActiveFlag2 = $latestRelease->working_group_id === $workingGroupOfRelease ? 'show' : '';
        } else {
            $workingGroupActiveFlag = $specificRelease->working_group_id === $workingGroupOfRelease ? 'open' : 'close';
            $workingGroupIconFlag = $specificRelease->working_group_id === $workingGroupOfRelease ? 'bottom' : 'right';
            $workingGroupActiveFlag2 = $specificRelease->working_group_id === $workingGroupOfRelease ? 'show' : '';
        }
    @endphp

    <div class="container">
        <div class="row">
            <div class="col">
                <a 
                    class="btn btn-link btn-block navigation collapsible-{{ $workingGroupActiveFlag }}"
                    style="text-align:left"
                    data-toggle="collapse"
                    href="#wg{{ $workingGroupOfRelease }}"
                    role="button"
                    aria-expanded="false">
                    <span class="oi oi-chevron-{{ $workingGroupIconFlag }}"></span> {{ $workingGroups[$workingGroupOfRelease]->name }}
                </a>
            </div>
        </div>
    </div>

    <div class="collapse {{ $workingGroupActiveFlag2 }}" id="wg{{ $workingGroupOfRelease }}">
        <div class="container">
            <div class="row">
                <div class="col-10 offset-md-1">
                    @foreach ($projectListOfReleases as $projectOfRelease)
                        @if (!empty($releaseListByWorkingGroup[$workingGroupOfRelease][$projectOfRelease]))
                            @php
                                if (empty($specificRelease)) {
                                    $projectActiveFlag = $latestRelease->project_id === $projectOfRelease ? 'open' : 'close';
                                    $projectIconFlag = $latestRelease->working_group_id === $workingGroupOfRelease &&
                                                        $latestRelease->project_id === $projectOfRelease ? 
                                                        'bottom' : 
                                                        'right';
                                    $projectActiveFlag2 = $latestRelease->project_id === $projectOfRelease ? 'show' : '';
                                } else {
                                    $projectActiveFlag = $specificRelease->project_id === $projectOfRelease ? 'open' : 'close';
                                    $projectIconFlag = $specificRelease->working_group_id === $workingGroupOfRelease &&
                                                        $specificRelease->project_id === $projectOfRelease ? 
                                                        'bottom' : 
                                                        'right';
                                    $projectActiveFlag2 = $specificRelease->project_id === $projectOfRelease ? 'show' : '';
                                }
                            @endphp

                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <a 
                                            class="btn btn-link btn-block navigation collapsible-{{ $projectActiveFlag }}"
                                            style="text-align:left"
                                            data-toggle="collapse"
                                            href="#wg{{ $workingGroupOfRelease }}-project{{ $projectOfRelease }}"
                                            role="button"
                                            aria-expanded="false">
                                            <span class="oi oi-chevron-{{ $projectIconFlag }}"></span> {{ $projects[$projectOfRelease]->name }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="collapse {{ $projectActiveFlag2 }}" id="wg{{ $workingGroupOfRelease }}-project{{ $projectOfRelease }}">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-10 offset-md-2">
                                            @foreach ($releaseListByWorkingGroup[$workingGroupOfRelease][$projectOfRelease] as $release)

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
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <br>
</div>
