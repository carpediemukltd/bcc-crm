@extends('layout.appTheme')
@section('content')
<div class="position-relative iq-banner default">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Admins List</h1>
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
               <div class="card-header align-items-center d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Admin List </h4>
                  </div>
                
               </div>
               <div class="card-body">
                  <!-- date range start -->
                  <div class="row date_range_fields">                          
                           <div class="col-md-3">
                              <div class="form-group">
                                 <!-- <label class="form-label" for="password">Empty Field</label> -->
                                 <input type="text" name="search" id="search" placeholder="Search..." class="form-control" />
                              </div>
                           </div>
                        </div>
                        <!-- date range end -->
                  <div class="table-responsive">
                     <div id="user-list-table_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        
                        
                           <table id="user-list-table" class="table table-striped dataTable no-footer" role="grid" aria-describedby="user-list-table_info">
                              <thead>
                                 <tr class="ligth">
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Phone</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Company</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Join Date</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @include('admin.admin_pagination')
                              </tbody>
                           </table>
                           <button type="button" style="display:none;" id="click_me" class="btn btn-primary" onclick="get_users_data();">Click Me</button>
                           <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
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
   var ENDPOINT = "{{ url('admins') }}";
   function get_users_data(){
      
      var status = $('#status').val();
      var role = $('#role').val();
      var search_term = $('#search').val();
      var page = $('#hidden_page').val();
      var start_date = $('#start_date').val();
      var end_date = $('#end_date').val();

      $('table').addClass('loading');
      if(status === undefined){
            status = "";
      }
      if(role === undefined){
         role = "";
      }
      if(search_term === undefined){
         search_term = "";
      }
      $.ajax({
            url: ENDPOINT+ "/?page="+page+"&search_term="+search_term,
            success:function(data){
               $('tbody').html('');
               $('tbody').html(data);
               $('table').removeClass('loading');
            }
      });
   } // get_users_data
   
   $(document).ready(function(){
      $('body').on('keyup', '#search', function(){
         get_users_data();
      });

      $('body').on('change', '#status', function(){
         get_users_data();
      });

      $('body').on('change', '#role', function(){
         get_users_data();
      });

      $('body').on('click', '.pager a', function(event){
         event.preventDefault();
         var page = $(this).attr('href').split('page=')[1];
         $('#hidden_page').val(page);
         get_users_data();
      });
   });
</script>

<script>
    $(document).ready(function(){
       var start = moment().subtract(1, 'days');
       var end = moment();
       function cb(start, end) {
         $('#start_date').val(start.format('YYYY-MM-DD')+' 00:00:00');
         $('#end_date').val(end.format('YYYY-MM-DD')+' 11:59:59');
         // $('#coming_date').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

         $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
         document.getElementById("click_me").click();
       }
       $('#reportrange').daterangepicker({
          startDate: start,
          endDate: end,
          ranges: {
             'Today': [moment(), moment()],
             'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
             'Last 7 Days': [moment().subtract(6, 'days'), moment()],
             'Last 30 Days': [moment().subtract(29, 'days'), moment()],
             'This Month': [moment().startOf('month'), moment().endOf('month')],
             'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
             'Last 6 Months': [moment().subtract(6, 'month'), moment()]
          }
       }, cb);
      //  cb(start, end);
    });
 </script>
@endsection