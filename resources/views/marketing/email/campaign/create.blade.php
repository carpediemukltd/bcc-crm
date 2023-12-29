@extends('layout.appTheme')
@section('content')
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
                  <!-- Step Navigation -->
                  <div class="row mb-4">
                     <div class="col-sm-12">
                        <ul class="list-inline d-flex justify-content-between">
                           <li class="list-inline-item step" id="step1">
                              <span>1. Basic</span>
                           </li>
                           <li class="list-inline-item step" id="step2">
                              <span>2. Import Contacts</span>
                           </li>
                           <li class="list-inline-item step" id="step3">
                              <span>3. Sequences</span>
                           </li>
                           <li class="list-inline-item step" id="step4">
                              <span>4. Finish</span>
                           </li>
                        </ul>

                        <span style="float: right;" id="nextBtn" class="cursor-pointer mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                           </svg></span>
                        <span style="float: right;" id="previousBtn" class="cursor-pointer mr-2">
                           <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                           </svg>
                        </span>
                     </div>
                  </div>

                  <form action="{{ route('marketing-campaigns.store') }}" method="POST">
                     @csrf

                     <!-- Hidden input fields for sequences -->
                     <div id="hidden-sequences-container" style="display: none;"></div>
                     <div class="row step1">
                        <div class="col">
                           <div class="form-group">
                              <label class="form-label">Give your Campaign name</label>
                              <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                              @error('title')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                        </div>

                     </div>
                     <div class="row step2">
                        <div class="col">
                           <label class="form-label" for="contacts">Contacts</label>
                           <select class="form-control" name="select_type" id="contacts">
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
                           <input class="contacts-input" type="hidden" name="contacts">
                        </div>

                     </div>
                     <div class="row step3" id="sequences-container">
                        <div class="col-sm-3">
                           <ul class="list-group sequence-list">
                              <li class="list-group-item">Sequence List</li>
                           </ul>
                        </div>


                        <div class="col-sm-4">
                           <label class="form-label" for="html_content">Content</label>
                           <textarea id="html_content" name="html_content" rows="4" cols="100" class="form-control tiny-integerate"></textarea>
                           @error('html_content')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                        <div class="col-sm-1">
                           <label class="form-label" for="subject">Subject</label>
                           <input type="text" class="form-control email-subject" name="subject">
                        </div>
                        <div class="col-sm-2">
                           <label class="form-label" for="wait_for">Wait For Days</label>
                           <input min="0" type="number" class="form-control" name="wait_for" value="0">
                        </div>
                        <div class="col-sm-2">
                           <label class="form-label" for="templates">Use Templates</label>
                           <select class="form-control template-list">
                              <option data-subject="" data-content="">--Select Template--</option>

                              @if(count($data['templates']))
                              @foreach($data['templates'] as $template)
                              <option data-subject="{{ $template->email_subject }}" data-content="{{ $template->content }}">{{ $template->name }}</option>
                              @endforeach
                              @endif
                           </select>
                        </div>
                        <div class="col-sm-1">
                           <button class="btn btn-success save-sequence-btn" type="button">Save</button>
                        </div>

                     </div>

                     <div class="row step4">
                        <div class="col-md-6">
                           <label class="form-label" for="status">Status</label>
                           <select class="form-control" name="status" id="status">
                              <option value="draft">Draft</option>
                              <option value="active">Active</option>
                           </select>

                        </div>
                        <div class="col-md-6">
                           <label class="form-label" for="start_date">Start Date</label>
                           <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                           @error('start_date')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror

                        </div>
                        <div class="col-md-12 mt-5">
                           <button type="submit" class="btn btn-primary">Finish</button>
                        </div>
                     </div>

               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   localStorage.removeItem('sequences');
   var selectedContactIds = [];
   // Change event for the template-list dropdown
   $(document).on('change', '.template-list', function() {
      // Find the closest .sequences div to the changed dropdown
      var sequencesContainer = $(this).closest('#sequences-container');

      // Get the content from the data attribute of the selected option
      var templateContent = $(this).find(':selected').data('content');
      var templateSubject = $(this).find(':selected').data('subject');

      // Update the TinyMCE content in the sequencesContainer
      tinymce.get(sequencesContainer.find('textarea').attr('id')).setContent(templateContent);
      sequencesContainer.find('.email-subject').val(templateSubject);

   });

   $(document).ready(function() {
      var currentStep = 1;
      // Function to update step highlighting
      function updateStepHighlight() {
         $('.step').removeClass('active');
         $('#step' + currentStep).addClass('active');
      }

      // Function to show/hide next and previous buttons
      function updateButtonsVisibility() {
         if (currentStep === 1) {
            $('#previousBtn').hide();
            $('#nextBtn').show();
         } else if (currentStep === 4) {
            $('#previousBtn').show();
            $('#nextBtn').hide();
         } else {
            $('#previousBtn').show();
            $('#nextBtn').show();
         }
         $(".step1").hide();
         $(".step2").hide();
         $(".step3").hide();
         $(".step4").hide();
         $(".step" + currentStep).show();
      }


      // Initial setup
      updateStepHighlight();
      updateButtonsVisibility();

      // Next button click event
      $('#nextBtn').click(function(e) {
         e.preventDefault();
         if (currentStep < 4) {
            currentStep++;
            updateStepHighlight();
            updateButtonsVisibility();
         }
      });

      // Previous button click event
      $('#previousBtn').click(function(e) {
         e.preventDefault();
         if (currentStep > 1) {
            currentStep--;
            updateStepHighlight();
            updateButtonsVisibility();
         }
      });

      function initTinyMCE(selector) {
         tinymce.init({
            selector: selector,
            toolbar_location: "top",
            menubar: true,
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            plugins: [
               'advlist autolink lists link image charmap print preview anchor',
               'searchreplace visualblocks code fullscreen',
               'insertdatetime media table paste code help wordcount'
            ],
         });
      }
      initTinyMCE('.tiny-integerate');


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

      // search feature
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

         // Update the hidden input field with selected contact IDs
         var contactsInput = $('.contacts-input');
         contactsInput.val(selectedContactIds.join(','));

         // Create tag
         var tag = $('<div>', {
            class: 'tag',
            'data-contact-id': contactId
         });
         tag.text(contactName); // Use the contact name instead of ID

         // Create cross icon within the tag
         var crossIcon = $('<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L11 11M11 1L1 11" stroke="white" stroke-width="2"/></svg>');

         // Append the cross icon to the tag
         tag.append(crossIcon);

         // Append the tag to the container
         container.append(tag);
      }
   });

   // Handle click event for dynamically added cross icon
   $(document).on('click', '.selected-contacts-container .tag svg', function() {
      console.log($(this))
      var removedContactId = $(this).closest('.tag').data('contact-id');
      // Remove the selected contact ID from the array
      selectedContactIds = selectedContactIds.filter(id => id !== removedContactId);

      // Update the hidden input field with selected contact IDs
      var contactsInput = $('.contacts-input');
      contactsInput.val(selectedContactIds.join(','));

      // Remove the tag when the cross is clicked
      $(this).closest('.tag').remove();
   });


   // Function to find a sequence by ID in the sequences array
   function findSequenceById(sequences, sequenceId) {
      return sequences.find(sequence => sequence.id === String(sequenceId));
   }

   // Function to save a new sequence
   function saveNewSequence() {
      // Get sequence data
      var subject = $('input[name="subject"]').val();
      var htmlContent = tinymce.get('html_content').getContent();
      var waitFor = $('input[name="wait_for"]').val();

      // Create a unique identifier for the sequence (e.g., timestamp)
      var sequenceId = Date.now().toString();

      // Save the sequence data in local storage
      var sequenceData = {
         id: sequenceId,
         subject: subject,
         htmlContent: htmlContent,
         waitFor: waitFor
      };

      // Retrieve existing sequences from local storage or initialize an empty array
      var sequences = JSON.parse(localStorage.getItem('sequences')) || [];

      // Add the new sequence data to the array
      sequences.push(sequenceData);

      // Save the updated array back to local storage
      localStorage.setItem('sequences', JSON.stringify(sequences));

      // Add a list item with the sequence subject to the container
      var sequenceList = $('.sequence-list');
      sequenceList.append('<li class="list-group-item" data-sequence-id="' + sequenceId + '">' + subject + '<button class="btn btn-sm btn-primary update-sequence-btn ml-2" data-sequence-id="' + sequenceId + '">Edit</button></li>');
   }

   // Function to update an existing sequence
   function updateSequence(sequenceId) {
      // Get sequence data
      var subject = $('input[name="subject"]').val();
      var htmlContent = tinymce.get('html_content').getContent();
      var waitFor = $('input[name="wait_for"]').val();

      // Retrieve existing sequences from local storage
      var sequences = JSON.parse(localStorage.getItem('sequences')) || [];

      // Find the sequence data by ID
      var existingSequence = findSequenceById(sequences, sequenceId);

      // Update the existing sequence data
      existingSequence.subject = subject;
      existingSequence.htmlContent = htmlContent;
      existingSequence.waitFor = waitFor;

      // Save the updated array back to local storage
      localStorage.setItem('sequences', JSON.stringify(sequences));

      // Update the text of the corresponding list item
      var listItem = $('.sequence-list li[data-sequence-id="' + sequenceId + '"]');
      listItem.text(subject);

      // Add the "Edit" button again
      listItem.append('<button class="btn btn-sm btn-primary update-sequence-btn ml-2" data-sequence-id="' + sequenceId + '">Edit</button>');

      // Clear the form and TinyMCE content
      $('input[name="subject"]').val('');
      tinymce.get('html_content').setContent('');
      $('input[name="wait_for"]').val('');
      $('.save-sequence-btn').data('sequence-id', '');
   }

   // Click event handler for the "Save" button
   $(document).on('click', '.save-sequence-btn', function() {

      var checkSubject = $('input[name="subject"]').val();
      var checkContent = tinymce.get('html_content').getContent();
      var checkWaitFor = $('input[name="wait_for"]').val();
      if (!checkContent || !checkSubject || !checkWaitFor) {
         alert('Please specify content and subject!')
         return false;
      }

      var sequenceId = $(this).data('sequence-id');

      // Check if the sequence already exists
      if (sequenceId) {
         // Update the existing sequence
         updateSequence(sequenceId);
      } else {
         // Save a new sequence
         saveNewSequence();
      }

      // Clear the form and TinyMCE content
      $('input[name="subject"]').val('');
      tinymce.get('html_content').setContent('');
      $('input[name="wait_for"]').val('');
      prepareFormData();
   });

   // Click event handler for the "Update" button next to a list item
   $(document).on('click', '.update-sequence-btn', function() {
      var sequenceId = $(this).data('sequence-id');

      // Retrieve the sequences array from local storage
      var sequences = JSON.parse(localStorage.getItem('sequences')) || [];

      // Find the sequence data by ID
      var selectedSequence = findSequenceById(sequences, sequenceId);

      // Display the sequence data in the form
      $('input[name="subject"]').val(selectedSequence.subject);
      tinymce.get('html_content').setContent(selectedSequence.htmlContent);
      $('input[name="wait_for"]').val(selectedSequence.waitFor);

      // Set the data-sequence-id attribute for the "Save" button
      $('.save-sequence-btn').data('sequence-id', sequenceId);
   });

   // Function to prepare form data before submission
   function prepareFormData() {
      // Retrieve existing sequences from local storage
      var sequences = JSON.parse(localStorage.getItem('sequences')) || [];
      // Remove existing hidden input fields
      $('#hidden-sequences-container').empty();

      // Iterate through all sequences and add hidden input fields

      sequences.forEach(function(sequence, index) {
         var inputHtml = '<input type="hidden" name="sequences[' + index + '][subject]" value="' + sequence.subject + '">';
         inputHtml += '<input type="hidden" name="sequences[' + index + '][htmlContent]" value="' + encodeURIComponent(sequence.htmlContent) + '">';
         inputHtml += '<input type="hidden" name="sequences[' + index + '][waitFor]" value="' + sequence.waitFor + '">';

         $('#hidden-sequences-container').append(inputHtml);
      });
   }
</script>
@endsection