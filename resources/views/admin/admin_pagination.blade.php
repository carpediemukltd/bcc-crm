@if(isset($users) && !empty($users))
   @foreach($users as $rec_user)
   <tr class="odd">
      <td>{{$rec_user->full_name}}</td>
      <td>{{$rec_user->phone_number}}</td>
      <td>{{$rec_user->email}}</td>
      <td>
    @if(isset($rec_user->company) && $rec_user->company->name !== '')
        {{ $rec_user->company->name }}
    @else
    @endif
</td>
      <td>
         @if($rec_user->status == 'active')
            <span class="badge bg-success">{{ucfirst($rec_user->status)}}</span>
         @elseif($rec_user->status == 'inactive')
            <span class="badge bg-primary">{{ucfirst($rec_user->status)}}</span>
         @elseif($rec_user->status == 'archived')
            <span class="badge bg-secondary">{{ucfirst($rec_user->status)}}</span>
         @elseif($rec_user->status == 'deleted')
         <span class="badge bg-danger">{{ucfirst($rec_user->status)}}</span>
         @elseif($rec_user->status == 'banned')
            <span class="badge bg-warning">{{ucfirst($rec_user->status)}}</span>
         @else
            <span class="badge">{{ucfirst($rec_user->status)}}</span>
         @endif
      </td>
      <td>{{$rec_user->formatted_created_at}}</td>
   </tr>
   @endforeach

   <tr>
      <td colspan="8" align="center">
         {!! $users->links('admin.custom_pagination') !!}
      </td>
   </tr>
@else 
   <tr><td colspan="8">No records found</td></tr>
@endif