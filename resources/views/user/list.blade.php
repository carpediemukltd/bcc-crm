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
                        <div class="row align-items-center">
                           <div class="col-md-6">
                              <div class="dataTables_length" id="user-list-table_length">
                                 <label>
                                    Show 
                                    <select name="user-list-table_length" aria-controls="user-list-table" class="form-select form-select-sm">
                                       <option value="10">10</option>
                                       <option value="25">25</option>
                                       <option value="50">50</option>
                                       <option value="100">100</option>
                                    </select>
                                    entries
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div id="user-list-table_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="user-list-table"></label></div>
                           </div>
                        </div>
                        <!-- date range start -->
                        <div class="row date_range_fields">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="form-label" for="password">Date Range</label>
                                 <div id="reportrange" class="form-control" >
                                    <i class="fa fa-calendar"></i>&nbsp;
                                    <span>June 13, 2023 - June 14, 2023</span> <i class="fa fa-caret-down"></i>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label class="form-label" for="password">Empty Field</label>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label class="form-label" for="password">Empty Field</label>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                        </div>
                        <!-- date range end -->
                        <div class="table-responsive my-3">
                           <table id="user-list-table" class="table table-striped dataTable no-footer" role="grid" aria-describedby="user-list-table_info">
                              <thead>
                                 <tr class="ligth">
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending">Phone</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
                                    <th style="min-width: 100px" class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @if(isset($users) && !empty($users))
                                    @foreach($users as $rec_user)
                                    <tr class="odd">
                                       <td>{{$rec_user->first_name.' '.$rec_user->last_name}}</td>
                                       <td>{{$rec_user->phone_number}}</td>
                                       <td>{{$rec_user->email}}</td>
                                       <td>
                                          @if($rec_user->status == 'active')
                                             <span class="badge bg-success">{{ucfirst($rec_user->status)}}</span>
                                          @elseif($rec_user->status == 'inactive')
                                             <span class="badge bg-primary">{{ucfirst($rec_user->status)}}</span>
                                          @elseif($rec_user->status == 'banned')
                                             <span class="badge bg-warning">{{ucfirst($rec_user->status)}}</span>
                                          @elseif($rec_user->status == 'deleted')
                                             <span class="badge bg-danger">{{ucfirst($rec_user->status)}}</span>
                                          @endif
                                       </td>
                                       <td>
                                          <div class="flex align-items-center list-user-action">
                                             <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" href="{{route('user.edit', $rec_user->id)}}" aria-label="Edit" data-bs-original-title="Edit">
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
                                 @else 
                                    <tr><td colspan="5">No records found</td></tr>
                                 @endif
                              </tbody>
                           </table>
                           <button type="button" style="display:none;" id="click_me" class="btn btn-primary" onclick="get_data_with_date();">Click Me</button>
                           <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                        </div>
                        <div class="row align-items-center">
                           <div class="col-md-6">
                              <!-- nothing happend -->
                           </div>
                           <div class="col-md-6">
                              <div class="dataTables_paginate paging_simple_numbers" id="user-list-table_paginate">
                                 {{ $users->links('vendor.pagination.custom')}}
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
</div>
<script>
    $(document).ready(function(){
       var start = moment().subtract(1, 'days');
       var end = moment();
       function cb(start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
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
       cb(start, end);
    });
 </script>

@endsection