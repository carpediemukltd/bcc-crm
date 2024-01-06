@extends('layout.appTheme')
@section('content')
<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1><a href="{{ url()->previous() }}"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16"> <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/> </svg></a>  Edit Robin Setting</h1>
                     <p>Experience a simple yet powerful way to build Dashboards.</p>
                  </div>
                  <!-- <div>
                     <a href="#" class="btn btn-link btn-soft-light">
                     <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-28"><path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        Add New Setting
                     </a>
                     </div> -->
               </div>
            </div>
         </div>
      </div>
      <div class="iq-header-img">
         <img src="{{asset('assets/images/dashboard/top-header.png')}}" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
      </div>
   </div>
</div>
<div class="content-inner container-fluid pb-0" id="page_layout">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Edit Round Robin Setting</h4>
               </div>
            </div>
            <div class="card-body">
               <form action="#" method="POST">
                  <input type="hidden" name="_token" value="hSax8WAH4wIDnPtIsGhhHFy3Z19wZzieGkWNiN0i">                     
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                           <label class="form-label" for="owner_name">Owner:</label>
                           <input type="text" class="form-control" id="owner_name" placeholder="Owner" name="first_name" value="" required="">
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                           <label class="form-label" for="module_name">Modules:</label>
                           <input type="text" class="form-control" id="module_name" placeholder="Modules" name="last_name" value="" required="">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                           <label class="form-label" for="percentage">Percentage:</label>
                           <input type="text" class="form-control" id="percentage" placeholder="percentage" name="email" value="" required="">
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                           <label class="form-label" for="phone_number">Email For Notification:</label>
                           <input type="number" id="phone_number" class="form-control" name="phone_number" placeholder="123456789" value="" required="">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-6">
                        <div class="form-group">
                           <label class="form-label" for="password">Disabled Untill For Holidays:</label>
                           <input type="text" name="start" class="form-control range_flatpicker flatpickr-input active" placeholder="Range Date Picker" readonly="readonly">
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <div class="card-body px-0">
                <div class="table-responsive">                    
                    <div class="table-responsive">
                        <div id="" class="">
                            <div class="table-responsive my-3">
                                <table class="table table-striped no-footer" data-toggle="data-table" role="grid">
                                    <thead>
                                        <tr class="ligth">
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sr: activate to sort column descending">Owner</th>
                                            <th class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Title: activate to sort column ascending">Percentage</th>
                                            <th class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending">Module</th>
                                            <th class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending">Disables</th>
                                            <th class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending">Field Criteria</th>
                                            <th style="min-width: 100px" class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ui-sortable">
                                        <tr class="odd ui-sortable-handle">
                                            <td class="sorting_1">Scott Henson</td>
                                            <td>90</td>
                                            <td>Percentage</td>
                                            <td>
                                                Leads
                                            </td>
                                            <td>
                                            xxxxxxxxxxxoudhdh
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" href="{{route('editsetting')}}" aria-label="Edit" data-bs-original-title="Edit" aria-describedby="tooltip734473">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
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