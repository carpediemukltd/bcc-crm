@extends('layout.appTheme')
@section('content')
<div class="position-relative iq-banner default">
    <div class="iq-navbar-header" style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Campaign Edit</h1>
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
                            <h4 class="card-title">Campaign Edit</h4>
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

                        <form method="POST" action="{{ route('marketing-campaigns.update', $campaign->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row step1">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Campaign name</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ $campaign->name }}" required>
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
                            <ul class="list-group sequence-list">
                                <li class="list-group-item">Sequence List</li>
                                @if(count($campaign->marketingCampaignSequence))
                                @foreach($campaign->marketingCampaignSequence as $sequence)
                                <li class="list-group-item item" data-subject="{{$sequence->subject}}" data-content="{{$sequence->body}}" data-waitfor="{{$sequence->wait_for}}">{{$sequence->subject}}</li>
                                @endforeach()
                                @endif()
                            </ul>
                        </div>
                        <div class="col-sm-5">
                            <label class="form-label" for="html_content">Content</label>
                            <textarea id="html_content" name="html_content" rows="4" cols="100" class="form-control tiny-integerate">{{$campaign->marketingCampaignSequence[0]->body}}</textarea>
                            @error('html_content')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-2">
                            <label class="form-label" for="subject">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" value="{{$campaign->marketingCampaignSequence[0]->subject}}">

                        </div>
                        <div class="col-sm-2">
                            <label class="form-label" for="wait_for">Wait For Days</label>
                            <input type="number" class="form-control" name="wait_for" id="wait_for" value="{{$campaign->marketingCampaignSequence[0]->wait_for}}">
                        </div>

                    </div>

                    <div class="row step4 mb-5">
                        <div class="col-md-6 ">

                            <label class="form-label" for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="draft" {{ ($campaign->status == 'draft') ? 'selected' : '' }}>Draft</option>
                                <option value="active" {{ ($campaign->status == 'active') ? 'selected' : '' }}>Active</option>
                                <option value="paused" {{ ($campaign->status == 'paused') ? 'selected' : '' }}>Paused</option>
                                <option value="inprogress" {{ ($campaign->status == 'inprogress') ? 'selected' : '' }}>In Progress</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="start_date">Start Date</label>
                            <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="{{ $campaign->start_date}}" required>
                            @error('start_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="col-md-12 mt-5">
                            @if($campaign->status != 'completed')
                           <button type="submit" class="btn btn-primary">Update</button>
                           @else
                           <button disabled type="button" class="btn btn-primary">Update</button>
                           @endif
                        </div>
                    </div>
                </form>
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
        var removedContactId = $(this).closest('.tag').data('contact-id');
        // Remove the selected contact ID from the array
        selectedContactIds = selectedContactIds.filter(id => id !== removedContactId);

        // Update the hidden input field with selected contact IDs
        var contactsInput = $('.contacts-input');
        contactsInput.val(selectedContactIds.join(','));

        // Remove the tag when the cross is clicked
        $(this).closest('.tag').remove();
    });

    function getLastPartOfUrl(url) {
        // Remove trailing slashes and split the URL by '/'
        let parts = url.replace(/\/+$/, '').split('/');

        // Get the last part of the array
        let lastPart = parts[parts.length - 1];

        return lastPart;
    }

    function renderGraph(data) {
        const ctx = document.getElementById('myChart');

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

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: last30Dates,
                datasets: datasets
            }
        });
    }
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
            console.log('t')
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