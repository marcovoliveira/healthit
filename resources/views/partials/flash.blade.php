
@if ($flash = session('message'))
        <div id="flash-message" class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{$flash}}
        </div>
@endif
        