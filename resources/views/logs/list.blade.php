@extends('layout.appTheme')
@section('content')
<div class="position-relative iq-banner default">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Call Logs</h1>
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
{{--                        <div class="row date_range_fields">--}}
{{--                           <div class="col-md-3">--}}
{{--                              <div class="form-group">--}}
{{--                                 <!-- <label class="form-label" for="password">Empty Field</label> -->--}}
{{--                                 <input type="text" name="search" id="search" placeholder="Search..." class="form-control" />--}}
{{--                              </div>--}}
{{--                           </div>--}}
{{--                        </div>--}}
                        <!-- date range end -->

                           <table id="user-list-table" class="table table-striped dataTable no-footer" role="grid" aria-describedby="user-list-table_info">
                               @if($type == 'call')
                               <thead>
                                 <tr class="ligth">
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Call Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">To</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Call Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Recording</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Disposition</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Caller Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table"></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @include('logs.call_logs_pagination')
                              @else
                                   <thead>
                                   <tr class="ligth">
                                       <th class="sorting" tabindex="0" aria-controls="user-list-table">SMS Date</th>
                                       <th class="sorting" tabindex="0" aria-controls="user-list-table">To</th>
                                       <th class="sorting" tabindex="0" aria-controls="user-list-table">Direction</th>
                                       <th class="sorting" tabindex="0" aria-controls="user-list-table">Message</th>
                                       <th class="sorting" tabindex="0" aria-controls="user-list-table"></th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @include('logs.sms_logs_pagination')
                              @endif
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

<script>
    // JavaScript function to open a new tab and play the recording
    function playRecording(element) {
        // Get the recording path from the data attribute
        var recordingUrl = element.getAttribute('data-recording-path');

        // Open a new tab/window and navigate to the recording URL
        var newTab = window.open(recordingUrl, '_blank');

        // Check if the new tab was successfully opened
        if (newTab) {
            // You can add additional playback logic here if needed
        } else {
            // Handle cases where the new tab couldn't be opened
            alert('Unable to open a new tab. Please check your browser settings.');
        }
    }
</script>
@endsection
