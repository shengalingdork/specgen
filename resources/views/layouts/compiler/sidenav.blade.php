<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="by-project-tab" data-toggle="tab" href="#by-project" role="tab" aria-controls="by-project" aria-selected="true">
      <small>By Project</small>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="by-wg-tab" data-toggle="tab" href="#by-wg" role="tab" aria-controls="by-wg" aria-selected="true">
      <small>By Group</small>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="by-project" role="tabpanel" aria-labelledby="by-project-tab">
    @include('layouts.compiler.byProjectNav')
  </div>
  <div class="tab-pane fade" id="by-wg" role="tabpanel" aria-labelledby="by-wg-tab">
    @include('layouts.compiler.byWorkingGroupNav')
  </div>
</div>
