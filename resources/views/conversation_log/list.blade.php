<div id="list">
    @if (count($emails) == 0)
        <p id="no_notes_found">No emails found.</p>
    @else
        @foreach ($emails as $email)
            <div class="nav-item mb-3 p-3" style="border: 1px solid #eee; border-radius:3px; ">
                <div id="email_{{ $email->id }}">
                    <div><b>DateTime:</b> {{ date('d-m-Y H:i:s', strtotime($email->created_at)) }}
                        <?php
                        if ($email->is_tracking == '1' && $email->is_read == '0') {
                            echo "<div style='float:right;'>";
                            echo " <img src='/assets/images/envelope-closed-32.jpg' width='16' height='20'>";
                            echo '</div>';
                        } elseif ($email->is_tracking == '1' && $email->is_read == '1') {
                            echo "<div style='float:right;'>";
                            echo date('d-m-Y H:i:s', strtotime($email->read_date));
                            echo " <img src='/assets/images/envelope-open-32.jpg' width='16' height='20'>";
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <div><b>Subject:</b> {{ $email->subject }}</div>
                    <b>Body:</b>
                    <div>{!! $email->body !!}</div>

                </div>
            </div>
        @endforeach
    @endif
</div>
