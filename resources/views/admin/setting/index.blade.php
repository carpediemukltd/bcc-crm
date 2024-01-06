@extends('layout.appTheme')
@section('content')
<div class="position-relative iq-banner default">
    <div class="iq-navbar-header" style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Settings</h1>
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

            <div style="display: none;" class="alert alert-success alert-dismissible fade show" role="alert" data-bs-autohide="true" data-bs-delay="3000">
            </div>

            <div style="display: none;" class="alert alert-warning alert-dismissible fade show" role="alert" data-bs-autohide="true" data-bs-delay="3000">
            </div>
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-body">
                        <!-- date range start -->
                        <div class="row date_range_fields">
                            <div class="col-md-12">
                                <div class="d-flex align-items-start">
                                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Business Settings</button>
                                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Test Settings</button>
                                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Test Settings Again </button>
                                        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">More Settings</button>
                                    </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <div class="row">
                                                <div class="col-md-4">
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
                                                <div class="col-md-4">
                                                    <input type="text" name="search" id="search" placeholder="Search..." class="form-control" />
                                                </div>
                                                <div class="col-md-4">
                                                    <button class="btn btn-link btn-soft-light add-new-entity" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" aria-label="Edit" data-bs-original-title="Edit" data-bs-toggle="modal">
                                                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-28">
                                                            <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                        Add New Entity
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- date range end -->
                                            <div class="table-responsive" style="width: 1080px;">
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
                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                                    </div>
                                </div>
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
                Are you sure you want to delete this Entity?
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

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Confirm Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Loading spinner -->
                <center>
                    <div class="spin-loader" style="display: none;">
                    </div>
                </center>
                <form id="editForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="entity-type">Select Entity Type</label>
                            <select name="type" id="entity-type" class="form-select">
                                @foreach ($entity_types as $entity_type)
                                <option value="{{ $entity_type->id }}">
                                    {{ $entity_type->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Entity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="addForm" method="POST" action="">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="add-name">Name</label>
                                <input type="text" class="form-control" id="add-name" name="name" required>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="add-entity-type">Select Entity Type</label>
                            <select name="type" id="add-entity-type" class="form-select">
                                @foreach ($entity_types as $entity_type)
                                <option value="{{ $entity_type->id }}">
                                    {{ $entity_type->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function getData() {
        var type = $('#type').val();
        var page = $('#hidden_page').val();
        $('table').addClass('loading');

        if (type === undefined) {
            type = "";
        }
        $.ajax({
            url: "/settings/business-settings/?page=" + page + "&type=" + type,
            success: function(data) {
                $('tbody').html('');
                $('tbody').html(data);
                $('table').removeClass('loading');
            }
        });
    } // getData

    $(document).ready(function() {
        var addUrl, deleteUrl, updateUrl, entityId;

        $('body').on('change', '#type', function() {
            getData();
        });

        $('body').on('click', '.pager a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('#hidden_page').val(page);
            getData();
        });
        $('.delete-button').click(function() {
            entityId = $(this).data('entity-id');
            deleteUrl = window.location.origin + "/settings/business-settings/" + entityId;
            $('#deleteForm').attr('action', deleteUrl);
            $('#deleteModal').modal('show');
        });
        $('#deleteForm').off('submit').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                data: $(this).serialize(),
                success: function(response) {
                    // Add a success message to the session
                    $(".alert-success").text('Entity Deleted Successfully!');
                    showSuccessAlert();
                    // Remove the deleted row from the table
                    $('#entity-' + entityId).remove();

                    // Close the delete modal
                    $('#deleteModal').modal('hide');
                },
                error: function(error) {
                    $('#deleteModal').modal('hide');

                    // Handle error, you might want to show an error message.
                    $('.alert-warning').text('Error deleting Entity.');
                    showErrorAlert();

                }
            });
        });

        $('.edit-button').click(function() {
            $("#editModal .spin-loader").show();
            entityId = $(this).data('entity-id');
            updateUrl = window.location.origin + "/settings/business-settings/" + entityId;
            // Fetch the latest data from the server
            $.ajax({
                url: '/settings/business-settings/' + entityId,
                type: 'GET',
                success: function(response) {
                    // Assuming you have data attributes for the name and type in the edit-button
                    var entityName = response.data.name;
                    var entityType = response.data.type.name;

                    // Set the form action and populate form fields
                    $('#name').val(entityName);
                    // Loop through options in the dropdown and set the selected attribute
                    $('#entity-type option').each(function() {
                        if (String($(this).val()) === String(response.data.type.id)) {
                            $(this).prop('selected', true);
                        } else {
                            $(this).prop('selected', false);
                        }
                    });

                    // Hide loading spinner and show the modal
                    $('#editModal .spin-loader').hide();
                },
                error: function(error) {
                    // Hide loading spinner and handle the error
                    $('#editModal .spin-loader').hide();
                }
            });

            // Set the form action and populate form fields
            $('#editForm').attr('action', updateUrl);
            $('#editModal').modal('show');
        });
        $('#editForm').off('submit').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: updateUrl, // Assuming updateUrl is defined earlier in your script
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    // Add a success message to the session
                    $(".alert-success").text('Entity Updated Successfully!');
                    showSuccessAlert();
                    updatedEntityId = response.data.id;

                    // Update the corresponding row in the table
                    var updatedRow = $('#entity-' + updatedEntityId);
                    updatedRow.find('td:eq(0)').text(response.data.name);
                    updatedRow.find('td:eq(1)').text(response.data.type.name);
                    updatedRow.find('td:eq(2)').text(response.data.formatted_date);

                    // Close the edit modal
                    $('#editModal').modal('hide');
                },
                error: function(error) {
                    // Close the edit modal
                    $('#editModal').modal('hide');

                    // Handle error, you might want to show an error message.
                    $('.alert-warning').text('Error updating Entity.');
                    showErrorAlert();
                }
            });
        });

        $('.add-new-entity').click(function() {
            addUrl = window.location.origin + "/settings/business-settings";
            $('#addForm').attr('action', addUrl);
            $('#addModal').modal('show');
        });
        $('#addForm').off('submit').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: addUrl,
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    // Add a success message to the session
                    $(".alert-success").text('Entity Added Successfully!');
                    showSuccessAlert();
                    // Close the add modal
                    $('#addModal').modal('hide');
                    getData();
                    $("#add-name").val('')
                },
                error: function(error) {
                    // Close the edit modal
                    $('#addModal').modal('hide');

                    // Handle error, you might want to show an error message.
                    $('.alert-warning').text('Error adding Entity.');
                    showErrorAlert();
                }
            });
        });

        //logic to show/hide and dismiss the success alert
        function showSuccessAlert() {
            $('.alert-success').fadeIn();

            // Automatically hide the alert after a delay
            setTimeout(function() {
                $('.alert-success').alert('close');
            }, 5000);
        }

        // Example logic to show/hide and dismiss the error alert
        function showErrorAlert() {
            $('.alert-warning').fadeIn();

            // Automatically hide the alert after a delay
            setTimeout(function() {
                $('.alert-warning').alert('close');
            }, 5000);
        }


    });
</script>
@endsection