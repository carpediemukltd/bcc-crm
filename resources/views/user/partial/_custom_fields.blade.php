
@if (count($custom_fields)>0)
<input type="hidden" id="custom_fields_count" value="{{count($custom_fields)}}">
@foreach($custom_fields as $field)
<div class="row">
<div class="col">
    <div class="form-group form-floating">
{{--        @if($field->data != '')--}}
            @if($field->title == 'History Tracking' && $field->data != '' && @unserialize($field->data))
                <textarea type="text" class="form-control" id="custom_fields[{{$field->id}}]" cols='60' rows='8' style="height: auto;font-size: 12px;" disabled>@foreach(unserialize($field->data) as $data){!! $data->url. " ".$data->time !!}&#13;&#10;@endforeach</textarea>
            @else
                <input type="text" class="form-control" id="custom_fields[{{$field->id}}]" value="{{$field->data != 'N;' ? $field->data : ''}}" placeholder="{{$field->title}}" disabled>
            @endif
            <label for="custom_fields[{{$field->id}}]">{{$field->title}}</label>
{{--        @endif--}}
    </div>
</div>
</div>
@endforeach
@endif
