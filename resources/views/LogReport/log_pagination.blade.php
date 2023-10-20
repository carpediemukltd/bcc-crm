@if(isset($activityReport) && !empty($activityReport))
@foreach($activityReport as $acc)
<tr class="ligth">
    @foreach($user as $users)
    @if($acc->user_id == $users->id)
    <td class="sorting" tabindex="0" aria-controls="user-list-table">{{$users->first_name}} {{$users->last_name}}</td>

    @endif
    @endforeach
    <td class="sorting" tabindex="0" aria-controls="user-list-table">{{$acc->action}}</td>
    <td class="sorting" tabindex="0" aria-controls="user-list-table">{{$acc->entity}}</td>
    <td class="sorting" tabindex="0" aria-controls="user-list-table">{{$acc->module_id}}</td>
    <td class="sorting" tabindex="0" aria-controls="user-list-table">{{$acc->data}}</td>
    <td class="sorting" tabindex="0" aria-controls="user-list-table">{{$acc->created_at}}</td>

</tr>
@endforeach


@else
<tr>
    <td colspan="7">No records found</td>
</tr>
@endif