
@if($flash_messages)
    @foreach($flash_messages as $flash)
        <div class="{{'alert alert-'.$flash['type']}} alert-dismissible fade show" role="alert">
            {{$flash['body']}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif

