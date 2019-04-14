<div id="copyToNotesModal{{$release->id}}" class="modal" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Copy To Change Ticket's Notes Section</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <pre class="pre-scrollable">
                    <code id="note{{$release->id}}">
                        @include('layouts.compiler.note')
                    </code>
                </pre>
            </div>
            <div class="modal-footer">
                <button id="copyToNotes" type="button" class="btn btn-success" data-clipboard-target="#note{{$release->id}}">Copy HTML</button>
            </div>
        </div>
    </div>
</div>
