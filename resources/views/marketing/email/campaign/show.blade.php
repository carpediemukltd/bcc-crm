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
                            <h1>Campaign View</h1>
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
                            <h4 class="card-title">Campaign View</h4>
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
                                        <span>2. Contacts</span>
                                    </li>
                                    <li class="list-inline-item step" id="step3">
                                        <span>3. Sequences</span>
                                    </li>
                                    <li class="list-inline-item step" id="step4">
                                        <span>4. Settings</span>
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

                        <form method="POST">
                            @csrf
                            <div class="row step1">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Campaign name</label>
                                        <input disabled type="text" class="form-control" id="title" name="title" value="{{ $data->name }}" required>
                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row step2">
                                <div class="col">
                                    <label class="form-label" for="html_content">Contacts</label>
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
                                                        <th class="sorting" tabindex="0" aria-controls="user-list-table">Email</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-list-table">User Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-list-table">Status</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(count($data->marketingCampaignUser))
                                                    @foreach($data->marketingCampaignUser as $user)
                                                    <tr class="odd">
                                                        <td>{{$user->user->email}}</td>
                                                        <td>{{$user->user->full_name}}</td>
                                                        <td>
                                                            @if($user->email_sent == '1')
                                                            Email Sent
                                                            @elseif($user->email_opened == '1')
                                                            Email Opened
                                                            @elseif($user->email_failed == '1')
                                                            Email Failed
                                                            @elseif($user->email_bounced == '1')
                                                            Email Bounced
                                                            @else
                                                            Pending
                                                            @endif
                                                        </td>

                                                    </tr>
                                                    @endforeach
                                                    @endif()
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- end contacts list -->

                    </div>

                    <div class="row step3">
                        <div class="col-sm-6">
                            <label class="form-label" for="html_content">Content</label>
                            <textarea name="html_content" rows="4" cols="100" class="form-control tiny-integerate">{{$data->marketingCampaignSequence[0]->body}}</textarea>
                            @error('html_content')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-2">
                            <label class="form-label" for="subject">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" value="{{$data->marketingCampaignSequence[0]->subject}}">

                        </div>
                        <div class="col-sm-2">
                            <label class="form-label" for="wait_for">Wait For Days</label>
                            <input type="number" class="form-control" name="wait_for" id="wait_for" value="{{$data->marketingCampaignSequence[0]->wait_for}}">
                        </div>
                        <div class="col-sm-2">
                        </div>

                    </div>

                    <div class="row step4 mb-5">
                        <div class="col-md-6 ">

                            <label class="form-label" for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option>{{$data->status}}</option>
                            </select>

                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="start_date">Start Date</label>
                            <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="{{ $data->start_date}}" required>
                            @error('start_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    var selectedContactIds = [];

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
                // crossIcon.on('click', function() {
                //    // Remove the tag when the cross is clicked
                //    var removedContactId = tag.attr('data-contact-id');
                //    tag.remove();

                //    // Remove the selected contact ID from the array
                //    selectedContactIds = selectedContactIds.filter(id => id !== removedContactId);
                // });

                // Append the cross icon to the tag
                tag.append(crossIcon);

                // Append the tag to the container
                container.append(tag);
            }
        });



    });
</script>

<script>
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
</script>
@endsection