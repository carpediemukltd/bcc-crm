@extends('layout.appTheme')
@section('content')

<style>
   /* .pager {padding-left: 0; margin: 20px 0; text-align: center; list-style: none;}
   .pager li {display: inline;}
   .pager li>a, .pager li>span {display: inline-block; padding: 5px 14px; background-color: #fff; border: 1px solid #ddd; border-radius: 15px;}
   .pager .disabled>a, .pager .disabled>a:focus, .pager .disabled>a:hover, .pager .disabled>span {color: #777; cursor: not-allowed; background-color: #fff;} */
</style>

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
         <img src="{{asset('assets/images/dashboard/top-header1.png')}}" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header2.png')}}" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header3.png')}}" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header4.png')}}" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header5.png')}}" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
      </div>
   </div>
</div>
<div class="content-inner pb-0 container-fluid" id="page_layout">
   <div>
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Contact List</h4>
                  </div>
               </div>
               <div class="card-body px-0">
                  <div class="table-responsive">
                     <div id="user-list-table_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <!-- date range start -->
                        <div class="row date_range_fields">
                           <div class="col-md-6">
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
                                    <option value="">Filter</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="deleted">Deleted</option>
                                    <option value="banned">Banned</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <!-- <label class="form-label" for="password">Empty Field</label> -->
                                 <input type="text" name="serach" id="serach" placeholder="Serach.." class="form-control" />
                              </div>
                           </div>
                        </div>
                        <!-- date range end -->
                        <div class="table-responsive my-3 table-ajax-paginate">
                           <table id="user-list-table" class="table table-striped dataTable no-footer" role="grid" aria-describedby="user-list-table_info">
                              <thead>
                                 <tr class="ligth">
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Phone</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Created at</th>
                                    <th style="min-width: 100px" class="sorting" tabindex="0" aria-controls="user-list-table">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @include('user.user_pagination')
                              </tbody>
                           </table>
                           <button type="button" style="display:none;" id="click_me" class="btn btn-primary" onclick="get_data_with_date();">Click Me</button>
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

<script>
   function get_data_with_date(){
      var ENDPOINT = "{{ url('contacts') }}";

      var status = $('#status').val();
      var seach_term = $('#serach').val();
      var page = $('#hidden_page').val();

      var start_date = $('#start_date').val();
      var end_date   = $('#end_date').val();

      $('table').addClass('loading');
      $.ajax({ 
         url: ENDPOINT+ "/?page="+page+"&status="+status+"&seach_term="+seach_term+"&start_date="+start_date+"&end_date="+end_date,
         success:function(data){
            $('tbody').html('');
            $('tbody').html(data);

            $('table').removeClass('loading');
         }
      });
   } // get_data_with_date
</script>

<script>
   var ENDPOINT = "{{ url('contacts') }}";
   $(document).ready(function(){
      const fetch_data = (page, status, seach_term) => {
         var start_date = $('#start_date').val();
         var end_date   = $('#end_date').val();

         $('table').addClass('loading');
         if(status === undefined){
               status = "";
         }
         if(seach_term === undefined){
               seach_term = "";
         }
         $.ajax({ 
               url: ENDPOINT+ "/?page="+page+"&status="+status+"&seach_term="+seach_term+"&start_date="+start_date+"&end_date="+end_date,
               success:function(data){
                  $('tbody').html('');
                  $('tbody').html(data);

                  $('table').removeClass('loading');
               }
         });
      }

      $('body').on('keyup', '#serach', function(){
         var status = $('#status').val();
         var seach_term = $('#serach').val();
         var page = $('#hidden_page').val();
         fetch_data(page, status, seach_term);
      });

      $('body').on('change', '#status', function(){
         var status = $('#status').val();
         var seach_term = $('#serach').val();
         var page = $('#hidden_page').val();
         fetch_data(page, status, seach_term);
      });

      $('body').on('click', '.pager a', function(event){
         event.preventDefault();
         var page = $(this).attr('href').split('page=')[1];
         $('#hidden_page').val(page);
         var serach = $('#serach').val();
         var seach_term = $('#status').val();
         fetch_data(page,status, seach_term);
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
