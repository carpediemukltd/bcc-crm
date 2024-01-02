@extends('layout.appTheme')
@section('content')
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
                    <!-- <div class="card-header align-items-center d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Campaign View</h4>
                        </div>
                    </div> -->
                    <div class="card-body">
                    <div class="steps_view_integrate">
                        <!-- Step Navigation -->
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <ul class="list-inline d-flex justify-content-between">
                                    <li class="list-inline-item step" id="step1">
                                        <span>1</span>
                                    </li>
                                    <li class="list-inline-item step" id="step2">
                                        <span>2</span>
                                    </li>
                                    <li class="list-inline-item step" id="step3">
                                        <span>3</span>
                                    </li>
                                    <li class="list-inline-item step" id="step4">
                                        <span>4</span>
                                    </li>
                                    <li class="list-inline-item step" id="step5">
                                        <span>5</span>
                                    </li>
                                </ul>
                                
                            </div>
                        

                        <form method="POST">
                            @csrf
                            <div class="row step1">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Campaign name</label>
                                        <input disabled type="text" class="form-control" id="title" name="title" value="{{ $data['campaign']->name }}" required>
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
                                            <table id="user-list-table" class="table table-striped dataTable no-footer" role="grid" aria-describedby="user-list-table_info">
                                                <thead>
                                                    <tr class="ligth">
                                                        <th class="sorting" tabindex="0" aria-controls="user-list-table">Email</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-list-table">User Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-list-table">Status</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @include('marketing.email.campaign.user_pagination')
                                                </tbody>
                                            </table>
                                            <button type="button" style="display:none;" id="click_me" class="btn btn-primary" onclick="get_users_data();">Click Me</button>
                                            <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- end contacts list -->

                            </div>

                            <div class="row step3">
                                <div class="col-sm-3">
                                <h4 class="mb-3">Sequence List</h4>
                                    <ul class="list-group sequence-list">
                                        
                                        @if(count($data['campaign']->marketingCampaignSequence))
                                        @foreach($data['campaign']->marketingCampaignSequence as $sequence)
                                        <li class="list-group-item item" data-subject="{{$sequence->subject}}" data-content="{{$sequence->body}}" data-waitfor="{{$sequence->wait_for}}">{{$sequence->subject}}</li>
                                        @endforeach()
                                        @endif()
                                    </ul>
                                </div>
                                <div class="col-sm-9">
                                <h4 class="mb-3">Sequence Details</h4>
                           <div class="row">
                           <div class="col-sm-6">
                                    <label class="form-label" for="subject">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject" value="{{$data['campaign']->marketingCampaignSequence[0]->subject}}">

                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="wait_for">Wait For Days</label>
                                    <input type="number" class="form-control" name="wait_for" id="wait_for" value="{{$data['campaign']->marketingCampaignSequence[0]->wait_for}}">
                                </div>
                           </div>
                                <div class="content_view_holder mt-4">
                                    <!-- <label class="form-label" for="html_content">Content</label> -->
                                    <textarea id="html_content" name="html_content" rows="4" cols="100" class="form-control tiny-integerate">{{$data['campaign']->marketingCampaignSequence[0]->body}}</textarea>
                                    @error('html_content')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                

                            </div>

                            <div class="row step4 mb-5">
                                <div class="col-md-6 ">

                                    <label class="form-label" for="status">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option>{{$data['campaign']->status}}</option>
                                    </select>

                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="start_date">Start Date</label>
                                    <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="{{ $data['campaign']->start_date}}" required>
                                    @error('start_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                            <div class="row step5 mb-5" style="padding: 10px;">
                                <div class="col-md-12 pb-5">
                                    <select class="form-control select-sequence" name="sequence"> <!-- Add name attribute -->
                                        <option value="0">--Select Campaign Sequence--</option>
                                        @if(count($data['campaign']->marketingCampaignSequence))
                                        @foreach($data['campaign']->marketingCampaignSequence as $sequence)
                                        <option value="{{$sequence->id}}">{{$sequence->subject}}</option>
                                        @endforeach
                                        @endif
                                    </select>


                                </div><br>
                                <div class="col-md-2">
                                    <p> Emails Sent: <span class="emails-sent-stats"></span></p>

                                </div>
                                <div class="col-md-2">
                                    <p> Opened Emails: <span class="emails-opened-stats"></span></p>

                                </div>
                                <div class="col-md-2">
                                    <p> Failed Emails: <span class="emails-failed-stats"></span> </p>

                                </div>
                                <div class="col-md-2">
                                    <p> Open Rate: <span class="emails-openrate"></span></p>

                                </div>
                                <div class="col-md-2">
                                    <p> Bounce Rate: <span class="emails-bouncerate"></span></p>

                                </div>
                                <div class="col-md-12">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                            <div class="text-right">
                                    
                                    <span  id="previousBtn" class="cursor-pointer mt-4 mr-2">
                                    <svg style="transform: rotate(180deg);" xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none"><path d="M1.5522 12C1.82039 12 2.08998 11.8962 2.29498 11.6887L7.1911 6.75669C7.38908 6.55628 7.5 6.2848 7.5 6.00053C7.5 5.71769 7.38908 5.44621 7.1911 5.2458L2.29498 0.310919C1.88357 -0.104112 1.21803 -0.104112 0.806624 0.313761C0.396625 0.731634 0.398029 1.40677 0.809432 1.8218L4.95576 6.00053L0.809432 10.1793C0.398029 10.5943 0.396625 11.268 0.806624 11.6859C1.01162 11.8962 1.28262 12 1.5522 12Z" fill="white"></path><path d="M6.5522 12C6.82039 12 7.08998 11.8962 7.29498 11.6887L12.1911 6.75669C12.3891 6.55628 12.5 6.2848 12.5 6.00053C12.5 5.71769 12.3891 5.44621 12.1911 5.2458L7.29498 0.310919C6.88357 -0.104112 6.21803 -0.104112 5.80662 0.313761C5.39662 0.731634 5.39803 1.40677 5.80943 1.8218L9.95576 6.00053L5.80943 10.1793C5.39803 10.5943 5.39662 11.268 5.80662 11.6859C6.01162 11.8962 6.28262 12 6.5522 12Z" fill="white"></path></svg>
                           
                                    Back
                                    </span>
                                    <span  id="nextBtn" class="cursor-pointer mt-4 ml-2">
                                        Next
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none"><path d="M1.5522 12C1.82039 12 2.08998 11.8962 2.29498 11.6887L7.1911 6.75669C7.38908 6.55628 7.5 6.2848 7.5 6.00053C7.5 5.71769 7.38908 5.44621 7.1911 5.2458L2.29498 0.310919C1.88357 -0.104112 1.21803 -0.104112 0.806624 0.313761C0.396625 0.731634 0.398029 1.40677 0.809432 1.8218L4.95576 6.00053L0.809432 10.1793C0.398029 10.5943 0.396625 11.268 0.806624 11.6859C1.01162 11.8962 1.28262 12 1.5522 12Z" fill="white"></path><path d="M6.5522 12C6.82039 12 7.08998 11.8962 7.29498 11.6887L12.1911 6.75669C12.3891 6.55628 12.5 6.2848 12.5 6.00053C12.5 5.71769 12.3891 5.44621 12.1911 5.2458L7.29498 0.310919C6.88357 -0.104112 6.21803 -0.104112 5.80662 0.313761C5.39662 0.731634 5.39803 1.40677 5.80943 1.8218L9.95576 6.00053L5.80943 10.1793C5.39803 10.5943 5.39662 11.268 5.80662 11.6859C6.01162 11.8962 6.28262 12 6.5522 12Z" fill="white"></path></svg>
                                    </span>
                                </div>
                        </form>
                </div>
                </div></div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    var selectedContactIds = [];
    var chartInstance = "";

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
            } else if (currentStep === 5) {
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
            $(".step5").hide();
            $(".step" + currentStep).show();
        }


        // Initial setup
        updateStepHighlight();
        updateButtonsVisibility();

        // Next button click event
        $('#nextBtn').click(function(e) {
            e.preventDefault();
            if (currentStep < 5) {
                currentStep++;
                updateStepHighlight();
                updateButtonsVisibility();
            }
            if (currentStep == 5) {
                getAnalyticsData();
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
        var removedContactId = $(this).closest('.tag').data('contact-id');
        // Remove the selected contact ID from the array
        selectedContactIds = selectedContactIds.filter(id => id !== removedContactId);

        // Update the hidden input field with selected contact IDs
        var contactsInput = $('.contacts-input');
        contactsInput.val(selectedContactIds.join(','));

        // Remove the tag when the cross is clicked
        $(this).closest('.tag').remove();
    });

    function getAnalyticsData() {

        let lastPart = getLastPartOfUrl(window.location.href);
        let sequenceId = $('.select-sequence').val(); // Get the selected sequence ID


        $.ajax({
            type: 'GET',
            url: '/marketing-analytics-data', // Replace with your actual search endpoint
            data: {
                id: lastPart,
                sequence: sequenceId, // Pass the selected sequence ID
                // Add other parameters if needed
            },
            success: function(data) {
                $(".emails-sent-stats").html('');
                $(".emails-opened-stats").html('');
                $(".emails-failed-stats").html('');
                $(".eemails-openrate").html('');
                $(".emails-bouncerate").html('');

                $(".emails-sent-stats").html(data.data.totalSentEmails);
                $(".emails-opened-stats").html(data.data.totalOpened);
                $(".emails-failed-stats").html(data.data.totalFailed);
                $(".emails-openrate").html(data.data.openRate);
                $(".emails-bouncerate").html(data.data.bounceRate);
                renderGraph(data.data.graphData);


            },
            error: function(error) {
                // Handle error response
                console.error(error);
            }
        });
    }

    function getLastPartOfUrl(url) {
        // Remove trailing slashes and split the URL by '/'
        let parts = url.replace(/\/+$/, '').split('/');

        // Get the last part of the array
        let lastPart = parts[parts.length - 1];

        return lastPart;
    }

    function renderGraph(data) {
        const ctx = document.getElementById('myChart');
        if (typeof chartInstance !== 'string') {
            chartInstance.destroy();
        }

        // Get the last 30 dates starting from today
        const last30Dates = Array.from({
            length: 30
        }, (_, index) => {
            const date = new Date();
            date.setDate(date.getDate() - index);
            return date.toISOString().split('T')[0];
        }).reverse(); // Reverse to have the oldest date first

        // Initialize datasets with zeros for each date
        const datasets = [{
                label: 'Emails Sent',
                data: Array(30).fill(0),
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            },
            {
                label: 'Opened Emails',
                data: Array(30).fill(0),
                fill: false,
                borderColor: 'rgb(255, 205, 86)',
                tension: 0.1
            },
            {
                label: 'Failed Emails',
                data: Array(30).fill(0),
                fill: false,
                borderColor: 'rgb(255, 99, 132)',
                tension: 0.1
            }
        ];

        // Update datasets with actual counts for each date
        data.forEach(entry => {
            const index = last30Dates.indexOf(entry.date);
            if (index !== -1) {
                datasets[0].data[index] = entry.emails_sent;
                datasets[1].data[index] = entry.opened_emails;
                datasets[2].data[index] = entry.failed_emails;
            }
        });

        chartInstance = new Chart(ctx, {
            type: 'line',
            data: {
                labels: last30Dates,
                datasets: datasets
            }
        });
    }
    $(document).on('change', '.select-sequence', function() {
        getAnalyticsData();
    });
</script>

<script type="text/javascript">
    function get_users_data() {

        var page = $('#hidden_page').val();

        $('table').addClass('loading');
        let lastPart = getLastPartOfUrl(window.location.href);

        $.ajax({
            url: "/marketing-campaign-users/" + lastPart + "?page=" + page,
            success: function(data) {
                $('tbody').html('');
                $('tbody').html(data);
                $('table').removeClass('loading');
            }
        });
    } // get_users_data


    $(document).ready(function() {
        $('body').on('click', '.pager a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('#hidden_page').val(page);
            get_users_data();
        });
    });
    // Click event handler for the "Update" button next to a list item
    $(document).on('click', '.list-group-item', function() {
        $(".list-group-item").removeClass('active');
        $(this).addClass('active');
        var sequenceSubject = $(this).data('subject');
        var sequenceContent = $(this).data('content');
        var sequenceWaitFor = $(this).data('waitfor');

        // Display the sequence data in the form
        $('input[name="subject"]').val(sequenceSubject);
        tinymce.get('html_content').setContent(sequenceContent);
        $('input[name="wait_for"]').val(sequenceWaitFor);
    });
</script>

@endsection