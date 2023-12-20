@if(isset($logs) && !empty($logs))
   @foreach($logs as $log)
   <tr class="odd">
       @php
          $call_data = unserialize($log->data)
       @endphp
      <td>{{date('F d, Y', strtotime($call_data['call_date']))}}</td>
      <td>{{$call_data['to_number']}}</td>
      <td>{{ucwords($call_data['call_status'])}}</td>
      <td><a href="#" onclick="playRecording(this)" data-recording-path="{{$call_data['recording_url']}}">Play Recording</a></td>
      <td>{{ucwords($call_data['disposition'])}}</td>
      <td>{{$call_data['callerid_name']}}</td>
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
