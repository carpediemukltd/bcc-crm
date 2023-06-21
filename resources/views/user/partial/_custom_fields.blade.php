
@unless (count($custom_fields)==0)   
<input type="hidden" id="custom_fields_count"  name="custom_fields_count" value="{{count($custom_fields)}}">
@foreach($custom_fields as $field)
<div class="row">
<div class="col">
    <div class="form-group form-floating">
        <input type="text" class="form-control" id="custom_fields[{{$field->id}}]" value="{{$field->data}}" placeholder="{{$field->title}}" name="custom_fields[{{$field->id}}]" required="">
        <label for="floatingInputGrid">{{$field->title}}</label>
    </div>
</div>
</div>
@endforeach
@endif