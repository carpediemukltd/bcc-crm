@extends('layout.appTheme')
@section('content')
<div class="position-relative iq-banner default">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>{{strtoupper($type)}} Detail</h1>
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
                               <thead>
                                    @php
                                      $data = unserialize($details->data);
                                    @endphp
                                 @foreach($data as $key => $value)
                                     <tr class="odd">
                                         @if(!empty($value))
                                             @if($key === 'contact')
                                                <td rowspan="{{count($value)}}">{{ucwords(str_replace('_', ' ', $key))}}</td>
                                                 <td>
                                                     @foreach($value as $key => $val)
                                                         <table class="table table-striped dataTable no-footer" role="grid">
                                                             <thead>
                                                                <th border="1" colspan="2">{{$key}}</th>
                                                             </thead>
                                                             <tbody>
                                                             @foreach($val as $v)
                                                                 @foreach($v as $k => $c)
                                                                 <tr>
                                                                     <td>{{ucwords(str_replace('_', ' ', $k))}}</td>
                                                                     <td>{{$c}}</td>
                                                                 </tr>
                                                                 @endforeach
                                                             @endforeach
                                                             </tbody>
                                                         </table>
                                                     @endforeach
                                                 </td>
                                             @else
                                                 <td>{{ucwords(str_replace('_', ' ', $key))}}</td>
                                                 @if($key === 'recording_url')
                                                     <td><a href="#" onclick="playRecording(this)" data-recording-path="{{$value}}">Play Recording</a></td>
                                                 @elseif($key === 'crmlink')
                                                     <td><a href="{{$value}}">CRM Link</a></td>
                                                 @elseif($key === 'call_date')
                                                     <td>{{date('F d, Y', strtotime($value))}}</td>
                                                 @elseif($key === 'message')
                                                     <td style="white-space: normal;overflow-wrap: break-word;">{{$value}}</td>
                                                 @else
                                                     <td>{{$value}}</td>
                                                 @endif
                                             @endif
                                         @endif
                                     </tr>
                                 @endforeach
                              </thead>
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
