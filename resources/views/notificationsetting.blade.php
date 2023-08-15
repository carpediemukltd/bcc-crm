@extends('layout.appTheme')
@section('content')
<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Notification Setting</h1>
                     <p>Experience a simple yet powerful way to build Dashboards.</p>
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
<div class="content-inner container-fluid pb-0" id="page_layout">
   <div class="row">
      <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Round Robin Setting</h4>
                </div>
            </div>
            <div class="card-body px-0">
                <div class="table-responsive">
                    <div id="user-list-table_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <form id="frmExample" action="#" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="">                           
                            <div class="table-responsive">
                                <div id="user-list-table_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div class="table-responsive my-3">
                                        <table id="user-list-table" class="table table-striped dataTable no-footer customfield-list-table" data-toggle="data-table" role="grid" aria-describedby="user-list-table_info">
                                            <thead>
                                                <tr class="ligth">
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sr: activate to sort column descending">Setting Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Title: activate to sort column ascending">Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody class="ui-sortable">
                                                <tr class="odd ui-sortable-handle">
                                                    <td class="sorting_1">Scott Henson</td>
                                                    <td>
                                                    <div class="form-check form-switch form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="switch2" checked="">
                                    
                                </div>
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card-body px-y">    
                                <a href="#" class="btn btn-danger">Cancel</a>  
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
   </div>
</div>
@endsection