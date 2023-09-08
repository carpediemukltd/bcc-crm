@if(isset($rs_deals))
@foreach($rs_deals as $rec)
<div class="col m-2">
<div class="mb-0 card">
<div class="card-body">
    <p class="card-text"><b>Title:</b> {{$rec->title}}</p>
    <p class="card-text"><b>Amount:</b> {{$rec->amount}}</p>
    <p class="card-text"><b>Deal Owner:</b> {{$rec->deal_owner}}</p>
    <p class="card-text"><b>Source:</b> {{$rec->lead_source}}</p>
    <p class="card-text"><b>Pipeline:</b> {{$rec->pipeline}}</p>
    <p class="card-text"><b>Stage:</b> {{$rec->stage}}</p>
</div>
</div>
</div>
@endforeach
@endif