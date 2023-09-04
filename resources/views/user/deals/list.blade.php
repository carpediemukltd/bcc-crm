@extends('layout.appTheme')
@section('content')

<div class="position-relative iq-banner default">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>All Deals </h1>
                     <p>Experience a simple yet powerful way to build Dashboards.</p>
                  </div>
                  <div>
                     <a href="{{route('.add', $current_user_id)}}" class="btn btn-link btn-soft-light">
                     <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-28"><path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        Add New Deal
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="iq-header-img">
      <img src="{{asset('assets/images/dashboard/top-header.png')}}" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         
      </div>
   </div>
</div>
<div class="content-inner pb-0 container-fluid" id="page_layout">
   <div>
      @include('alert_message')
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Deals Listing</h4>
                  </div>
                 
                  <div class="d-flex justify-content-between">
                     <div class="cutsom-field-dropdown dropdown">
                        <button class="btn  dropdown-toggle me-2" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                           Custom Field
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="bottom-start" >
                           
                           <li>
                              <a class="dropdown-item" href="#">
                                 <input type="radio">
                                 Action
                              </a>
                           </li>
                           <li><a class="dropdown-item" href="#"><input type="radio"> Another action</a></li>
                           <li><a class="dropdown-item" href="#"><input type="radio"> Something else here</a></li>
                           <li>
                              <hr class="dropdown-divider">
                           </li>
                           <li><a class="dropdown-item" href="#"><input type="radio"> Separated link</a></li>
                        </ul>
                     </div>
                     <a href="javascript:void(0);" class="btn btn-sm btn-primary" onclick="ExportCSV();"> <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4" d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z" fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z" fill="currentColor"></path>
                        </svg> Export CSV</a>
                        <a href="javascript:void(0);" style="margin-left:5px;" class="btn btn-sm btn-primary" onclick="ExportXLS();"> <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4" d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z" fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z" fill="currentColor"></path>
                     </svg> Export XLS</a>
                  </div>
               </div>
               <div class="card-body px-0">
                  <div class="table-responsive">
                     <div id="user-list-table_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="table-responsive my-3">
                           <div class="row" id="show_loading" style="display: none;">
                              <div class="col-md-2" >
                                <div class="preloader-dot-loading">
                                <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
                                </div>
                             </div>
                             </div>
                           <table id="user-list-table" class="table table-striped dataTable no-footer" role="grid" data-toggle="" aria-describedby="user-list-table_info">
                              <thead>
                                 <tr class="ligth">
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Title</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Amount</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Deal Owner</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Source</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Pipeline</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Stage</th>
                                    <th style="min-width: 100px" class="sorting" tabindex="0" aria-controls="user-list-table">Actions</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @if(isset($rs_deals))
                                    @foreach($rs_deals as $rec)
                                       <tr class="odd">
                                          <td>{{$rec->title}}</td>
                                          <td>{{$rec->amount}}</td>
                                          <td>{{$rec->deal_owner}}</td>
                                          <td>{{$rec->lead_source}}</td>
                                          <td>{{$rec->pipeline}}</td>
                                          <td>
                                          @foreach($pipeline_stages as $pstage)
                                             @if($pstage['id']==$rec->pipeline_id)
                                             <div class="form-group">
                                                <select class="form-select" id="stage_id_{{$rec->id}}" name="stage_id_{{$rec->id}}" onchange="UpdateDealStage({{$rec->id}});">
                                                   @foreach($pstage['stages'] as $stage)
                                                      <option value="{{$stage['id']}}" @if($stage['id']==$rec->stage_id) selected=selected @endif>{{$stage['title']}}</option>
                                                   @endforeach
                                                </select>
                                                <div class="p-1" id="l_{{$rec->id}}"></div>
                                             </div>
                                             @endif
                                          @endforeach
                                          </td>
                                          <td>
                                             <div class="flex align-items-center list-user-action">
                                                <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" href="<?= url('contact/'.$current_user_id.'/deals/edit/'.$rec->id);?>" aria-label="Edit" data-bs-original-title="Edit">
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
                                 @endif
                              </tbody>
                           </table>
                        </div>

                        <div class="row align-items-center pagination">
                           <div class="col-md-6">
                              <!-- nothing happend -->
                           </div>
                           <div class="col-md-6">
                              {!! $rs_deals->links('vendor.pagination.custom') !!}
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   function UpdateDealStage(deal_id){
      var stage_id = $('#stage_id_'+deal_id).val();
      r=confirm('Are you sure you want to update this stage?');
      if (r) {
         var url ="{{ route('user.deals.updatestage',[$current_user_id,':deal_id']) }}";
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
   function ExportCSV(){
         window.location.href = "{{ route('deal.export.csv',$current_user_id) }}";
   }
   function ExportXLS(){
         window.location.href = "{{ route('deal.export.xls',$current_user_id) }}";
   }
</script>
@endsection