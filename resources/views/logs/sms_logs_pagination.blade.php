@if(isset($logs) && !empty($logs))
   @foreach($logs as $log)
   <tr class="odd">
       @php
          $sms_data = unserialize($log->data)
       @endphp
       <td>{{date('F d, Y', strtotime($sms_data['message_date']))}}</td>
       <td>{{$sms_data['to']}}</td>
       <td>{{ucwords($sms_data['direction'])}}</td>
       <td>{{strlen($sms_data['message']) > 100 ? substr($sms_data['message'], 0, 100) : $sms_data['message']}}</td>
       <td><a href="{{route('kixie.logs.details', $log->id)}}">View Details</a></td>
   </tr>
   @endforeach

   <tr>
      <td colspan="8" align="center">
         {!! $logs->links('logs.custom_pagination') !!}
      </td>
   </tr>
@else
   <tr><td colspan="8">No records found</td></tr>
@endif
