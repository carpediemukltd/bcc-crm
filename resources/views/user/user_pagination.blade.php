@if(isset($users) && !empty($users))
   @foreach($users as $rec_user)
   <tr class="odd">
      <td>{{$rec_user->first_name.' '.$rec_user->last_name}}</td>
      <td>{{$rec_user->phone_number}}</td>
      <td>{{$rec_user->email}}</td>
      <td>{{$rec_user->role == 'owner'?'super user':$rec_user->role}}</td>
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
      <td>{{date('Y-m-d', strtotime($rec_user->created_at))}}</td>
      <td>
        
      @if($rec_user->role == 'contact')
         <div class="flex align-items-center list-user-action">
            <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Details" href="{{route('user.details', $rec_user->id)}}" aria-label="Details" data-bs-original-title="Details">
               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M2 4C2 2.89543 2.89543 2 4 2H9C10.1046 2 11 2.89543 11 4V20C11 21.1046 10.1046 22 9 22H4C2.89543 22 2 21.1046 2 20V4Z" fill="currentColor" />
                  <path d="M1
                  3 4C13 2.89543 13.8954 2 15 2H20C21.1046 2 22 2.89543 22 4V9C22 10.1046 21.1046 11 20 11H15C13.8954 11 13 10.1046 13 9V4Z" fill="currentColor" />
                  <path d="M13 15C13 13.8954 13.8954 13 15 13H20C21.1046 13 22 13.8954 22 15V20C22 21.1046 21.1046 22 20 22H15C13.8954 22 13 21.1046 13 20V15Z" fill="currentColor" />
               </svg>
            </a>
         </div>
         @else
         &nbsp;
         @endif
        
      </td>
      <td>
         <div class="flex align-items-center list-user-action">
            <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" href="{{route('user.edit', $rec_user->id)}}" aria-label="Edit" data-bs-original-title="Edit">
               <span class="btn-inner">
                  <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                     <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
               </span>
            </a>
         </div>
      </td>
   </tr>
   @endforeach

   <tr>
      <td colspan="7" align="center">
         {!! $users->links('user.custom_pagination') !!}
      </td>
   </tr>
@else 
   <tr><td colspan="7">No records found</td></tr>
@endif