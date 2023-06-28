@extends('layout.appTheme')
@section('content')
<style>
   .pagination nav{margin-right: 10px;}
</style>
<div class="position-relative iq-banner default">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>All Deals</h1>
                     <p>Experience a simple yet powerful way to build Dashboards.</p>
                  </div>
                  <div>
                     <a href="{{route('user.deals.add', $current_user_id)}}" class="btn btn-link btn-soft-light">
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
      <div class="all_type_alert_boxes">
         @if (session('success'))
         <div class="row">
            <div class="col-md-12">
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Congratulations!</strong> {{ session('success') }}
                  <button type="button" class="btn-close" id="alert-box-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            </div>
         </div>
         @endif

         @if (session('error'))
         <div class="row">
            <div class="col-md-12">
               <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Oops!</strong> {{ session('error') }}
                  <button type="button" class="btn-close" id="alert-box-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            </div>
         </div>
         @endif
      </div>
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Deals Listing</h4>
                  </div>
               </div>
               <div class="card-body px-0">
                  <div class="table-responsive">
                     <div id="user-list-table_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="table-responsive my-3">
                           <table id="user-list-table" class="table table-striped dataTable no-footer" role="grid" data-toggle="" aria-describedby="user-list-table_info">
                              <thead>
                                 <tr class="ligth">
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Tile</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Amount</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Deal Owner</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Source</th>
                                    <th style="min-width: 100px" class="sorting" tabindex="0" aria-controls="user-list-table">Action</th>
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
@endsection