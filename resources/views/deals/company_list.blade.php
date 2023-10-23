<div class="table-responsive my-3">
<table id="user-list-table " class="table table-striped dataTable no-footer deals-list-table" role="grid" data-toggle="" aria-describedby="user-list-table_info">
    <thead>
       <tr class="ligth">
          <th class="sorting" tabindex="0" aria-controls="user-list-table">S/No.</th>
          <th class="sorting" tabindex="0" aria-controls="user-list-table">Company</th>
          {{-- <th class="sorting" tabindex="0" aria-controls="user-list-table">Pipeline</th> --}}
          <th class="sorting" tabindex="0" aria-controls="user-list-table">Stage</th>
          <th class="sorting" tabindex="0" aria-controls="user-list-table">Title</th>
          <th class="sorting" tabindex="0" aria-controls="user-list-table">Amount</th>
          <th class="sorting" tabindex="0" aria-controls="user-list-table">Deal Owner</th>
          <th class="sorting" tabindex="0" aria-controls="user-list-table">Source</th>
          <th class="sorting" tabindex="0" aria-controls="user-list-table">Depositing Institution</th>
          <th class="sorting" tabindex="0" aria-controls="user-list-table">State</th>
          <th class="sorting" tabindex="0" aria-controls="user-list-table">Submitted Bank</th>
          <th class="sorting" tabindex="0" aria-controls="user-list-table">Sub Type</th>
       </tr>
    </thead>
    <tbody>
       @if(isset($deals))
       <?php $count= (($deals->currentPage()-1) * $deals->perPage()) +1; ?>
          @foreach($deals as $rec)
             <tr class="odd" id="{{$rec->id}}-{{$rec->user_id}}">
                <td>{{$count}}</td>
                <td>{{$rec->company_name}}</td>
                {{-- <td>{{$rec->pipeline}}</td> --}}
                <td>
                   <div class="form-group mb-0" style="width: 150px;">
                      <select class="form-select" id="stage_id_{{$rec->id}}" name="stage_id_{{$rec->id}}" onchange="UpdateDealStage({{$rec->user_id}},{{$rec->id}});">
                         @foreach($stages as $stage)
                            <option value="{{$stage['id']}}" @if($stage['id']==$rec->stage_id) selected=selected @endif>{{$stage['title']}}</option>
                         @endforeach
                      </select>
                      <div class="p-1" id="l_{{$rec->id}}"></div>
                   </div>
                </td>
                <td>{{$rec->title}}</td>
                <td>{{$rec->amount}}</td>
                <td>{{$rec->deal_owner}}</td>
                <td>{{$rec->lead_source}}</td>
                <td>{{$rec->depositing_institution}}</td>
                <td>{{$rec->state}}</td>
                <td>{{$rec->submitted_bank}}</td>
                <td>{{$rec->sub_type}}</td>
             </tr>
             <?php $count++; ?>
          @endforeach
       @endif
    </tbody>
 </table>
</div>
 <div class="row align-items-center pagination">
    <div class="col-md-6">
       <!-- nothing happend -->
    </div>
    <div class="col-md-6">
       {!! $deals->links('deals.company_list_pagination') !!}
    </div>
 </div>
 <script type="text/javascript">
  function UpdateDealStage(user_id, deal_id){
      var stage_id = $('#stage_id_'+deal_id).val();
      r=confirm('Are you sure you want to update this stage?');
      if (r) {
         var url ="{{ route('user.deals.updatestage',[':user_id',':deal_id']) }}";
        url = url.replace(':user_id', user_id);
        url = url.replace(':deal_id', deal_id);
        $('#l_'+deal_id).html($('#show_loading').html());
        $('#l_'+deal_id).show();
        $.post({
           url: url,
           type: 'POST',
           data: {_token:"{{ csrf_token() }}", deal_id:deal_id, stage_id:stage_id},
           success: function(res){
              $('#l_'+deal_id).hide();
            },
            error: function(res){
             $('#l_'+deal_id).hide();
            if(res.responseJSON.error_msg){
               alert(res.responseJSON.error_msg);
            }
          }
        });
      }
   }
    </script>