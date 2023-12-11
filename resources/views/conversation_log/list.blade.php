<div id="list">
    @if (count($emails) == 0)
        <p id="no_notes_found">No emails found.</p>
    @else
        @foreach ($emails as $email)
            <div class="nav-item mb-3 p-3" style="border: 1px solid #eee; border-radius:3px; ">
                <div id="email_{{ $email->id }}">
                    <div><b>DateTime:</b> {{ $email->created_at }}</div>
                    <div><b>Subject:</b> {{ $email->subject }}</div>
                    <b>Body:</b> <div>{!! $email->body !!}</div>
                </div>
            </div>
        @endforeach
    @endif
</div>
