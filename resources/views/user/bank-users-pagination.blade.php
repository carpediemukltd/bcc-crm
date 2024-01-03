@if(isset($data['users']) && !empty($data['users']))
@foreach($data['users'] as $user)
<option value="{{$user->id}}">
    {{$user->full_name}}{{' '}}{{$user->email}}
</option>
@endforeach

@else
    <option colspan="8">No records found</option>
@endif