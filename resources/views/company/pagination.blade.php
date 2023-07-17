@if(isset($companies) && !empty($companies))
   @foreach($companies as $company)
   <tr class="odd">
      <td>{{$company->company_name}}</td>
      <td>{{$company->first_name.' '.$company->last_name}}</td>
      <td>{{$company->phone_number}}</td>
      <td>{{$company->email}}</td>
      <td>{{$company->role}}</td>
      <td>
         @if($company->status == 'active')
            <span class="badge bg-success">{{ucfirst($company->status)}}</span>
         @elseif($company->status == 'inactive')
            <span class="badge bg-primary">{{ucfirst($company->status)}}</span>
         @elseif($company->status == 'banned')
            <span class="badge bg-warning">{{ucfirst($company->status)}}</span>
         @elseif($company->status == 'deleted')
            <span class="badge bg-danger">{{ucfirst($company->status)}}</span>
         @endif
      </td>
      <td>{{date('Y-m-d', strtotime($company->created_at))}}</td>
      <td>
         <div class="flex align-items-center list-user-action">
            <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" href="{{route('company.edit', $company->company_id)}}" aria-label="Edit" data-bs-original-title="Edit">
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
         {!! $companies->links('company.custom_pagination') !!}
      </td>
   </tr>
@else 
   <tr><td colspan="7">No records found</td></tr>
@endif