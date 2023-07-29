@extends('layout.appTheme')
@section('content')
<div class="position-relative iq-banner default">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Contacts List</h1>
                     <p>All Contacts.</p>
                  </div>
                  <div>
                     <a href="{{route('user.add')}}" class="btn btn-link btn-soft-light">
                     <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-28"><path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        Add New Contact
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="iq-header-img">
         <img src="{{asset('assets/images/dashboard/top-header.png')}}" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <!-- <img src="{{asset('assets/images/dashboard/top-header1.png')}}" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header2.png')}}" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header3.png')}}" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header4.png')}}" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header5.png')}}" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX" loading="lazy"> -->
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
                     <h4 class="card-title">Contact List</h4>
                  </div>
                  <div>
                     <a href="javascript:void(0);" class="btn btn-sm btn-primary" onclick="ExportData('csv');"> <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path opacity="0.4" d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z" fill="currentColor"></path>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z" fill="currentColor"></path>
                            </svg> Export CSV</a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-primary" onclick="ExportData('xls');"> <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path opacity="0.4" d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z" fill="currentColor"></path>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z" fill="currentColor"></path>
                            </svg> Export XLS</a>
                  </div>
               </div>
               <div class="card-body px-0">
                  <div class="table-responsive">
                     <div id="user-list-table_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <!-- date range start -->
                        <div class="row date_range_fields">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <!-- <label class="form-label" for="password">Date Range</label> -->
                                 <div id="reportrange" class="form-control" >
                                    <i class="fa fa-calendar"></i>&nbsp;
                                    <span>All Time</span> <i class="fa fa-caret-down"></i>
                                 </div>
                              </div>
                              <input type="hidden" id="start_date" value="">
                              <input type="hidden" id="end_date" value="">
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <!-- <label class="form-label" for="password">Empty Field</label> -->
                                 <select name="status" id="status" class="form-select">
                                    <option value="">Select Status</option>
                                    <option class="bg-success1" value="active" selected>Active</option>
                                    <option class="bg-primary1" value="inactive">Inactive</option>
                                    <option class="bg-secondary1" value="archived">Archived</option>
                                    <option class="bg-danger1" value="deleted">Deleted</option>
                                    <option class="bg-warning1" value="banned">Banned</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="form-group">
                                 <select name="role" id="role" class="form-select">
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="owner">Owner</option>
                                    <option value="user">User</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <!-- <label class="form-label" for="password">Empty Field</label> -->
                                 <input type="text" name="search" id="search" placeholder="Search..." class="form-control" />
                              </div>
                           </div>
                        </div>
                        <!-- date range end -->
                        <div class="table-responsive my-3 table-ajax-paginate">
                           <div class="row">
                           <div class="col-3">&nbsp;</div>
                           <div class="col-3">&nbsp;</div>
                           <div class="col-3">&nbsp;</div>
                           <div class="col-3">
                           </div>
                        </div>
                           <table id="user-list-table" class="table table-striped dataTable no-footer" role="grid" aria-describedby="user-list-table_info">
                              <thead>
                                 <tr class="ligth">
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Phone</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Role</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Created at</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Details</th>
                                    <th style="min-width: 100px" class="sorting" tabindex="0" aria-controls="user-list-table">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @include('user.user_pagination')
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
   var ENDPOINT = "{{ url('contacts') }}";
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
            url: ENDPOINT+ "/?page="+page+"&status="+status+"&role="+role+"&search_term="+search_term+"&start_date="+start_date+"&end_date="+end_date,
            success:function(data){
               $('tbody').html('');
               $('tbody').html(data);
               $('table').removeClass('loading');
            }
      });
   } // get_users_data

   function ExportData(type){
      var status = $('#status').val();
      var role = $('#role').val();
      var search_term = $('#search').val();
      var page = $('#hidden_page').val();
      var start_date = $('#start_date').val();
      var end_date = $('#end_date').val();
      if(status === undefined){
         status = "";
      }
      if(role === undefined){
         role = "";
      }
      if(search_term === undefined){
         search_term = "";
      }
      var params="/?page="+page+"&status="+status+"&role="+role+"&search_term="+search_term+"&start_date="+start_date+"&end_date="+end_date;
      if(type=='csv') {
         window.location.href = "{{ route('user.export.csv') }}"+params;
      }else if(type=='xls') {
         window.location.href = "{{ route('user.export.xls') }}"+params;
      }
   }
   
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