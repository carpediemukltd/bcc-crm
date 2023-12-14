@extends('layout.appTheme')
@section('content')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<div class="position-relative iq-banner default">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Campaign Create</h1>
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
<div class="content-inner pb-0 container-fluid email-marketing-campaign" id="page_layout">
   <div>
      @include('alert_message')
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header align-items-center d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Campaign Create</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form action="{{ route('marketing-campaigns.store') }}" method="POST">
                     @csrf
                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="title">Title:</label>
                              <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                              @error('title')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="subject">Subject of Email:</label>
                              <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" required>
                              @error('subject')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label" for="send_at">Schedule Date Time:</label>
                              <input type="datetime-local" class="form-control" id="send_at" name="send_at" value="{{ old('send_at') }}" required>
                              @error('send_at')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col">
                           <label class="form-label" for="html_content">Contacts</label>
                           <select class="form-control" name="select_type">
                              <option value="all">All Contacts</option>
                              <option value="targeted-contacts">Targeted Contacts</option>
                           </select>
                           <br>
                        </div>
                        <div class="col contactSearchForm">
                           <label class="form-label" for="html_content">Select / Deselect Contacts</label>
                           <!-- Your search form -->
                           <input class="form-control" type="text" id="searchQuery" name="searchQuery" placeholder="Search Contacts">

                           <div id="selectedContacts" style="max-height: 200px; overflow-y: auto; border: 1px solid #ced4da; padding: 5px;"></div>

                           <div class="selected-contacts-container" style="max-height: 200px; overflow-y: auto; border: 1px solid #ced4da; padding: 5px;"></div>

                        </div>
                     </div>

                     <div class="row">
                        <div class="col-sm-12">
                           <label class="form-label" for="html_content">Content</label>
                           <textarea name="html_content" rows="4" cols="100" class="form-control tiny-integerate"></textarea>
                           @error('html_content')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                     </div>
                     <br><br><br>
                     <div class="row">
                        <div class="col">
                           <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                     </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function() {
      $('.contactSearchForm').hide();
      $('#selectedContacts').hide();
      $('.selected-contacts-container').hide();

      // On change event of the select_type dropdown
      $('select[name="select_type"]').change(function() {
         // Check the selected value
         var selectedValue = $(this).val();

         // Show or hide the contact search form based on the selection
         if (selectedValue === 'all') {
            $('.contactSearchForm').hide();
         } else if (selectedValue === 'targeted-contacts') {
            $('.contactSearchForm').show();
         }
      });
      // Store selected contact IDs to check for duplicates
      var selectedContactIds = [];

      tinymce.init({
         selector: '.tiny-integerate',
         toolbar_location: "top",
         menubar: true,
         toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
         plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
         ],
      });

      // search feature
      // Handle search and update dropdown
      //  $('#searchQuery').on('input propertychange', function () {
      document.getElementById('searchQuery').addEventListener('input', function() {

         var searchQuery = $(this).val();
         $("#selectedContacts").html('');
         // Perform an AJAX post call with the searchValue using jQuery
         if (searchQuery) {
            // Implement AJAX to fetch search results from Laravel backend
            $.ajax({
               type: 'GET',
               url: '/marketing-search-users', // Replace with your actual search endpoint
               data: {
                  query: searchQuery,
                  // Add other parameters if needed
               },
               success: function(searchResults) {
                  // Update the dropdown options based on search results
                  var dropdown = $('#selectedContacts');
                  $('#selectedContacts').show();
                  dropdown.empty(); // Clear existing options

                  $.each(searchResults, function(index, contact) {
                     // Check if the contact is already selected
                     if (!selectedContactIds.includes(contact.id)) {
                        var option = $(`<div class="${contact.id}-contact" style="margin-bottom:10px;">${contact.full_name} (${contact.email}) <span data-id="${contact.id}" data-name="${contact.full_name}" class="contact-add"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/> </svg></span></div>`);
                        dropdown.append(option);
                     }
                  });
               },
               error: function(error) {
                  // Handle error response
                  console.error(error);
               }
            });

         }

      });

      // Handle click event for dynamically added "Add" text
      $(document).on('click', '#selectedContacts .contact-add', function() {
         $('.selected-contacts-container').show();
         var contactId = $(this).data('id');
         var contactName = $(this).data('name');
         var container = $('.selected-contacts-container');
         $("." + contactId + "-contact").remove();


         // Check if the contact is not already selected
         if (!selectedContactIds.includes(contactId)) {
            // Store the selected contact ID to prevent duplicates
            selectedContactIds.push(contactId);

            // Create tag
            var tag = $('<div>', {
               class: 'tag',
               'data-contact-id': contactId
            });
            tag.text(contactName); // Use the contact name instead of ID

            // Create cross icon within the tag
            var crossIcon = $('<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L11 11M11 1L1 11" stroke="white" stroke-width="2"/></svg>');
            crossIcon.on('click', function() {
               // Remove the tag when the cross is clicked
               var removedContactId = tag.attr('data-contact-id');
               tag.remove();

               // Remove the selected contact ID from the array
               selectedContactIds = selectedContactIds.filter(id => id !== removedContactId);
            });

            // Append the cross icon to the tag
            tag.append(crossIcon);

            // Append the tag to the container
            container.append(tag);
         }
      });



   });
</script>


@endsection