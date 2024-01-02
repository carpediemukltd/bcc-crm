@extends('layout.appTheme')
@section('content')
<div class="position-relative iq-banner default">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>SMTPs List</h1>
                  </div>
                  <div class="header-title">
                     <a href="{{route('custom-smtps.create')}}" class="btn btn-link btn-soft-light">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-28">
                           <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        Create New SMTP
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
                                 <th class="sorting" tabindex="0" aria-controls="user-list-table">Host</th>
                                 <th class="sorting" tabindex="0" aria-controls="user-list-table">Username</th>
                                 <th class="sorting" tabindex="0" aria-controls="user-list-table">Port</th>
                                 <th class="sorting" tabindex="0" aria-controls="user-list-table">Encryption type</th>
                                 <th class="sorting" tabindex="0" aria-controls="user-list-table">Reply To</th>
                                 <th class="sorting" tabindex="0" aria-controls="user-list-table">Display Username</th>
                                 <th class="sorting" tabindex="0" aria-controls="user-list-table">Action</th>

                              </tr>
                           </thead>
                           <tbody>
                              @include('marketing.email.smtp.pagination')
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

<script>
   // Trigger modal for deletion
   $(document).on('click', '.delete-btn', function() {
      var smtpId = $(this).data('smtp-id');
      var deleteUrl = window.location.origin + "/custom-smtps/" + smtpId;
      $('#deleteForm').attr('action', deleteUrl);
      $('#deleteModal').modal('show');
   });
</script>


@endsection