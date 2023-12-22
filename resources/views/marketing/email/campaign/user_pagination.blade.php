<?php //print_r($data['users']); die; ?>
@if(isset($data['users']) && !empty($data['users']))
@foreach($data['users'] as $user)
<tr class="odd">
   <td>{{$user->user->email}}</td>
   <td>{{$user->user->full_name}}</td>
   <td>
      @if($user->email_sent == '1')
      Email Sent
      @elseif($user->email_opened == '1')
      Email Opened
      @elseif($user->email_failed == '1')
      Email Failed
      @elseif($user->email_bounced == '1')
      Email Bounced
      @else
      Pending
      @endif
   </td>

</tr>
@endforeach
<tr>
   <td colspan="8" align="center">
   {!! $data['users']->links('marketing.email.smtp.custom_pagination') !!}
   </td>
</tr>
@else
<tr>
   <td colspan="8">No records found</td>
</tr>
@endif