@extends('layout.appTheme')
@section('content')
<div class="position-relative iq-banner default">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Campaigns List</h1>
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
                     <p><a href="{{route('marketing-campaigns.create')}}" class="btn btn-success">Create New Campaign</a></p>
                  </div>

               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <div id="user-list-table_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
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

                        <table id="user-list-table" class="table table-striped dataTable no-footer" role="grid" aria-describedby="user-list-table_info">
                           <thead>
                              <tr class="ligth">
                                 <th class="sorting" tabindex="0" aria-controls="user-list-table">Name</th>
                                 <th class="sorting" tabindex="0" aria-controls="user-list-table">Status</th>
                                 <th class="sorting" tabindex="0" aria-controls="user-list-table">Total Emails</th>
                                 <th class="sorting" tabindex="0" aria-controls="user-list-table">Emails Sent</th>
                                 <th class="sorting" tabindex="0" aria-controls="user-list-table">Emails Pending</th>
                                 <th class="sorting" tabindex="0" aria-controls="user-list-table">Start Date</th>
                                 <th class="sorting" tabindex="0" aria-controls="user-list-table">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @include('marketing.email.campaign.pagination')
                           </tbody>
                        </table>
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


<!-- Deletion Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            Are you sure you want to delete this record?
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form id="deleteForm" method="POST" action="">
               @csrf
               @method('DELETE')
               <button type="submit" class="btn btn-danger">Delete</button>
            </form>
         </div>
      </div>
   </div>
</div>

<!-- activate campaign Modal -->
<div class="modal fade" id="activateModal" tabindex="-1" aria-labelledby="activateModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="activateModalLabel">Confirm</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <p class="start-stop-text">Are you sure you want to start this Campaign?</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form id="activateForm" method="POST" action="">
               @csrf
               @method('PATCH')
               <input type="hidden" name="status" value="active">
               <button type="submit" class="btn btn-success">Start Campaign</button>
            </form>
         </div>
      </div>
   </div>
</div>

<!-- activate campaign Modal -->
<div class="modal fade" id="deactivateModal" tabindex="-1" aria-labelledby="deActivateModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="deActivateModalLabel">Confirm</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <p class="start-stop-text">Are you sure you want to stop this Campaign?</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form id="deactivateForm" method="POST" action="">
               @csrf
               @method('PATCH')
               <input type="hidden" name="status" value="paused">
               <button type="submit" class="btn btn-success">Stop Campaign</button>
            </form>
         </div>
      </div>
   </div>
</div>

<script>
   // Trigger modal for deletion
   $(document).on('click', '.delete-btn', function() {
      var campId = $(this).data('campaign-id');
      var deleteUrl = window.location.origin + "/marketing-campaigns/" + campId;
      $('#deleteForm').attr('action', deleteUrl);
      $('#deleteModal').modal('show');
   });

   // Trigger modal for activate modal
   $(document).on('click', '.activate-btn', function() {
      var campId = $(this).data('campaign-id');
      var url = window.location.origin + "/marketing-campaigns/" + campId;
      $('#activateForm').attr('action', url);
      $('#activateModal').modal('show');
   });
   // Trigger modal for de activate modal
   $(document).on('click', '.deactivate-btn', function() {
      var campId = $(this).data('campaign-id');
      var url = window.location.origin + "/marketing-campaigns/" + campId;
      $('#deactivateForm').attr('action', url);
      $('#deactivateModal').modal('show');
   });
</script>


@endsection