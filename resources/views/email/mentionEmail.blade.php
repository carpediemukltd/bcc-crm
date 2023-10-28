<h3>Dear {{$first_name}},</h3>
    @if(!$update)
        <p>The Admin on CRM has mention you in a contact note. Please click here to view the note:
    @else
        <p>The Admin on CRM has updated contact note and mention you . Please click here to view the note:
    @endif
    <a href="{{$url}}">Click Here</a></p>
    <p>Sincerely,</p>
    <p><strong>Team BCCUSA</strong></p>
