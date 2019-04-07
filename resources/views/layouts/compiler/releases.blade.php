<div class="tab-content" id="nav-tabContent">
    @foreach ($releases as $release)

        @php
            if (empty($specificRelease)) {
                $releaseActiveFlag = $latestRelease->id === $release->id ? 'active show' : '';
            } else {
                $releaseActiveFlag = $specificRelease->id === $release->id ? 'active show' : '';
            }
        @endphp

        <div
        class="tab-pane fade {{ $releaseActiveFlag }} project-release{{ $release->id }} wg-release{{ $release->id }}" 
        role="tabpanel">
            @include('layouts.compiler.release')
        </div>
    @endforeach
</div>
