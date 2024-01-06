@extends('layout.appTheme')
@section('content')
<div class="position-relative iq-banner default">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Business Entities</h1>
                  </div>
                  <div>
                     <a href="" class="btn btn-link btn-soft-light">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-28">
                           <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        Add New Entity
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
                  <!-- date range start -->
                  <div class="row date_range_fields">
                     <div class="col-md-3">
                        <div class="form-group">
                           <select name="type" id="type" class="form-select">
                              <option disabled value="">--Select Entity Type--</option>
                              <option value="all" {{ $type === 'all' ? 'selected' : '' }}>All</option>
                              @foreach ($entity_types as $type)
                              <option value="{{ $type->name }}" {{ $type === $type->name ? 'selected' : '' }}>
                                 {{ $type->name }}
                              </option>
                              @endforeach
                           </select>

                        </div>
                     </div>
                  </div>
                  <!-- date range end -->
                  <div class="table-responsive">
                     <div id="user-list-table_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <table id="user-list-table" class="table table-striped dataTable no-footer" role="grid" aria-describedby="user-list-table_info">
                           <thead>
                              <tr class="ligth">
                                 <th class="sorting" tabindex="0" aria-controls="user-list-table">Entity Name</th>
                                 <th class="sorting" tabindex="0" aria-controls="user-list-table">Entity Type</th>
                                 <th class="sorting" tabindex="0" aria-controls="user-list-table">Created Date</th>
                                 <th style="min-width: 100px" class="sorting" tabindex="0" aria-controls="user-list-table">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @include('admin.setting.business-setting.pagination')
                           </tbody>
                        </table>
                        <button type="button" style="display:none;" id="click_me" class="btn btn-primary" onclick="getData();">Click Me</button>
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
<!-- Modal -->
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
   var ENDPOINT = "{{ url('contacts') }}";

   function getData() {
      var type = $('#type').val();
      var page = $('#hidden_page').val();
      $('table').addClass('loading');

      if (type === undefined) {
         type = "";
      }
      $.ajax({
         url: "/company-bank-settings/?page=" + page + "&type=" + type,
         success: function(data) {
            $('tbody').html('');
            $('tbody').html(data);
            $('table').removeClass('loading');
         }
      });
   } // getData

   $(document).ready(function() {

      $('body').on('change', '#type', function() {
         getData();
      });

      $('body').on('click', '.pager a', function(event) {
         event.preventDefault();
         var page = $(this).attr('href').split('page=')[1];
         $('#hidden_page').val(page);
         getData();
      });
   });
</script>
@endsection