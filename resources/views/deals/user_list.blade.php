<div class="table-responsive my-3">
    <table id="user-list-table " class="table table-striped dataTable no-footer deals-list-table" role="grid" data-toggle="" aria-describedby="user-list-table_info">
        <thead>
           <tr class="ligth">
              <th class="sorting" tabindex="0" aria-controls="user-list-table">S/No.</th>
              <th class="sorting" tabindex="0" aria-controls="user-list-table">Title</th>
              <th class="sorting" tabindex="0" aria-controls="user-list-table">Amount</th>
              <th class="sorting" tabindex="0" aria-controls="user-list-table">Stage</th>
              <th class="sorting" tabindex="0" aria-controls="user-list-table">Deal Owner</th>
              <th class="sorting" tabindex="0" aria-controls="user-list-table">Source</th>
              <th class="sorting" tabindex="0" aria-controls="user-list-table">Depositing Institution</th>
              <th class="sorting" tabindex="0" aria-controls="user-list-table">State</th>
              <th class="sorting" tabindex="0" aria-controls="user-list-table">Submitted Bank</th>
              <th class="sorting" tabindex="0" aria-controls="user-list-table">Sub Type</th>
              <th class="sorting" tabindex="0" aria-controls="user-list-table">Actions</th>
           </tr>
        </thead>
        <tbody>
           @if(isset($deals))
           <?php $count= (($deals->currentPage()-1) * $deals->perPage()) +1; ?>
              @foreach($deals as $rec)
                 <tr class="odd" id="{{$rec->id}}-{{$rec->user_id}}">
                    <td>{{$count}}</td>
                    <td>{{$rec->title}}</td>
                    <td>{{$rec->amount}}</td>
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
                    <td>{{$rec->deal_owner}}</td>
                    <td>{{$rec->lead_source}}</td>
                    <td>{{$rec->depositing_institution}}</td>
                    <td>{{$rec->state}}</td>
                    <td>{{$rec->submitted_bank}}</td>
                    <td>{{$rec->sub_type}}</td>
                    <td>
                        <div class="flex align-items-center list-user-action">
                           <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" href="<?= url('contact/'.$rec->user_id.'/deals/edit/'.$rec->id);?>" aria-label="Edit" data-bs-original-title="Edit">
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
           {!! $deals->links('deals.user_list_pagination') !!}
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